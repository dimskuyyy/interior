<?= $this->extend('front/layout/front_main'); ?>
<?= $this->section('content') ?>
<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="<?= base_url() ?>img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tentang Kami</h2>
                    <div class="breadcrumb__links">
                        <a href="<?= base_url() ?>">Beranda</a>
                        <span>Tentang Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- About Page Section Begin -->
<section class="about-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="about__text about__page__text">
                    <div class="section-title">
                        <span>Ketahui Lebih Banyak</span>
                        <h2>Tentang Kami</h2>
                    </div>
                    <div class="about__para__text">
                        <p>Sebagai perusahaan yang bermula dari kontraktor interior kelas atas, kami memiliki komitmen kuat untuk menghadirkan desain yang berkualitas tinggi dan detail yang sempurna. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="about__page__services">
                    <div class="about__page__services__text">
                        <p>Kami percaya bahwa hasil luar biasa hanya dapat dicapai melalui dedikasi dan keahlian. Tim kami terdiri dari desainer berbakat dan berpengalaman yang berkomitmen untuk mewujudkan visi Anda dengan sempurna. Dari konsep awal hingga penyelesaian akhir, kami bekerja tanpa lelah untuk memastikan setiap detail terpenuhi sesuai standar tertinggi.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <img src="<?= base_url() ?>img/services/services-5.png" alt="">
                                <h4>Misi Kami</h4>
                                <p>Kami berfokus pada detail dan kualitas. Misi kami adalah memastikan setiap proyek mencerminkan keunikan dan kebutuhan spesifik klien kami. Dengan dedikasi penuh, kami menghadirkan hasil yang melebihi harapan.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="services__item">
                                <img src="<?= base_url() ?>img/services/services-6.png" alt="">
                                <h4>Visi Kami</h4>
                                <p>Kami berkomitmen untuk menjaga standar kualitas luar biasa. Visi kami adalah menjadi perusahaan desain interior yang paling dihormati, dengan reputasi untuk proyek-proyek sukses di berbagai sektor. Kami bertekad untuk terus berinovasi dan memberikan hasil terbaik bagi setiap klien.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Page Section End -->

<!-- Services Section Begin -->
<section class="services services-page spad set-bg" data-setbg="<?= base_url() ?>img/testimonial/testimonial-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Spesialisasi Kami</span>
                    <h2>Layanan Yang Kami Tawarkan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-1.png" alt="">
                    <h4>Desain Interior</h4>
                    <p>Kami berdedikasi untuk memberikan perhatian penuh pada setiap detail, memastikan hasil akhir yang elegan dan fungsional. Mulai dari konsep awal hingga penyelesaian, kami memastikan setiap ruang mencerminkan kepribadian dan kebutuhan klien kami.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-2.png" alt="">
                    <h4>Desain Kantor</h4>
                    <p>
                        Komitmen kami terhadap kualitas luar biasa tidak pernah goyah. Kami merancang ruang kantor yang meningkatkan produktivitas dan kenyamanan, membuat setiap tempat kerja lebih inspiratif dan efisien.</p>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-3.png" alt="">
                    <h4>Desain Rumah</h4>
                    <p>Sebagai studio arsitektur multidisiplin, kami menciptakan proyek-proyek yang mencakup budaya, hunian, dan komersial di seluruh dunia. Setiap desain rumah kami dirancang untuk menciptakan tempat tinggal yang nyaman dan estetis.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-4.png" alt="">
                    <h4>Desain Gambar</h4>
                    <p>Kami menciptakan solusi arsitektur yang kreatif untuk membantu mewujudkan visi klien kami menjadi kenyataan. Setiap gambar desain kami dibuat dengan keakuratan dan kreativitas tinggi, memastikan hasil yang memuaskan..</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Call To Action Section Begin -->
<section class="callto spad set-bg" data-setbg="<?= base_url() ?>img/call-bg.jpg">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="callto__text">
                    <span>Mengapa Memilih Kami?</span>
                    <h2>Kemampuan Kami untuk Memberikan Hasil Luar Biasa Bagi Klien Dimulai dari Tim Profesional Kami</h2>
                    <a href="<?=base_url()?>" class="primary-btn">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Section End -->

<!-- Team Section Begin -->
<!-- <section class="team spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-6">
                <div class="section-title">
                    <span>Our Team</span>
                    <h2>Meet our team</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="team__btn">
                    <a href="#" class="primary-btn normal-btn">View All</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="team__item set-bg" data-setbg="<?= base_url() ?>img/team/team-1.jpg">
                    <div class="team__text">
                        <div class="team__title">
                            <h5>Dolores Webster</h5>
                            <span>CEO & Founder</span>
                        </div>
                        <p>Vestibulum dapibus odio quam, sit amet hendrerit dui ultricies consectetur. Ut viverra
                            porta leo, non tincidunt mauris condimentum eget. Vivamus non turpis elit. Aenean
                            ultricies nisl sit amet.</p>
                        <div class="team__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team__item set-bg" data-setbg="<?= base_url() ?>img/team/team-2.jpg">
                    <div class="team__text">
                        <div class="team__title">
                            <h5>Dana Vaughn</h5>
                            <span>Architect</span>
                        </div>
                        <p>Vestibulum dapibus odio quam, sit amet hendrerit dui ultricies consectetur. Ut viverra
                            porta leo, non tincidunt mauris condimentum eget. Vivamus non turpis elit. Aenean
                            ultricies nisl sit amet.</p>
                        <div class="team__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team__item set-bg" data-setbg="<?= base_url() ?>img/team/team-3.jpg">
                    <div class="team__text">
                        <div class="team__title">
                            <h5>Jonathan Mcdaniel</h5>
                            <span>Architect</span>
                        </div>
                        <p>Vestibulum dapibus odio quam, sit amet hendrerit dui ultricies consectetur. Ut viverra
                            porta leo, non tincidunt mauris condimentum eget. Vivamus non turpis elit. Aenean
                            ultricies nisl sit amet.</p>
                        <div class="team__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Team Section End -->
<?= $this->endSection() ?>