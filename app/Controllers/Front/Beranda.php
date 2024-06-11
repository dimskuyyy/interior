<?php

namespace App\Controllers\Front;

use App\Models\MProjek;

class Beranda extends BaseController
{

    protected $artikelModel;
    protected $projekModel;

    public function __construct()
    {
        // instansiasi model
        $this->projekModel = new MProjek();
    }

    public function index(){
        $projekRecent = $this->projekModel->getRecentProjek(5);

        $data = [
            'listProjek' => $projekRecent,
            'setting' => $this->getSettingsCache('home'),
            'title' => 'Beranda'
        ];

        return view('front/beranda/index',$data);
    }

    public function about(){
        $data = [
            'setting' => $this->getSettingsCache('home'),
            'title' => 'Tentang Kami'
        ];
        return view('front/about/index',$data);
    }

}