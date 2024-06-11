<?= $this->extend('front/layout/front_main'); ?>

<?= $this->section('content'); ?>
<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <?php if (isset($setting['master_slider'])) {
            if (count($setting['master_slider']) > 0) {
                foreach ($setting['master_slider'] as $row) {
        ?>
                    <div class="hero__items set-bg" data-setbg="<?= $row['set_value'] ?>">
                        <div class="hero__text">
                            <h2><?= $row['set_optional'] ?></h2>
                            <h2 style="color: white; margin-bottom:2rem;font-size:18px;line-height:22px;text-transform: capitalize;"><?= $row['set_additional'] ?></h2>
                            <a href="<?= base_url('projek') ?>" class="primary-btn">Lihat Projek</a>
                            <?php if (isset($setting['sosial_media'])) {
                                if (count($setting['sosial_media'])) { ?>
                                    <div class="hero__social">
                                        <?php foreach ($setting['sosial_media'] as $row) { ?>
                                            <a href="<?= $row['set_optional'] ?>"><i class="fa fa-<?= $row['set_value'] ?>"></i></a>
                                        <?php } ?>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } ?>

            <?php }
        } else { ?>
            <div class="hero__items set-bg" data-setbg="<?= base_url() ?>img/hero/hero-1.jpg">
                <div class="hero__text">
                    <h2>Quality is not only our standard.</h2>
                    <a href="<?= base_url('projek') ?>" class="primary-btn">Lihat Projek</a>
                    <?php if (isset($setting['sosial_media'])) {
                        if (count($setting['sosial_media'])) { ?>
                            <div class="hero__social">
                                <?php foreach ($setting['sosial_media'] as $row) { ?>
                                    <a href="<?= $row['set_optional'] ?>"><i class="fa fa-<?= $row['set_value'] ?>"></i></a>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="slide-num" id="snh-1"></div>
    <div class="slider__progress"><span></span></div>
</section>
<!-- Hero Section End -->

<!-- About Section Begin -->
<section class="about spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about__text" style="padding-top: 40px;">
                    <div class="section-title">
                        <span>Siapa Kami</span>
                        <h2>Tim Profesional dalam Desain</h2>
                    </div>
                    <div class="about__para__text">
                        <p>
                            Kami adalah tim profesional desain interior yang berdedikasi untuk menghadirkan solusi desain yang inovatif dan estetis. Dengan pendekatan yang menggabungkan kreativitas dan fungsionalitas, kami menciptakan ruang yang tidak hanya indah tetapi juga memenuhi kebutuhan spesifik setiap klien.
                        </p>
                        <p>
                            Metasurfaces umumnya dirancang dengan menempatkan elemen-elemen secara periodik atau semi-periodik. Kami menyusun dan membahas aturan desain untuk metasurfaces fungsional yang ditempatkan secara acak, memastikan setiap elemen berkontribusi pada keseluruhan harmoni desain.
                        </p>
                    </div>
                    <a href="<?= base_url('tentang-kami') ?>" class="primary-btn normal-btn">Lebih Lanjut</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__pic">
                    <div class="about__pic__inner">
                        <img src="<?= base_url() ?>img/about-pic.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Project Section Begin -->
<section class="project">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <span>Portofolio Kami</span>
                    <h2>Interior Design Project</h2>
                </div>
            </div>
        </div>
        <?php if (count($listProjek) > 0) { ?>
            <div class="row">
                <div class="project__slider owl-carousel">
                    <?php foreach ($listProjek as $row) { ?>
                        <div class="col-lg-3">
                            <div class="project__slider__item set-bg" data-setbg="<?= base_url() . 'media/' . $row['media_slug'] ?>">
                                <div class="project__slider__item__hover">
                                    <span><a href="<?= base_url() . 'projek/kategori/' . $row['kat_slug'] ?>" style="color: #dfa667;"><?= $row['kat_nama'] ?></a></span>
                                    <h5 style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><a href="<?= base_url() . 'projek/' . $row['projek_slug'] ?>" style="color: #111111;"><?= $row['projek_nama'] ?></a></h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Project Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Spesialisasi Kami</span>
                    <h2>Apa Yang Kami Lakukan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="<?= base_url() ?>img/services/services-1.png" alt="" />
                    <h4>Desain Interior</h4>
                    <p>
                        Kami berdedikasi untuk memberikan perhatian penuh pada setiap detail, memastikan hasil akhir yang elegan dan fungsional. Mulai dari konsep awal hingga penyelesaian, kami memastikan setiap ruang mencerminkan kepribadian dan kebutuhan klien kami.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="<?= base_url() ?>img/services/services-2.png" alt="" />
                    <h4>Desain Kantor</h4>
                    <p>
                        Komitmen kami terhadap kualitas luar biasa tidak pernah goyah. Kami merancang ruang kantor yang meningkatkan produktivitas dan kenyamanan, membuat setiap tempat kerja lebih inspiratif dan efisien.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="<?= base_url() ?>img/services/services-3.png" alt="" />
                    <h4>Desain Rumah</h4>
                    <p>
                        Sebagai studio arsitektur multidisiplin, kami menciptakan proyek-proyek yang mencakup budaya, hunian, dan komersial di seluruh dunia. Setiap desain rumah kami dirancang untuk menciptakan tempat tinggal yang nyaman dan estetis.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="<?= base_url() ?>img/services/services-4.png" alt="" />
                    <h4>Gambar Desain</h4>
                    <p>
                        Kami menciptakan solusi arsitektur yang kreatif untuk membantu mewujudkan visi klien kami menjadi kenyataan. Setiap gambar desain kami dibuat dengan keakuratan dan kreativitas tinggi, memastikan hasil yang memuaskan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Testimonial Section Begin -->
<?php if (isset($setting['testimoni']) || isset($setting['client'])) {
    if (count($setting['testimoni']) > 0 || count($setting['client']) > 0) {
?>
        <section class="testimonial spad set-bg" data-setbg="<?= base_url() ?>img/testimonial/testimonial-bg.jpg">
            <div class="container">
                <?php if (count($setting['testimoni']) > 0) { ?>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="section-title">
                                <span>Testimoni</span>
                                <h2>Apa yang klien kami katakan</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonial__carousel">
                                <?php foreach ($setting['testimoni'] as $row) { ?>
                                    <div class="testimonial__item">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-xl-9 col-lg-10">
                                                <p>
                                                    <?= $row['set_additional'] ?>
                                                </p>
                                                <div class="testimonial__client__text">
                                                    <h5><?= $row['set_value'] ?></h5>
                                                    <span style="color: #dfa667;"><?= $row['set_optional'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (count($setting['client']) > 0) { ?>
                    <div class="row" style="margin-top: 2rem;">
                        <div class="col-lg-12">
                            <div class="logo__carousel owl-carousel">
                                <?php foreach ($setting['client'] as $row) { ?>
                                    <div class="logo__carousel__item">
                                        <a ><img src="<?=$row['set_value']?>" alt="<?=$row['set_optional']?>" title="<?=$row['set_optional']?>" /></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
<?php }
} ?>
<!-- Testimonial Section End -->

<!-- Call To Action Section Begin -->
<section class="callto spad set-bg" data-setbg="img/call-bg.jpg">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="callto__text">
                    <span>Mengapa Memilih Kami?</span>
                    <h2>
                        Kemampuan Kami untuk Memberikan Hasil Luar Biasa Bagi Klien Dimulai dari Tim Profesional Kami
                    </h2>
                    <a href="<?=base_url('kontak')?>" class="primary-btn">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Section End -->

<?= $this->endSection(); ?>