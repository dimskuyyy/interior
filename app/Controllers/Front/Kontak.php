<?php

namespace App\Controllers\Front;

use App\Models\MKontak;

class Kontak extends BaseController
{

    protected $kontakModel;

    public function __construct()
    {   
        $this->kontakModel = new MKontak();
    }
    public function index(){
        $data = [
            'setting' => $this->getSettingsCache(),
            'title' => 'Kontak',
            'keywords' => 'kontak, hubungi'

        ];   
        return view('front/kontak/index',$data);
    }

    public function save_kontak()
    {
        $req = $this->request;
        if ($req->isAJAX()) {
            $data = [
                'kontak_nama' => $req->getVar('nama'),
                'kontak_email' => $req->getVar('email'),
                'kontak_perihal' => $req->getVar('perihal'),
                'kontak_pesan' => $req->getVar('pesan')
            ];

            if ($this->kontakModel->insert($data)) {
                $result = jsonFormat(true, 'Kontak berhasil disimpan');
            } else {
                $result = jsonFormat(false, $this->kontakModel->errors());
            }
            return $this->response->setJSON($result);
        }
    }
}