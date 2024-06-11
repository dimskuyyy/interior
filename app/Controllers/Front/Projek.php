<?php

namespace App\Controllers\Front;

use App\Models\MProjek;
use App\Models\MKategori;

class Projek extends BaseController
{

    protected $kategoriModel;
    protected $projekModel;
    public function __construct()
    {
        $this->kategoriModel = new MKategori();
        $this->projekModel = new MProjek();
        helper('text');
    }
    public function index()
    {

        $data = [
            'kategori' => $this->kategoriModel->getKategori(),
            'setting' => $this->getSettingsCache('home'),
            'projek' => $this->projekModel->getProjek()->paginate(6, 'default'),
            'pager' => $this->projekModel->pager,
            'title' => 'Projek',
            'keyword' => 'projek'
        ];

        return view('front/projek/index', $data);
    }

    public function detail($slug)
    {

        $projek = $this->projekModel->findProjek($slug);
        $data = [
            'setting' => $this->getSettingsCache('home'),
            'projek' => $projek,
            'title' => 'Projek ' . $projek['projek_nama'],
            'description' => ellipsize($projek['projek_deskripsi'], 200),
            'keywords' => str_replace(' ', ', ', strtolower($projek['projek_nama'])),
            'image' => base_url('media/') . $projek['media_slug']
        ];
        return view('front/projek/detail', $data);
    }

    public function kategoriPost($slug)
    {
        $kat = $this->kategoriModel->where('kat_slug', $slug)->where('kat_status', 2)->first();
        // jika post null
        if (empty($kat)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan.');
        }
        $data = [
            'judul' => 'Kategori: ' . $kat['kat_nama'],
            'kategori' => $this->kategoriModel->getKategori(),
            'setting' => $this->getSettingsCache('home'),
            'projek' => $this->projekModel->getProjek(null, $kat['kat_id'])->paginate(6, 'default'),
            'pager' => $this->projekModel->pager,
            'keyword' => 'projek'
        ];

        return view('front/projek/index', $data);
    }
}
