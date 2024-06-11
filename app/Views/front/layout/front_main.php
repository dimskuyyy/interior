<!DOCTYPE html>
<html lang="zxx">

<?php

use function PHPUnit\Framework\isNull;
 ?>

<head>
    <title><?= isset($title) ? esc($title) . ' | ' : '' ?>Interior Design</title>
    <meta name="description" content="<?= isset($description) ? esc($description) : $setting['judul']['set_additional'] ?>">
    <meta name="keywords" content="<?= isset($keywords) ? esc($keywords) . ', ' : '' ?>interior,design,desain,rumah,kantor,eksterior,minimalis,modern">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="<?= base_url(uri_string()); ?>">

    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <meta itemprop="name" content="Gapoktan Berkah Basamo - Lubuk Terentang">
    <meta itemprop="description" content="<?= isset($description) ? esc($description) : $setting['judul']['set_additional'] ?>">
    <meta itemprop="image" content="<?= isset($image) ? esc($image) : base_url('img/project/project-p5.jpg') ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url() ?>css/front/bootstrap.min.css" type="text/css">
    <?= $this->renderSection('plugin_css') ?>
    <link rel="stylesheet" href="<?= base_url() ?>css/front/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>css/front/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>css/front/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>css/front/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>css/front/slick.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>css/front/style.css" type="text/css">
    <?= $this->renderSection('css') ?>
</head>

<body>
    <?= $this->include('front/layout/front_header') ?>

    <?= $this->renderSection('content'); ?>
    <?= $this->include('front/layout/front_footer') ?>

    <script src="<?=base_url()?>js/front/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>js/front/bootstrap.min.js"></script>
    <?= $this->renderSection('plugin_js') ?>
    <script src="<?=base_url()?>js/front/jquery.slicknav.js"></script>
    <script src="<?=base_url()?>js/front/owl.carousel.min.js"></script>
    <script src="<?=base_url()?>js/front/slick.min.js"></script>
    <script src="<?=base_url()?>js/front/main.js"></script>
    <script>
        var url = '<?= base_url() ?>';
    </script>

    <?= $this->renderSection('js') ?>
</body>

</html>