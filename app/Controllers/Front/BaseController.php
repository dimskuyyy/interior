<?php

namespace App\Controllers\Front;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\MSetting;
use App\Models\MProjek;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */

    protected $cache;
    protected $settingModel;
    protected $projekModel;
    protected $runningTextModel;
    protected $menuModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->cache = \Config\Services::cache();
    }

    private function setSettingsCache()
    {
        $this->settingModel = new MSetting();
        $this->projekModel = new MProjek();

        $setting = [
            'judul' => $this->settingModel->where('set_role', 'judul')->where('set_status', 1)->get()->getFirstRow('array'),

            'logo' => $this->settingModel->where('set_role', 'logo')->where('set_status', 1)->get()->getFirstRow('array'),

            'location' => $this->settingModel->where('set_role', 'location')->where('set_status', 1)->get()->getFirstRow('array'),

            'kontak' => $this->settingModel->where('set_role', 'contact')->where('set_status', 1)->get()->getFirstRow('array'),

            'sosial_media' => $this->settingModel->where('set_role', 'sosial_media')->where('set_status', 1)->findAll(),

            'quick_link' => $this->settingModel->where('set_role', 'quick_link')->where('set_status', 1)->findAll(),

            'client' => $this->settingModel->where('set_role', 'client')->where('set_status', 1)->findAll(),

            'testimoni' => $this->settingModel->where('set_role', 'testimoni')->where('set_status', 1)->findAll(),

            'master_slider' => $this->settingModel->where('set_role', 'master_slider')->where('set_status', 1)->findAll(),

            'list_projek' => $this->projekModel->select('projek_nama, projek_slug')->where('projek_status', 2)->findAll(6),
        ];
        // Save into the cache for 1 hours
        cache()->save('setting', $setting, 3600);
    }

    protected function getSettingsCache($page = null)
    {
        if ($page != null && $page === 'home') {
            $setting = array_merge_recursive($this->getSettingByHeader(),$this->getSettingsByHome(), $this->getSettingsByFooter());
        } else {
            $setting = array_merge_recursive($this->getSettingByHeader(), $this->getSettingsByFooter());
        }
        return $setting;
    }

    protected function getSettingByHeader()
    {
        // cek cache setting
        if (!$this->cache->get('setting')) {
            $this->setSettingsCache();
        }

        $setting = [
            'judul' => $this->cache->getMetaData('setting')['data']['judul'] ?? null,
            'logo' => $this->cache->getMetaData('setting')['data']['logo'] ?? null,
        ];

        return $setting;
    }

    protected function getSettingsByHome()
    {
        // cek cache setting
        if (!$this->cache->get('setting')) {
            $this->setSettingsCache();
        }

        $setting = [
            'client' => $this->cache->getMetaData('setting')['data']['client'],
            'master_slider' => $this->cache->getMetaData('setting')['data']['master_slider'],
            'testimoni' => $this->cache->getMetaData('setting')['data']['testimoni'],
        ];
        return $setting;
    }

    protected function getSettingsByFooter()
    {
        // cek cache setting
        if (!$this->cache->get('setting')) {
            $this->setSettingsCache();
        }

        $setting = [
            'sosial_media' => $this->cache->getMetaData('setting')['data']['sosial_media'],
            'quick_link' => $this->cache->getMetaData('setting')['data']['quick_link'],
            'list_projek' => $this->cache->getMetaData('setting')['data']['list_projek'],
            'contact' => $this->cache->getMetaData('setting')['data']['kontak'],
            'location' => $this->cache->getMetaData('setting')['data']['location'],
        ];
        return $setting;
    }
}
