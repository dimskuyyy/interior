<?= $this->extend('front/layout/front_main'); ?>

<?= $this->section('content'); ?>
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact__text">
                    <div class="section-title">
                        <span>Informasi</span>
                        <h2>Detail Kontak</h2>
                    </div>
                    <p>Komitmen kami terhadap kualitas luar biasa tidak pernah goyah. Kami merancang ruang kantor yang meningkatkan produktivitas dan kenyamanan.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact__widget__item">
                    <div class="contact__widget__item__icon">
                        <img src="<?= base_url() ?>img/contact/ci-1.png" alt="">
                    </div>
                    <div class="contact__widget__item__text">
                        <h5>Nomor Hp</h5>
                        <span><?= $setting['contact']['set_value'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact__widget__item">
                    <div class="contact__widget__item__icon">
                        <img src="<?= base_url() ?>img/contact/ci-2.png" alt="">
                    </div>
                    <div class="contact__widget__item__text">
                        <h5>Alamat Email</h5>
                        <span><?= $setting['contact']['set_optional'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact__widget__item last__item">
                    <div class="contact__widget__item__icon">
                        <img src="<?= base_url() ?>img/contact/ci-3.png" alt="">
                    </div>
                    <div class="contact__widget__item__text">
                        <a href="<?= $setting['location']['set_value'] ?>">
                            <h5>Alamat Kami</h5>
                        </a>
                        <span><?= $setting['location']['set_optional'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-5">
            <div class="col-lg-5">
                <div class="contact__form__text">
                    <div class="section-title">
                        <span>Form</span>
                        <h2>Lebih Dekat Dengan Kami</h2>
                    </div>
                    <p>Kemampuan Kami untuk Memberikan Hasil Luar Biasa Bagi Klien Dimulai dari Tim Profesional Kami</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form">
                    <form action="#" method="post" id="form-kontak">
                    <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="nama" placeholder="Nama">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="perihal" placeholder="Perihal">
                            </div>
                            <div class="col-lg-12">
                                <textarea placeholder="Pesan" name="pesan"></textarea>
                                <button type="submit" class="site-btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    /* <![CDATA[ */
    $('#form-kontak').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var btn = form.find('.btn-submit');
        var htm = btn.html();
        //  setLoadingBtn(btn);
        $.ajax({
            url: url + 'kontak/save',
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(res) {
                if (res.status) {
                    successMsg(res.msg);
                    form[0].reset();
                    window.alert('Sukses Mengirimkan')
                } else {
                    errorMsg(res.msg);
                }
            },
            error: function(xhr, status, error) {
                errorMsg('Kontak gagal dikirim');
            }
        })
    });
    /* ]]> */
</script>
<?= $this->endSection() ?>