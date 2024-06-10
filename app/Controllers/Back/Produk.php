<?php

namespace App\Controllers\Back;

use App\Models\MProduk;
use App\Libraries\Datatable;
use App\Models\MMedia;
use CodeIgniter\I18n\Time;

class Produk extends BaseController
{
    protected $produkModel;
    protected $mediaModel;

    public function __construct()
    {
        $this->produkModel = new MProduk();
        $this->mediaModel = new MMedia();
    }

    public function index()
    {
        return view('dashboard/produk/index');
    }

    public function getDatatable()
    {
        return view('dashboard/produk/data_list');
    }

    public function list()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $columns = [
                ['dt' => 'id', 'cond' => 'produk_id', 'select' => 'produk_id'],
                ['dt' => 'slug', 'cond' => 'produk_slug', 'select' => 'produk_slug'],
                ['dt' => 'nama', 'cond' => 'produk_nama', 'select' => 'produk_nama'],
                ['dt' => 'penulis', 'cond' => 'produk_user_id', 'select' => 'produk_user_id'],
                ['dt' => 'status', 'cond' => 'produk_status', 'select' => 'produk_status'],
                [
                    'dt' => 'tgl_simpan', 'cond' => 'produk_created_at',
                    'select' => 'produk_created_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_publish', 'cond' => 'produk_published_at',
                    'select' => 'produk_published_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
                [
                    'dt' => 'tgl_update', 'cond' => 'produk_updated_at',
                    'select' => 'produk_updated_at', 'formatter' => function ($d) {
                        return $d != null ? date('d-m-Y H:i', strtotime($d)) : '';
                    }
                ],
            ];
            $model1 = $this->produkModel;
            $model2 = new MProduk();
            $result = (new Datatable())->run($model1->multiData(), $model2->multiData(), $req->getVar('datatables'), $columns);
            return $this->response->setJSON($result);
        }
    }

    public function form()
    {
        $id = $this->request->getVar('id');
        if ($id != null) {
            $data = $this->produkModel->find($id);
            if (empty($data)) {
                $result = jsonFormat(false, 'produk tidak temukan');
                return $this->response->setJSON($result);
            }
        }
        $tmp = [];
        if ($id != null) {
            $tmp['data'] = $data;
            $tmp['media'] = $this->mediaModel->where('media_id', $data['produk_media_id'])->findAll();
        }

        return view('dashboard/produk/form', $tmp);
    }


    public function getMedia()
    {
        $req = $this->request;
        if ($req->isAJAX()) {

            $tmp['key'] = $req->getVar('key');

            return view('dashboard/produk/media_form', $tmp);
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
                'produk_nama' => $req->getVar('nama'),
                'produk_deskripsi' => $this->sanitizeContent($req->getVar('deskripsi')),
                'produk_konten' => $this->sanitizeContent($req->getVar('konten')),
                'produk_media_id' => $req->getVar('media'),
                'produk_status' => $status,
                'produk_slug' => $slug,
                'produk_approve' => $req->getVar('komentar')
            ];

            if ($id != null) {
                $dataCheck = $this->produkModel->find($id);
                if (empty($dataCheck['produk_id'])) {
                    // Data tidak ditemukan, kirim respons error
                    $result = jsonFormat(false, 'produk tidak ditemukan');
                    return $this->response->setJSON($result);
                }
            }
            // cek apakah pernah dipublish
            if ($status == 2 && ($id == null ||
                ($id != null && empty($dataCheck['produk_published_at'])
                    && empty($dataCheck['produk_published_by'])))) {
                $data['produk_published_at'] = date('Y-m-d H:i:s');
                $data['produk_published_by'] = AuthUser()->id;
            }

            if ($id != null ? $this->produkModel->update($id, $data) : $this->produkModel->insert($data)) {
                $result = jsonFormat(true, 'produk berhasil disimpan');
            } else {
                $result = jsonFormat(false, $this->produkModel->errors());
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

        $find = $this->produkModel->where('produk_slug', $slug)->findAll();
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
                $result = jsonFormat(false, 'produk tidak ditemukan');
                return $this->response->setJSON($result);
            }

            $find = $this->produkModel->find($id);
            if (empty($find['produk_id'])) {
                // Data tidak ditemukan, kirim respons error
                $result = jsonFormat(false, 'produk tidak ditemukan');
                return $this->response->setJSON($result);
            }

            // Cek izin pengguna untuk menghapus produking
            if (($find['produk_user_id'] == AuthUser()->id) || (AuthUser()->level == 1)) {
                $result = $this->produkModel->delete($id);
                if ($result) {
                    $result = jsonFormat(true, 'produk berhasil dihapus');
                } else {
                    $result = jsonFormat(false, 'produk gagal dihapus');
                }
            } else {
                $result = jsonFormat(false, 'Anda tidak memiliki izin untuk menghapus produk ini');
            }

            return $this->response->setJSON($result);
        }
    }
}
