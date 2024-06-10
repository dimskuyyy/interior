<?php

namespace App\Controllers\Back;

use App\Models\MMenu;

class Menu extends BaseController
{
    protected $modelMenu;
    protected $cache;

    public function __construct()
    {
        $this->modelMenu = new MMenu();
        $this->cache = \Config\Services::cache();
    }
    public function index()
    {
        $data = $this->modelMenu->where('menu_parent_id is null')->orderBy('menu_posisi', 'asc')->findAll();
        return view('dashboard/menu/index', [
            'data' => $data
        ]);
    }
    public function edit()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');
            if (!empty($id)) {
                $data = $this->modelMenu
                    ->select('menu_id as id,menu_nama as menu,menu_link as link,menu_status as status')->find($id);
                if ($data != null) {
                    $result = jsonFormat(true, 'Data berhasil ditemukan', $data);
                } else {
                    $result = jsonFormat(false, 'Menu tidak ditemukan !');
                }
            } else {
                $result = jsonFormat(false, 'Silahkan pilih data');
            }
            return $this->response->setJSON($result);
        }
    }
    public function save()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id') ?? null;

            $data = [
                'menu_nama' => $req->getVar('nama'),
                'menu_link' => $req->getVar('link'),
                'menu_status' => $req->getVar('status')
            ];
            if ($id != null ? $this->modelMenu->update($id, $data) : $this->modelMenu->insert($data)) {
                $this->cache->delete('menu');
                $result = jsonFormat(true, 'Menu berhasil disimpan');
            } else {
                $result = jsonFormat(false, $this->modelMenu->errors());
            }
            return $this->response->setJSON($result);
        }
    }
    public function saveStruktur()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $data = $req->getVar('data');
            if (count($data) > 0) {
                foreach ($data as $key => $dt) {
                    $this->loopSaveStruktur($key, $dt);
                }
                $this->cache->delete('menu');
                $result = jsonFormat(true, 'Struktur menu berhasil disimpan');
            } else {
                $result = jsonFormat(false, 'Data menu tidak ditemukan');
            }
            return $this->response->setJSON($result);
        }
    }
    public function loopSaveStruktur($key, $data, $parent = null)
    {
        $m = $this->modelMenu->where('menu_id', $data['id'])
            ->set(['menu_posisi' => ($key + 1), 'menu_parent_id' => $parent])->update();
        if (isset($data['children'])) {
            foreach ($data['children'] as $key1 => $dt1) {
                $this->loopSaveStruktur($key1, $dt1, $data['id']);
            }
        }
    }
    public function delete()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $id = $req->getVar('id');
            if ($this->modelMenu->delete($id)) {
                $this->cache->delete('menu');
                $result = jsonFormat(true, 'Menu berhasil dihapus');
            } else {
                $result = jsonFormat(false, 'Menu gagal dihapus');
            }
            return $this->response->setJSON($result);
        }
    }
}
