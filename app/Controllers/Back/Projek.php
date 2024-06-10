<?php

namespace App\Controllers\Back;

use App\Models\MProjek;
use App\Libraries\Datatable;
use App\Models\MMedia;
use CodeIgniter\I18n\Time;

class Projek extends BaseController
{
    protected $projekModel;
    protected $mediaModel;

    public function __construct()
    {
        $this->projekModel = new MProjek();
        $this->mediaModel = new MMedia();
    }

    public function index()
    {
        return view('dashboard/projek/index');
    }

    public function getDatatable()
    {
        return view('dashboard/projek/data_list');
    }

    public function list()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $columns = [
                ['dt' => 'id', 'cond' => 'projek_id', 'select' => 'projek_id'],
                ['dt' => 'slug', 'cond' => 'projek_slug', 'select' => 'projek_slug'],
                ['dt' => 'nama', 'cond' => 'projek_nama', 'select' => 'projek_nama'],
                ['dt' => 'penulis', 'cond' => 'projek_user_id', 'select' => 'projek_user_id'],
                ['dt' => 'status', 'cond' => 'projek_status', 'select' => 'projek_status'],
                ['dt' => 'kategori', 'cond' => 'kat_nama', 'select' => 'kat_nama', 'formatter' => function ($d) {
                    return $d !== null ? $d : 'Tidak Ada';
                }],
                [
                    'dt' => 'tgl_simpan', 'cond' => 'projek_created_at',
                    'select' => 'projek_created_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_publish', 'cond' => 'projek_published_at',
                    'select' => 'projek_published_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_update', 'cond' => 'projek_updated_at',
                    'select' => 'projek_updated_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
            ];
            $model1 = $this->projekModel;
            $model2 = new Mprojek();
            $result = (new Datatable())->run($model1->multiData(), $model2->multiData(), $req->getVar('datatables'), $columns);
            return $this->response->setJSON($result);
        }
    }

    public function form()
    {
        $id = $this->request->getVar('id');
        if ($id != null) {
            $data = $this->projekModel->find($id);
            if (empty($data)) {
                $result = jsonFormat(false, 'projek tidak temukan');
                return $this->response->setJSON($result);
            }
        }
        $tmp = [];
        if ($id != null) {
            $tmp['data'] = $data;
            $tmp['media'] = $this->mediaModel->where('media_id', $data['projek_media_id'])->findAll();
        }

        return view('dashboard/projek/form', $tmp);
    }


    public function getMedia()
    {
        $req = $this->request;
        if ($req->isAJAX()) {

            $tmp['key'] = $req->getVar('key');

            return view('dashboard/projek/media_form', $tmp);
        }
    }

    public function getDetailMedia()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');
            $data = $this->mediaModel->find($id);
            $tmp = [];
            $tmp['data'] = $data;
            return $this->response->setJSON(['message' => 'test', 'data' => $data]);
        }
    }

    public function save()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id') ?? null;
            $status = (AuthUser()->level != 1) ? 1 : $req->getVar('status');
            $slug = $this->generateSlug($req->getVar('nama'));
            $data = [
                'projek_nama' => $req->getVar('nama'),
                'projek_deskripsi' => $this->sanitizeContent($req->getVar('deskripsi')),
                'projek_konten' => $this->sanitizeContent($req->getVar('konten')),
                'projek_media_id' => $req->getVar('media'),
                'projek_status' => $status,
                'artikel_kategori_id' => $req->getVar('kategori') ?? null,
                'projek_slug' => $slug,
                'projek_approve' => $req->getVar('komentar')
            ];

            if ($id != null) {
                $dataCheck = $this->projekModel->find($id);
                if (empty($dataCheck['projek_id'])) {
                    // Data tidak ditemukan, kirim respons error
                    $result = jsonFormat(false, 'projek tidak ditemukan');
                    return $this->response->setJSON($result);
                }
            }
            // cek apakah pernah dipublish
            if ($status == 2 && ($id == null ||
                ($id != null && empty($dataCheck['projek_published_at'])
                    && empty($dataCheck['projek_published_by'])))) {
                $data['projek_published_at'] = date('Y-m-d H:i:s');
                $data['projek_published_by'] = AuthUser()->id;
            }

            if ($id != null ? $this->projekModel->update($id, $data) : $this->projekModel->insert($data)) {
                $result = jsonFormat(true, 'projek berhasil disimpan');
            } else {
                $result = jsonFormat(false, $this->projekModel->errors());
            }
            return $this->response->setJSON($result);
        }
    }

    private function sanitizeContent($content)
    {
        // membersihkan dari paragraf kosong
        return preg_replace("/<p>(&nbsp;|<br\s*\/?>)*<\/p>/", '', $content);
    }

    private function generateSlug($nama)
    {
        $baseSlug = url_title(Time::now()->format('Y-m-d H:i:s') . '-' . $nama, '-', true);
        $slug = $baseSlug;
        $i = 1;

        $find = $this->projekModel->where('projek_slug', $slug)->findAll();
        $find = count($find) > 1 ? $find : null;
        while (!empty($find)) {
            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }

    public function delete()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');

            if (empty($id)) {
                // ID kosong, kirim respons error
                $result = jsonFormat(false, 'projek tidak ditemukan');
                return $this->response->setJSON($result);
            }

            $find = $this->projekModel->find($id);
            if (empty($find['projek_id'])) {
                // Data tidak ditemukan, kirim respons error
                $result = jsonFormat(false, 'projek tidak ditemukan');
                return $this->response->setJSON($result);
            }

            // Cek izin pengguna untuk menghapus projeking
            if (($find['projek_user_id'] == AuthUser()->id) || (AuthUser()->level == 1)) {
                $result = $this->projekModel->delete($id);
                if ($result) {
                    $result = jsonFormat(true, 'projek berhasil dihapus');
                } else {
                    $result = jsonFormat(false, 'projek gagal dihapus');
                }
            } else {
                $result = jsonFormat(false, 'Anda tidak memiliki izin untuk menghapus projek ini');
            }

            return $this->response->setJSON($result);
        }
    }
}
