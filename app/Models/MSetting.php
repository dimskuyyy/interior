<?php

namespace App\Models;

use CodeIgniter\Model;

class MSetting extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting';
    protected $primaryKey       = 'set_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['set_role', 'set_value', 'set_additional', 'set_optional', 'set_status', 'set_created_at', 'set_created_by', 'set_updated_at', 'set_updated_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'set_created_at';
    protected $updatedField  = 'set_updated_at';
    protected $deletedField  = '';

    protected $validationRules = [];
    // Validation
    // Aturan validasi untuk update
    protected $validationRulesUpdate = [
        'set_value' => [
            'label' => 'Setting Value',
            'rules' => 'required|string'
        ],
        'set_additional' => [
            'label' => 'Setting Additional Value',
            'rules' => 'required|string'
        ],
        'set_optional' => [
            'label' => 'Setting Optional Value',
            'rules' => 'required|string'
        ],
        'set_status' => [
            'label' => 'Status',
            'rules' => 'required|integer|in_list[1,2]'
        ]
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
    protected $afterDelete    = [];

    // Fungsi untuk validasi update data
    public function validateUpdate($data)
    {
        return $this->setValidationRules($this->validationRulesUpdate);
    }

    // Fungsi untuk validasi update data
    public function validateUpdateLogo($data)
    {
        return $this->setValidationRules($this->validationRulesUpdateLogo);
    }

    public function beforeInsert($data)
    {
        $data['data']['set_created_at'] = date('Y-m-d H:i:s');
        $data['data']['set_created_by'] = AuthUser()->id;
        return $data;
    }

    public function beforeUpdate($data)
    {
        $data['data']['set_updated_at'] = date('Y-m-d H:i:s');
        $data['data']['set_updated_by'] = AuthUser()->id;
        return $data;
    }
}
