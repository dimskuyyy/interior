<?php

namespace App\Models;

use App\Controllers\Back\Auth;
use CodeIgniter\Model;
use Config\Services;

class MKontak extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kontak';
    protected $primaryKey       = 'kontak_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['kontak_perihal', 'kontak_nama', 'kontak_email', 'kontak_pesan', 'kontak_created_at', 'kontak_updated_at', 'kontak_updated_by', 'kontak_deleted_at', 'kontak_deleted_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'kontak_created_at';
    protected $updatedField  = 'kontak_updated_at';
    protected $deletedField  = 'kontak_deleted_at';

    // Validation
    protected $validationRules = [
        'kontak_perihal' => [
            'label' => 'Perihal',
            'rules' => 'required|max_length[255]|string|alpha_numeric_space'
        ],
        'kontak_nama' => [
            'label' => 'Nama',
            'rules' => 'required|max_length[255]|string|alpha_numeric_space'
        ],
        'kontak_email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[255]'
        ],
        'kontak_pesan' => [
            'label' => 'Komentar',
            'rules' => 'required|string'
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

    public function beforeInsert($data)
    {
        $data['data']['kontak_created_at'] = date('Y-m-d H:i:s');
        return $data;
    }
    public function beforeUpdate($data)
    {
        $data['data']['kontak_updated_at'] = date('Y-m-d H:i:s');
        $data['data']['kontak_updated_by'] = AuthUser()->id;
        return $data;
    }
    public function afterDelete($data)
    {
        $id = $data['id'][0];
        $builder = $this->table('kontak');
        $builder->set('kontak_deleted_by', AuthUser()->id);
        $builder->where('kontak_id', $id);
        $builder->update();
    }

    public function findData($id = null)
    {
        $builder = $this->db->table('kontak')
            ->select('*')
            ->where('kontak_deleted_at', null);
        if ($id) {
            $builder->where('kontak_id', $id);
        }
        return $builder->get()->getFirstRow('array');
    }
}
