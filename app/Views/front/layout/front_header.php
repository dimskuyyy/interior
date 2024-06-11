<?php
$request = service('request'); ?>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__logo">
        <a href="<?= base_url() ?>"><img src="<?= isset($setting['logo']) ? $setting['logo']['set_value'] : base_url('img/logo.png') ?>" alt="" style="height: 43px;" /></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__widget">
        <?php if (isset($setting['contact'])) : ?>
            <span>Hubungi Kami</span>
            <h4><?= $setting['contact']['set_value'] ?></h4>
        <?php endif ?>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="<?= base_url() ?>"><img src="<?= isset($setting['logo']) ? $setting['logo']['set_value'] : base_url('img/logo.png') ?>" alt="" style="height: 43px;" /></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="<?= ($request->uri->getTotalSegments() == 0) ? 'active' : ''; ?>"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="<?= ($request->uri->getTotalSegments() >= 2 && $request->uri->getSegment(2) === "tentang-kami") ? 'active' : ''; ?>"><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
                        <li class="<?= ($request->uri->getTotalSegments() >= 2 && $request->uri->getSegment(2) === "projek") ? 'active' : ''; ?>"><a href="<?= base_url('projek') ?>">Projects</a></li>
                        <li class="<?= ($request->uri->getTotalSegments() >= 2 && $request->uri->getSegment(2) === "kontak") ? 'active' : ''; ?>"><a href="<?= base_url('kontak') ?>">Kontak</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__widget">
                    <?php if (isset($setting['contact'])) : ?>
                        <span>Hubungi Kami</span>
                        <h4><?= $setting['contact']['set_value'] ?></h4>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->