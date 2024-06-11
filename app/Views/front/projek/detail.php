<?= $this->extend('front/layout/front_main'); ?>

<?= $this->section('content'); ?>

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="<?=base_url()?>img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?=$projek['projek_nama']?></h2>
                    <div class="breadcrumb__links">
                        <a href="<?=base_url()?>">Beranda</a>
                        <a href="<?=base_url('projek')?>">Projek</a>
                        <span>Detail Projek</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Project Details Section Begin -->
<section class="project-details spad">
    <div class="container">
        <?=$projek['projek_konten']?>
    </div>
</section>
<!-- Project Details Section End -->
<?= $this->endSection() ?>