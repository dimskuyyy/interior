<?php
$request = service('request'); ?>
<?= $this->extend('front/layout/front_main'); ?>

<?= $this->section('content'); ?>

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="<?= base_url() ?>img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Projek Kami</h2>
                    <div class="breadcrumb__links">
                        <a href="<?= base_url() ?>">Beranda</a>
                        <span>Projek</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Project Page Section Begin -->
<section class="project-page spad">
    <div class="container">
        <div class="row justify-content-end contact__form" style="padding: 15px;">
            <select name="kategori" id="kategori_select" style="max-width: 360px;">
                <option value="all">Semua</option>
                <?php foreach ($kategori as $row) { ?>
                    <option value="<?= $row['kat_slug'] ?>" <?= ($request->uri->getTotalSegments() >= 3 && $request->uri->getSegment(3) === $row['kat_slug']) ? 'selected' : ''; ?>><?= $row['kat_nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="row">
            <?php if (count($projek) > 0) {
                foreach ($projek as $row) {
            ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="project__item">
                            <img src="<?= base_url() . 'media/' . $row['media_slug'] ?>" alt="<?= $row['projek_nama'] ?>" style="height: 380px;object-fit:cover">
                            <h4><a href="<?= base_url() . 'projek/' . $row['projek_slug'] ?>"><?= $row['projek_nama'] ?></a></h4>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h1 style="width: 100%;text-align: center;">Tidak Ada Projek</h1>
            <?php } ?>

        </div>
        <?php if (count($projek) > 0) { ?>
            <?= $pager->links('default', 'front'); ?>
        <?php } ?>
    </div>
</section>
<!-- Project Page Section End -->

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $('#kategori_select').on('change', function() {
        let kat_val = this.value;
        if(kat_val == 'all'){
            window.location.href = "<?= base_url() ?>projek/";
        }else{
            window.location.href = "<?= base_url() ?>projek/kategori/" + kat_val;
        }
    });
</script>
<?= $this->endSection() ?>