<?php

namespace App\Controllers\Back;

use App\Models\MKontak;
use App\Libraries\Datatable;

class Kontak extends BaseController
{
    protected $helpers = ['text'];
    protected $kontakModel;

    public function __construct()
    {
        $this->kontakModel = new MKontak();
    }
    public function index()
    {
        return view('dashboard/kontak/index');
    }

    public function list()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $columns = [
                ['dt' => 'id', 'cond' => 'kontak_id', 'select' => 'kontak_id'],
                ['dt' => 'nama', 'cond' => 'kontak_nama', 'select' => 'kontak_nama'],
                ['dt' => 'email', 'cond' => 'kontak_email', 'select' => 'kontak_email'],
                ['dt' => 'perihal', 'cond' => 'kontak_perihal', 'select' =>
                'kontak_perihal', 'formatter' => function ($d) {
                    return ellipsize($d, 100);
                }],
                [
                    'dt' => 'tgl_simpan', 'cond' => 'kontak_created_at',
                    'select' => 'kontak_created_at',
                    'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_update', 'cond' => 'kontak_updated_at',
                    'select' => 'kontak_updated_at',
                    'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
            ];

            $model1 = $this->kontakModel;
            $model2 = new Mkontak();
            $model1 = $model1->where('kontak_deleted_at', null);
            $model2 = $model2->where('kontak_deleted_at', null);
            $result = (new Datatable())->run($model1, $model2, $req->getVar('datatables'), $columns);
            return $this->response->setJSON($result);
        }
    }

    public function form()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $_POST['id'] ?? null;
            if ($id != null) {
                $data = $this->kontakModel->findData($id);
                if (empty($data['kontak_id'])) {
                    $result = jsonFormat(false, 'kontak tidak ditemukan');
                    return $this->response->setJSON($result);
                }
            }

            $tmp = [];

            if ($id != null) {
                $tmp['data'] = $data;
            }

            return view('dashboard/kontak/form', $tmp);
        }
    }

    public function save()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $_POST['id'] ?? null;
            if ($id != null) {
                $find = $this->kontakModel->find($id);
                if (empty($find['kontak_id'])) {
                    // Data tidak ditemukan, kirim respons error
                    $result = jsonFormat(false, 'kontak tidak ditemukan');
                    return $this->response->setJSON($result);
                }
            }
            $data = [
                'kontak_status' => $req->getVar('status'),
            ];
            if ($this->kontakModel->update($id, $data)) {
                $result = jsonFormat(true, 'kontak berhasil diupdate');
            } else {
                $result = jsonFormat(false, $this->kontakModel->errors());
            }
            return $this->response->setJSON($result);
        }
    }

    public function delete()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');

            if (empty($id)) {
                // ID kosong, kirim respons error
                $result = jsonFormat(false, 'kontak tidak ditemukan');
                return $this->response->setJSON($result);
            }

            $find = $this->kontakModel->find($id);
            if (empty($find['kontak_id'])) {
                // Data tidak ditemukan, kirim respons error
                $result = jsonFormat(false, 'kontak tidak ditemukan');
                return $this->response->setJSON($result);
            }

            // menghapus kontak
            $data = $this->kontakModel->where('kontak_reply_id', $id)->findAll();
            if ($this->kontakModel->delete($id)) {
                foreach ($data as $row) {
                    $this->kontakModel->delete($row['kontak_id']);
                }
                $result = jsonFormat(true, 'kontak berhasil dihapus');
            } else {
                $result = jsonFormat(false, 'kontak gagal dihapus');
            }
            return $this->response->setJSON($result);
        }
    }
}
