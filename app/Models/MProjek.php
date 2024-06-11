<?php

namespace App\Models;

use CodeIgniter\Model;

class MProjek extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'projek';
    protected $primaryKey       = 'projek_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['projek_slug','projek_kategori_id', 'projek_nama', 'projek_deskripsi', 'projek_konten', 'projek_media_id', 'projek_status', 'projek_user_id', 'projek_created_at', 'projek_created_by', 'projek_published_at', 'projek_published_by', 'projek_updated_at', 'projek_updated_by', 'projek_deleted_at', 'projek_deleted_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'projek_created_at';
    protected $updatedField  = 'projek_updated_at';
    protected $deletedField  = 'projek_deleted_at';

    // Validation
    protected $validationRules = [
        'projek_nama' => [
            'label' => 'Nama',
            'rules' => 'required|string'
        ],
        'projek_deskripsi' => [
            'label' => 'Deskripsi',
            'rules' => 'required|string'
        ],
        'projek_konten' => [
            'label' => 'Konten',
            'rules' => 'required|string'
        ],
        'projek_media_id' => [
            'label' => 'Media',
            'rules' => 'required|integer'
        ],
        'projek_status' => [
            'label' => 'Status',
            'rules' => 'required|integer|in_list[1,2]'
        ],
        'projek_slug' => [
            'label' => 'Slug',
            'rules' => 'required|alpha_dash'
        ],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['beforeUpdate'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = ['afterDelete'];

    // overidding method
    public function multiData()
    {
        return $this->builder()
            ->join('kategori', 'kat_id = projek_kategori_id', 'left')
            ->join('media', 'media_id = projek_media_id')
            ->join('user', 'user_id = projek_user_id')
            ->where('projek_deleted_at', null);
    }

    public function getProjek(string $keyword = null, string $idKategori = null)
    {
        $builder = $this->table('projek');
        $builder->select('*');
        $builder->join('kategori', 'kat_id = projek_kategori_id');
        $builder->join('media', 'media_id = projek_media_id');
        $builder->join('user', 'user_id = projek_user_id');
        $builder->where('projek_status', 2);
        $builder->orderBy('projek_published_at', 'DESC');
        $builder->where('projek_deleted_at', null);

        if ($keyword != null) {
            $builder->groupStart();
            $builder->like('projek_nama', $keyword);
            $builder->orLike('projek_konten', $keyword);
            $builder->groupEnd();
        }

        
        if ($idKategori != null) {
            $builder->where('projek_kategori_id', $idKategori);
        }

        return $builder;
    }
    public function findProjek($slug)
    {
        $builder = $this->table('projek');
        $builder->select('*');
        $builder->join('kategori', 'kat_id = projek_kategori_id');
        $builder->join('media', 'media_id = projek_media_id');
        $builder->join('user', 'user_id = projek_user_id');
        $builder->where('projek_slug', $slug);
        $builder->where('projek_status', 2);
        $builder->where('projek_deleted_at', null);
        $query = $builder->get();
        return $query->getFirstRow('array');
    }

    public function getRecentProjek(int $limit = 0)
    {
        $builder = $this->table('projek');
        $builder->select('*');
        $builder->join('kategori', 'kat_id = projek_kategori_id');
        $builder->join('media', 'media_id = projek_media_id');
        $builder->join('user', 'user_id = projek_user_id');
        $builder->where('projek_status', 2);
        $builder->where('projek_deleted_at', null);
        $builder->orderBy('projek_published_at', 'ASC');
        $builder->limit($limit);
        return $builder->get()->getResultArray();
    }

    public function beforeInsert($data)
    {
        $data['data']['projek_user_id'] = AuthUser()->id;
        $data['data']['projek_created_at'] = date('Y-m-d H:i:s');
        $data['data']['projek_created_by'] = AuthUser()->id;
        return $data;
    }

    public function beforeUpdate($data)
    {
        $data['data']['projek_updated_at'] = date('Y-m-d H:i:s');
        $data['data']['projek_updated_by'] = AuthUser()->id;
        return $data;
    }

    public function afterDelete($data)
    {
        $id = $data['id'][0];
        $db = \Config\Database::connect();
        $builder = $db->table('projek');
        $builder->set('projek_deleted_by', AuthUser()->id);
        $builder->where('projek_id', $id);
        $builder->update();
    }

}
