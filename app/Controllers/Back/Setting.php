<?php

namespace App\Controllers\Back;

use App\Libraries\Datatable;

use App\Models\MSetting;

class Setting extends BaseController
{
    protected $settingModel;
    protected $helpers = ['text'];
    protected $cache;

    public function __construct()
    {
        $this->settingModel = new MSetting();
        $this->cache = \Config\Services::cache();
    }

    public function index($targetPage)
    {
        $find = $this->settingModel->where('set_role', $targetPage)->first();
        $tmp = [
            'page' => $targetPage,
            'data' => $find ? $find : null,
            'logo' => $data['logo'] = $this->getLogo()
        ];

        $view = $this->getPageView($targetPage);
        if ($view == null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan.');
        }

        return view('dashboard/setting/' . $view, $tmp);
    }

    private function getPageView($page)
    {
        switch ($page) {
            case 'sosial_media':
            case 'quick_link':
            case 'client':
            case 'testimoni':
            case 'master_slider':
                return 'index';
                break;
            case 'contact':
            case 'judul':
            case 'location':
            case 'logo':
                return 'form';
                break;
            default:
                return null;
        }
    }

    public function getDatatable()
    {
        $tmp = [
            'page' => $this->request->getVar('role')
        ];
        return view('dashboard/setting/data_list', $tmp);
    }

    public function list()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $columns = [
                ['dt' => 'id', 'cond' => 'set_id', 'select' => 'set_id'],
                ['dt' => 'role', 'cond' => 'set_role', 'select' => 'set_role'],
                ['dt' => 'value', 'cond' => 'set_value', 'select' => 'set_value', 'formatter' => function ($d) {
                    if ($this->request->getVar('role') === 'master_slider') {
                        $data =  "<image src='$d' width='40%' />";
                    } else {
                        $data =  $d;
                    }
                    return $data;
                }],
                ['dt' => 'additional', 'cond' => 'set_additional', 'select' => 'set_additional', 'formatter' => function ($d) {
                    return ellipsize($d, 40);
                }],
                ['dt' => 'optional', 'cond' => 'set_optional', 'select' => 'set_optional', 'formatter' => function ($d) {
                    return ellipsize($d, 40);
                }],
                ['dt' => 'status', 'cond' => 'set_status', 'select' => 'set_status'],
                [
                    'dt' => 'tgl_simpan', 'cond' => 'set_created_at',
                    'select' => 'set_created_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_update', 'cond' => 'set_updated_at',
                    'select' => 'set_updated_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
            ];
            $model1 = $this->settingModel;
            $model2 = new MSetting();
            $result = (new Datatable())->run($model1->where('set_role', $req->getVar('role')), $model2->where('set_role', $req->getVar('role')), $req->getVar('datatables'), $columns);
            return $this->response->setJSON($result);
        }
    }

    public function form()
    {
        $req = $this->request;
        if ($req->isAJAX()) {

            $id = $req->getVar('id') ?? null;
            $role = $req->getVar('role');

            if ($id != null) {
                $data = $this->settingModel->find($id);
                if (empty($data['set_id'])) {
                    $result = jsonFormat(false, 'Setting tidak ditemukan');
                    return $this->response->setJSON($result);
                }
            }

            $tmp = [];

            if ($id != null) {
                $tmp['data'] = $data;
            } else {
                $tmp['create'] = ['set_role' => $role];
            }

            return view('dashboard/setting/form_list', $tmp);
        }
    }

    public function save()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id') ?? null;
            $role = $req->getVar('role');
            if ($id == null) {
                $find = $this->settingModel->where('set_role', $role)->where('set_value', $req->getVar('value'))->first();
                if ($find != null) {
                    $result = jsonFormat(false, 'Data Setting tersebut sudah ada!');
                    return $this->response->setJSON($result);
                }
            }
            $value = $req->getVar('value');
            if ($role === 'seo') {
                $value = $this->convertValueInSeo($value);
            }
            $validationRules = $this->validationRule($role);
            if (!$this->validate($validationRules)) {
                $result = jsonFormat(false, $this->validator->getErrors());
            } else {
                $data = [
                    'set_role' => $role,
                    'set_value' => $value,
                    'set_additional' => $req->getVar('additional'),
                    'set_optional' => $req->getVar('optional'),
                    'set_status' => $req->getVar('status')
                ];
                if ($id != null ? $this->settingModel->update($id, $data) : $this->settingModel->insert($data)) {
                    $this->cache->delete('setting');
                    $result = jsonFormat(true, 'Setting berhasil disimpan');
                } else {
                    $result = jsonFormat(false, $this->settingModel->errors());
                }
            }
            return $this->response->setJSON($result);
        }
    }

    private function convertValueInSeo($value)
    {
        $rawValue = json_decode($value);
        $tmpValue = '';
        $countValue = count($rawValue) - 1;
        foreach ($rawValue as $index => $raw) {
            if ($index === $countValue) {
                $tmpValue .= $raw->value;
            } else {
                $tmpValue .= $raw->value . ', ';
            }
        }
        return $tmpValue;
    }

    private function validationRule($role)
    {
        $validationRules = [
            'role' => 'required|alpha_dash|max_length[255]',
            'value' => 'required',
            'additional' => '',
            'optional' => '',
            'status' => 'in_list[1,2]|required'
        ];


        switch ($role) {
            case 'sosial_media':
            case 'quick_link':
                $validationRules['optional'] = 'required|valid_url_strict[https,http]';
                $validationRules['additional'] = 'string';
                break;
            case 'contact':
            case 'judul':
                $validationRules['value'] = 'alpha_numeric_space|max_length[255]';
                $validationRules['optional'] = 'required|string';
                $validationRules['additional'] = 'string';
                break;
            case 'testimoni':
                $validationRules['value'] = 'string|max_length[255]';
                $validationRules['optional'] = 'string|max_length[255]';
                $validationRules['additional'] = 'required|string';
                break;
            case 'location':
                $validationRules['value'] = 'valid_url_strict[https,http]';
                $validationRules['optional'] = 'string';
                $validationRules['additional'] = 'string';
                break;
            case 'client':
            case 'logo':
                $validationRules['value'] = 'valid_url_strict[https,http]';
                $validationRules['optional'] = 'string';
                $validationRules['additional'] = 'string';
                break;
            case 'master_slider':
                $validationRules['value'] = 'valid_url_strict[https,http]';
                $validationRules['optional'] = 'string';
                $validationRules['additional'] = 'string';
                break;
            default:
                $validationRules['value'] = 'string';
                $validationRules['optional'] = 'string';
        }

        return $validationRules;
    }

    public function delete()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');

            if (empty($id)) {
                // ID kosong, kirim respons error
                $result = jsonFormat(false, 'Setting tidak ditemukan');
                return $this->response->setJSON($result);
            }

            $find = $this->settingModel->find($id);
            if (empty($find['set_id'])) {
                // Data tidak ditemukan, kirim respons error
                $result = jsonFormat(false, 'Setting tidak ditemukan');
                return $this->response->setJSON($result);
            }

            // menghapus setting
            if ($this->settingModel->delete($id)) {
                $this->cache->delete('setting');
                $result = jsonFormat(true, 'Setting berhasil dihapus');
            } else {
                $result = jsonFormat(false, 'Setting gagal dihapus');
            }
            return $this->response->setJSON($result);
        }
    }
}
