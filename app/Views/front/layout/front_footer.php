<footer class="footer set-bg" data-setbg="<?= base_url() ?>img/footer-bg.jpg">
    <div class="container">
        <div class="footer__top">
            <div class="row">
                <div class="col-lg-12 col-md-8">
                    <div class="footer__top__text">
                        <h2>Siap Untuk Menerima Layanan Kami?</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="<?= isset($setting['logo']) ? $setting['logo']['set_value'] : base_url('img/logo.png') ?>" alt="" style="height: 43px;" /></a>
                    </div>
                    <?php if (isset($setting['judul'])) {
                        if (!empty($settingp['judul']['set_additional'])) {
                    ?>
                            <p><?= $settingp['judul']['set_additional'] ?></p>
                    <?php }
                    } ?>
                    <?php if (isset($setting['sosial_media'])) { ?>
                        <div class="footer__social">
                            <?php if (count($setting['sosial_media']) > 0) {
                                foreach ($setting['sosial_media'] as $row) {
                            ?>

                                    <a href="<?= $row['set_optional'] ?>"><i class="fa fa-<?= $row['set_value'] ?>"></i></a>
                            <?php }
                            } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Quick Links</h6>
                    <?php if (isset($setting['quick_link'])) { ?>
                        <ul>
                            <?php if (count($setting['quick_link']) > 0) {
                                foreach ($setting['quick_link'] as $row) {
                            ?>
                                    <li><a href="<?= $row['set_optional'] ?>"><?= $row['set_value'] ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Recent Project</h6>
                    <?php if (isset($setting['list_projek'])) { ?>
                        <ul>
                            <?php if (count($setting['list_projek']) > 0) {
                                foreach ($setting['list_projek'] as $row) {
                            ?>
                                    <li><a href="<?= base_url() ?>projek/<?= $row['projek_slug'] ?>" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?= $row['projek_nama'] ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__address">
                    <h6>Lebih Lanjut</h6>
                    <?php if (isset($setting['location'])) { ?>
                        <a href="<?= $setting['location']['set_value'] ?>">
                            <p><?= $setting['location']['set_optional'] ?><br /><?= $setting['location']['set_additional'] ?></p>
                        </a>
                    <?php } ?>
                    <ul>
                        <?php if (isset($setting['contact'])) : ?>
                            <li><?= $setting['contact']['set_value'] ?></li>
                            <li><?= $setting['contact']['set_optional'] ?></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="copyright__text">
                        <p style="opacity: 0.3;">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This template is made with
                            <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>