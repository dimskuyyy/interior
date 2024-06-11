<style>
    /* SOCIAL MEDIA ICONS 
    ===================== */
    .sc-sm,
    .sc-md {
        background-image: url("<?= base_url('img/front/social-media-icons.png'); ?>");
        /* background-image: url("../img/social-media-icons.png"); */
        color: white;
        font-family: FontAwesome;
        font-style: normal;
        float: left;
        text-align: center;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-transition: background-color;
        transition: background-color;
        -webkit-transition: background-color 0.4s ease-out;
        transition: background-color 0.4s ease-out;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }

    .sc-sm:hover:not(.sc-dark),
    .sc-md:hover:not(.sc-dark) {
        background-color: #fd4a29;
    }

    .sc-sm.sc-mail,
    .sc-md.sc-mail {
        background: #2EA2CC;
    }

    .sc-sm.sc-mail:before,
    .sc-md.sc-mail:before {
        content: '\f0e0';
    }

    .sc-sm.sc-codepen,
    .sc-md.sc-codepen {
        background: #252527;
    }

    .sc-sm.sc-codepen:before,
    .sc-md.sc-codepen:before {
        content: "\f1cb";
    }

    .sc-sm.sc-foursquare,
    .sc-md.sc-foursquare {
        background: #009fe0;
    }

    .sc-sm.sc-foursquare:before,
    .sc-md.sc-foursquare:before {
        content: "\f180";
    }

    .sc-sm.sc-reddit,
    .sc-md.sc-reddit {
        background: #6CC0FE;
    }

    .sc-sm.sc-reddit:before,
    .sc-md.sc-reddit:before {
        content: "\f1a1";
    }

    .sc-sm.sc-renren,
    .sc-md.sc-renren {
        background: #105BA3;
    }

    .sc-sm.sc-renren:before,
    .sc-md.sc-renren:before {
        content: "\f18b";
    }

    .sc-sm.sc-stack-exchange,
    .sc-md.sc-stack-exchange {
        background: #12457C;
    }

    .sc-sm.sc-stack-exchange:before,
    .sc-md.sc-stack-exchange:before {
        content: "\f18d";
    }

    .sc-sm.sc-stack-overflow,
    .sc-md.sc-stack-overflow {
        background: #f90;
    }

    .sc-sm.sc-stack-overflow:before,
    .sc-md.sc-stack-overflow:before {
        content: "\f16c";
    }

    .sc-sm.sc-steam,
    .sc-md.sc-steam {
        background: #3b3938;
    }

    .sc-sm.sc-steam:before,
    .sc-md.sc-steam:before {
        content: "\f1b6";
    }

    .sc-sm.sc-tencent-weibo,
    .sc-md.sc-tencent-weibo {
        background: #46C1E3;
    }

    .sc-sm.sc-tencent-weibo:before,
    .sc-md.sc-tencent-weibo:before {
        content: "\f1d5";
    }

    .sc-sm.sc-vine,
    .sc-md.sc-vine {
        background: #00bf8f;
    }

    .sc-sm.sc-vine:before,
    .sc-md.sc-vine:before {
        content: "\f1ca";
    }

    .sc-sm.sc-vk,
    .sc-md.sc-vk {
        background: #4E729A;
    }

    .sc-sm.sc-vk:before,
    .sc-md.sc-vk:before {
        content: "\f189";
    }

    .sc-sm.sc-weibo,
    .sc-md.sc-weibo {
        background: #e64141;
    }

    .sc-sm.sc-weibo:before,
    .sc-md.sc-weibo:before {
        content: "\f18a";
    }

    /* Icons Colors
    --------------- */
    .sc-facebook {
        background-color: #5d82d1;
    }

    .sc-pinterest {
        background-color: #e13138;
    }

    .sc-twitter {
        background-color: #080808;
    }

    .sc-tiktok {
        background-color: #080807;
    }

    .sc-rss {
        background-color: #faa33d;
    }

    .sc-vimeo {
        background-color: #35c6ea;
    }

    .sc-evernote {
        background-color: #9acf4f;
    }

    .sc-dribbble {
        background-color: #f7659c;
    }

    .sc-tumblr {
        background-color: #426d9b;
    }

    .sc-behance {
        background-color: #1879fd;
    }

    .sc-stumbleupon {
        background-color: #ff5c30;
    }

    .sc-dropbox {
        background-color: #17a3eb;
    }

    .sc-soundcloud {
        background-color: #ff7e30;
    }

    .sc-picasa {
        background-color: #9eb5b6;
    }

    .sc-lastfm {
        background-color: #f34320;
    }

    .sc-forrst {
        background-color: #45ad76;
    }

    .sc-flickr {
        background-color: #ff48a3;
    }

    .sc-deviantart {
        background-color: #6a8a7b;
    }

    .sc-linkedin {
        background-color: #238cc8;
    }

    .sc-blogger {
        background-color: #ff9233;
    }

    .sc-instagram {
        background-color: #548bb6;
    }

    .sc-yahoo {
        background-color: #ab47ac;
    }

    .sc-youtube {
        background-color: #ef4e41;
    }

    .sc-threads {
        background-color: #080807;
    }

    .sc-digg {
        background-color: #75788d;
    }

    .sc-skype {
        background-color: #13c1f3;
    }

    .sc-sharethis {
        background-color: #25a774;
    }

    .sc-wordpress {
        background-color: #2592c3;
    }

    .sc-kickstarter {
        background-color: #8cd049;
    }

    .sc-bebo {
        background-color: #ee3849;
    }

    .sc-zerply {
        background-color: #9dbc7a;
    }

    .sc-amazon {
        background-color: #ff8e2e;
    }

    .sc-myspace {
        background-color: #008dde;
    }

    .sc-wikipedia {
        background-color: #b3b5b8;
    }

    .sc-technorati {
        background-color: #71d14b;
    }

    .sc-addthis {
        background-color: #ff7850;
    }

    .sc-delicious {
        background-color: #377bda;
    }

    .sc-xing {
        background-color: #1a8e8c;
    }

    .sc-quora {
        background-color: #ea3d23;
    }

    .sc-github {
        background-color: #3f91cb;
    }

    .sc-feedly {
        background-color: #2bb24c;
    }

    /* Small Icons
    -------------- */
    .sc-sm {
        background-size: 1230px;
        font-size: 20px;
        height: 30px;
        line-height: 30px;
        width: 30px;
        -webkit-box-shadow: inset 0 15px 0 0 rgba(255, 255, 255, 0.2);
        box-shadow: inset 0 15px 0 0 rgba(255, 255, 255, 0.2);
    }

    .sc-sm.sc-facebook {
        /*rtl:begin:ignore*/
        background-position: 0 0;
    }

    .sc-sm.sc-pinterest {
        background-position: -30px 0;
    }

    .sc-sm.sc-twitter {
        background-position: -60px 0;
    }

    .sc-sm.sc-tiktok {
        background-position: -90px 0;
    }

    .sc-sm.sc-rss {
        background-position: -120px 0;
    }

    .sc-sm.sc-vimeo {
        background-position: -150px 0;
    }

    .sc-sm.sc-evernote {
        background-position: -180px 0;
    }

    .sc-sm.sc-dribbble {
        background-position: -210px 0;
    }

    .sc-sm.sc-tumblr {
        background-position: -240px 0;
    }

    .sc-sm.sc-behance {
        background-position: -270px 0;
    }

    .sc-sm.sc-stumbleupon {
        background-position: -300px 0;
    }

    .sc-sm.sc-dropbox {
        background-position: -330px 0;
    }

    .sc-sm.sc-soundcloud {
        background-position: -360px 0;
    }

    .sc-sm.sc-picasa {
        background-position: -390px 0;
    }

    .sc-sm.sc-lastfm {
        background-position: -420px 0;
    }

    .sc-sm.sc-forrst {
        background-position: -450px 0;
    }

    .sc-sm.sc-flickr {
        background-position: -480px 0;
    }

    .sc-sm.sc-deviantart {
        background-position: -510px 0;
    }

    .sc-sm.sc-linkedin {
        background-position: -540px 0;
    }

    .sc-sm.sc-blogger {
        background-position: -570px 0;
    }

    .sc-sm.sc-instagram {
        background-position: -600px 0;
    }

    .sc-sm.sc-yahoo {
        background-position: -630px 0;
    }

    .sc-sm.sc-youtube {
        background-position: -660px 0;
    }

    .sc-sm.sc-threads {
        background-position: -690px 0;
    }

    .sc-sm.sc-digg {
        background-position: -720px 0;
    }

    .sc-sm.sc-skype {
        background-position: -750px 0;
    }

    .sc-sm.sc-sharethis {
        background-position: -780px 0;
    }

    .sc-sm.sc-wordpress {
        background-position: -810px 0;
    }

    .sc-sm.sc-kickstarter {
        background-position: -840px 0;
    }

    .sc-sm.sc-bebo {
        background-position: -870px 0;
    }

    .sc-sm.sc-zerply {
        background-position: -900px 0;
    }

    .sc-sm.sc-amazon {
        background-position: -930px 0;
    }

    .sc-sm.sc-myspace {
        background-position: -960px 0;
    }

    .sc-sm.sc-wikipedia {
        background-position: -990px 0;
    }

    .sc-sm.sc-technorati {
        background-position: -1020px 0;
    }

    .sc-sm.sc-addthis {
        background-position: -1050px 0;
    }

    .sc-sm.sc-delicious {
        background-position: -1080px 0;
    }

    .sc-sm.sc-xing {
        background-position: -1110px 0;
    }

    .sc-sm.sc-quora {
        background-position: -1140px 0;
    }

    .sc-sm.sc-github {
        background-position: -1170px 0;
    }

    .sc-sm.sc-feedly {
        background-position: -1200px 0;
        /*rtl:end:ignore*/
    }

    /* Medium Icons
    --------------- */
    .sc-md {
        font-size: 30px;
        height: 45px;
        line-height: 45px;
        width: 45px;
        -webkit-box-shadow: inset 0 22.5px 0 0 rgba(255, 255, 255, 0.2);
        box-shadow: inset 0 22.5px 0 0 rgba(255, 255, 255, 0.2);
    }

    .sc-md.sc-facebook {
        /*rtl:begin:ignore*/
        background-position: 0 0;
    }

    .sc-md.sc-pinterest {
        background-position: -45px 0;
    }

    .sc-md.sc-twitter {
        background-position: -90px 0;
    }

    .sc-md.sc-tiktok {
        background-position: -135px 0;
    }

    .sc-md.sc-rss {
        background-position: -180px 0;
    }

    .sc-md.sc-vimeo {
        background-position: -225px 0;
    }

    .sc-md.sc-evernote {
        background-position: -270px 0;
    }

    .sc-md.sc-dribbble {
        background-position: -315px 0;
    }

    .sc-md.sc-tumblr {
        background-position: -360px 0;
    }

    .sc-md.sc-behance {
        background-position: -405px 0;
    }

    .sc-md.sc-stumbleupon {
        background-position: -450px 0;
    }

    .sc-md.sc-dropbox {
        background-position: -495px 0;
    }

    .sc-md.sc-soundcloud {
        background-position: -540px 0;
    }

    .sc-md.sc-picasa {
        background-position: -585px 0;
    }

    .sc-md.sc-lastfm {
        background-position: -630px 0;
    }

    .sc-md.sc-forrst {
        background-position: -675px 0;
    }

    .sc-md.sc-flickr {
        background-position: -720px 0;
    }

    .sc-md.sc-deviantart {
        background-position: -765px 0;
    }

    .sc-md.sc-linkedin {
        background-position: -810px 0;
    }

    .sc-md.sc-blogger {
        background-position: -855px 0;
    }

    .sc-md.sc-instagram {
        background-position: -900px 0;
    }

    .sc-md.sc-yahoo {
        background-position: -945px 0;
    }

    .sc-md.sc-youtube {
        background-position: -990px 0;
    }

    .sc-md.sc-threads {
        background-position: -1035px 0;
    }

    .sc-md.sc-digg {
        background-position: -1080px 0;
    }

    .sc-md.sc-skype {
        background-position: -1125px 0;
    }

    .sc-md.sc-sharethis {
        background-position: -1170px 0;
    }

    .sc-md.sc-wordpress {
        background-position: -1215px 0;
    }

    .sc-md.sc-kickstarter {
        background-position: -1260px 0;
    }

    .sc-md.sc-bebo {
        background-position: -1305px 0;
    }

    .sc-md.sc-zerply {
        background-position: -1350px 0;
    }

    .sc-md.sc-amazon {
        background-position: -1395px 0;
    }

    .sc-md.sc-myspace {
        background-position: -1440px 0;
    }

    .sc-md.sc-wikipedia {
        background-position: -1485px 0;
    }

    .sc-md.sc-technorati {
        background-position: -1530px 0;
    }

    .sc-md.sc-addthis {
        background-position: -1575px 0;
    }

    .sc-md.sc-delicious {
        background-position: -1620px 0;
    }

    .sc-md.sc-xing {
        background-position: -1665px 0;
    }

    .sc-md.sc-quora {
        background-position: -1710px 0;
    }

    .sc-md.sc-github {
        background-position: -1755px 0;
    }

    .sc-md.sc-feedly {
        background-position: -1800px 0;
        /*rtl:end:ignore*/
    }

    /* Dark Icons 
    ----------------------------------------------------------------------------- */
    .sc-dark:not(:hover) {
        background-color: transparent;
        opacity: 0.6;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    /* Icons on Widget
    ------------------ */
    ul.social {
        list-style: none;
        margin: 0;
        padding: 0;
        margin: 0 -9.04px -18px -9px;
        /*IE needs 0.04px extra margin*/
    }

    ul.social li {
        float: left;
    }

    ul.social li {
        margin: 0 9px 18px 9px;
    }

    ul.social li span {
        float: left;
    }

    #footer-main ul.social {
        margin: 0 -10px -9.5px 0;
    }

    #footer-main ul.social li {
        margin: 0 9.5px 9.5px 0;
    }

    #footer-main ul.social li .sc-dark:not(:hover) {
        background-color: #606068;
    }

    input[type='text'] {
        height: 34px;
        background-color: white;
        margin: 0px;
    }

    textarea {
        background-color: white;
        border: 1px solid #e4e4ec;
        padding: 6px 12px;
    }

    textarea:focus {
        border-color: #66afe9;
        outline: 0;
    }

    .value-social-media li {
        cursor: pointer;
    }

    .value-social-media {
        display: none;
    }

    .value-social-media.active {
        display: block;
    }

    .value-media {
        max-width: 100%;
        width: 400px;
        height: 200px;
        background-color: #ddd;
        overflow-x: hidden;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .btn-value-media {
        display: none;
    }

    .value-icon {
        margin: 0px !important;
        border: 1px solid #ccc;
        padding: 12px 6px !important;
        display: none;
    }

    .value-icon li {
        margin-bottom: 0px !important;
    }

    .value-icon li i {
        font-size: 18px;
    }

    .value-media.active {
        display: flex;
    }

    .btn-value-media.active,
    .value-icon.active {
        display: block;
    }

    .value-media img {
        background-color: #ddd;
        height: 200px;
        max-width: 100%;
        object-fit: contain;
    }
</style>

<?php
helper(['form']);
?>

<div class="box-body">
    <div>
        <!-- Tab panes -->
        <div class="tab-content" style="margin-top: 2rem;">
            <div role="tabpanel" class="tab-pane active" id="judul">
                <?php echo form_open('#', ['class' => 'form-setting']);
                echo form_hidden('role', $data['set_role'] ?? $create['set_role']);
                if (isset($data)) {
                    echo form_hidden('id', $data['set_id']);
                }
                ?>
                <div class="form-group value-set">
                    <label for="value">Value Setting</label><br>
                    <div style="display: flex;flex-wrap:nowrap;align-items:center;margin-bottom:1rem">
                        <input type="text" name="value" style="width: 100%; flex-grow: 1;" class="form-control" value="<?= isset($data) ? $data['set_value'] : ''; ?>" required id="value" disabled>
                        <button class="btn btn-primary btn-value-media" style="margin-left:1rem" type="button">
                            <i class="fa fa-upload" aria-hidden="true" style="font-size: 18px;"></i>
                        </button>
                    </div>
                    <ul class="value-social-media social clearfix" style="padding:16px 4px 0px;border:1px solid #ccc;margin:0px">
                        <?php if (isset($data['set_value'])) : ?>
                            <li class="btn btn-default btn-flat" data-value="<?= $data['set_value']; ?>"><span class="sc-sm sc-<?= $data['set_value']; ?>" title="<?= $data['set_value']; ?>"></span></li>
                        <?php else : ?>
                            <li class="btn btn-default btn-flat" data-value="facebook"><i class="fa fa-facebook" title="facebook"></i></li>
                            <li class="btn btn-default btn-flat" data-value="twitter"><i class="fa fa-twitter" title="twitter"></i></li>
                            <li class="btn btn-default btn-flat" data-value="instagram"><i class="fa fa-instagram" title="twitter"></i></li>
                            <li class="btn btn-default btn-flat" data-value="whatsapp"><i class="fa fa-whatsapp" title="whatsapp"></i></li>
                            <li class="btn btn-default btn-flat" data-value="linkedin"><i class="fa fa-linkedin" title="linkedin"></i></li>
                            <li class="btn btn-default btn-flat" data-value="behance"><i class="fa fa-behance" title="behance"></i></li>
                            <li class="btn btn-default btn-flat" data-value="pinterest-p"><i class="fa fa-pinterest-p" title="pinterest-p"></i></li>
                            <li class="btn btn-default btn-flat" data-value="medium"><i class="fa fa-medium" title="medium"></i></li>
                            <li class="btn btn-default btn-flat" data-value="deviantart"><i class="fa fa-deviantart" title="deviantart"></i></li>
                            <li class="btn btn-default btn-flat" data-value="snapchat-ghost"><i class="fa fa-snapchat-ghost" title="snapchat-ghost"></i></li>
                            <li class="btn btn-default btn-flat" data-value="youtube-play"><i class="fa fa-youtube-play" title="youtube-play"></i></li>
                            <li class="btn btn-default btn-flat" data-value="google"><i class="fa fa-google" title="google"></i></li>
                            <li class="btn btn-default btn-flat" data-value="link"><i class="fa fa-link" title="link"></i></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="value-icon social clearfix">
                        <?php if (isset($data['set_value'])) : ?>
                            <li class="btn btn-flat btn-default" data-value="<?= $data['set_value']; ?>"><i class="fa fa-<?= $data['set_value']; ?>"></i></li>
                        <?php else : ?>
                            <li class="btn btn-flat btn-default" data-value="phone"><i class="fa fa-phone"></i></li>
                            <li class="btn btn-flat btn-default" data-value="whatsapp"><i class="fa fa-whatsapp"></i></li>
                            <li class="btn btn-flat btn-default" data-value="snapchat-ghost"><i class="fa fa-snapchat-ghost"></i></li>
                            <li class="btn btn-flat btn-default" data-value="envelope"><i class="fa fa-envelope"></i></li>
                            <li class="btn btn-flat btn-default" data-value="address-card"><i class="fa fa-address-card"></i></li>
                            <li class="btn btn-flat btn-default" data-value="comment"><i class="fa fa-comment"></i></li>
                            <li class="btn btn-flat btn-default" data-value="question-circle"><i class="fa fa-question-circle"></i></li>
                        <?php endif; ?>
                    </ul>
                    <div class="value-media">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="form-group set-optional">
                    <label for="optional">Optional Value Setting</label><br>
                    <textarea id="optional" style=" width: 100%;" name="optional" rows="5" disabled><?= isset($data) ? $data['set_optional'] : ''; ?></textarea>
                </div>
                <div class="form-group set-additional">
                    <label for="additional">Additional Value Setting</label><br>
                    <textarea id="additional" style=" width: 100%;" name="additional" rows="5" disabled><?= isset($data) ? $data['set_additional'] : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for='status'>Status</label><br>
                    <label><input type="radio" class="status" name="status" value="1" <?= isset($data) ? ($data['set_status'] == 1 ? 'checked' : '') : 'checked' ?> required disabled> Active</label>
                    <label><input type="radio" class="status" name="status" value="2" <?= isset($data) ? ($data['set_status'] == 2 ? 'checked' : '') : '' ?> required disabled> In Active</label>
                </div>
                <div class="modal-footer set-submit">
                    <button type="button" class="btn btn-danger btn-close-form" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                    <button type="submit" class="btn btn-primary btn-submit" disabled><i class="fa fa-save"></i> Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        let placeholder = "<?= base_url('img/front/placeholder/180x180.png') ?>";
        let set = 0;
        let stage = 0;
        const form = $('.form-setting'),
            role = $('input[name="role"]'),
            valueLabel = $('.value-set label'),
            value = $('#value'),
            mediaButton = $('.btn-value-media'),
            socialMediaList = $('.value-social-media'),
            socialMediaValue = $('.value-social-media li'),
            iconList = $('.value-icon'),
            iconValue = $('.value-icon li'),
            mediaContent = $('.value-media'),
            mediaPreview = $('.value-media img'),
            optionalLabel = $('.set-optional label'),
            optional = $('.set-optional #optional'),
            additionalLabel = $('.set-additional label'),
            additional = $('.set-additional #additional'),
            setSubmit = $('.set-submit .btn-submit'),
            status = $('.status');

        checkRole()
        mediaPreview.attr('src', "<?= $data['set_value'] ?? ''; ?>");

        $('.btn-list,.btn-close-form').click(function(e) {
            e.preventDefault();
            loadData();
        });

        function checkRole() {
            let roleValue = role.val();
            switch (roleValue) {
                case "sosial_media":
                    enableInput(true, socialMediaList);
                    switchInput({
                        valLabel: 'Social Media Brand',
                        optLabel: 'Link Social Media',
                        valPhd: 'ex. instagram, youtube, ...',
                        optPhd: 'ex. https://xxx...',
                        valReadonly: true
                    });
                    $('.set-additional').css('display', 'none');
                    break;
                case "quick_link":
                    enableInput(true);
                    switchInput({
                        valLabel: 'Nama Link',
                        optLabel: 'URL Link',
                        valPhd: 'ex. Benchmark...',
                        optPhd: 'ex. https://...',
                        valReadonly: false
                    });
                    $('.set-additional').css('display', 'none');
                    break;
                case "testimoni":
                    enableInput(true);
                    switchInput({
                        valLabel: 'Nama Tester',
                        optLabel: 'Company/University',
                        addLabel: 'Testimoni',
                        valPhd: 'ex. John Doe...',
                        optPhd: 'ex. PT. Rubber ABC...',
                        addPhd: 'ex. Pesan dari client/tester...',
                        valReadonly: false
                    });
                    break;
                case "client":
                    enableInput(true, mediaContent, mediaButton);
                    switchInput({
                        valLabel: 'Link Logo',
                        optLabel: 'Alternative Text',
                        valPhd: 'ex. https://imagepath...',
                        optPhd: 'ex. Gambar Perusahaan Rubber...',
                        valReadonly: false
                    });
                    $('.set-additional').css('display', 'none');
                    break;
                case "master_slider":
                    enableInput(true, mediaContent, mediaButton);
                    switchInput({
                        valLabel: 'Link Gambar',
                        optLabel: 'Judul Slide',
                        addLabel: 'Deskripsi Slide',
                        valPhd: 'ex. https://imagepath...',
                        optPhd: 'ex. Produsen Produk Karet Berkualitas...',
                        addPhd: 'ex. Menyediakan produk-produk karet berkualitas dan dipercaya oleh masyarakat...',
                        valReadonly: false
                    });
                    break;
                default:
                    form[0].reset();
                    switchInput({
                        valLabel: 'Value Setting',
                        optLabel: 'Optional Value Setting',
                        valPhd: ' ',
                        optPhd: ' ',
                        valReadonly: true
                    });
                    enableInput(false);
                    break;
            }

        }

        function switchInput(obj) {
            if (obj.valLabel != undefined) valueLabel.text(obj.valLabel);
            if (obj.optLabel != undefined) optionalLabel.text(obj.optLabel);
            if (obj.addLabel != undefined) additionalLabel.text(obj.addLabel);
            if (obj.valPhd != undefined) value.attr('placeholder', obj.valPhd);
            if (obj.optPhd != undefined) optional.attr('placeholder', obj.optPhd);
            if (obj.addPhd != undefined) additional.attr('placeholder', obj.addPhd);
            if (obj.valReadonly != undefined) value.prop('readonly', obj.valReadonly);
        }

        function enableInput(enable = true, ...args) {
            let el = [value, status, optional, additional, setSubmit];
            let hiddenFeatures = [mediaButton, socialMediaList, iconList, mediaContent];
            let input = [value, optional];
            mediaPreview.attr('src', '');
            if (enable) {
                el.forEach(item => item.prop('disabled', false));
                hiddenFeatures.forEach(el => el.removeClass('active'));
                args.forEach(el => el.addClass('active'));
            } else {
                hiddenFeatures.forEach(el => el.removeClass('active'));
                el.forEach(item => item.prop('disabled', true));
            }
        }

        function mediaPreviewForm(url) {
            let roleVal = role.val();
            switch (roleVal) {
                case "client":
                case "master_slider":
                    mediaPreview.attr('src', url);
                    break;
                default:
                    mediaPreview.attr('src', '');
                    break;
            }
        }

        mediaButton.on('click', function(e) {
            e.preventDefault();
            let btn = $(this);
            let htm = btn.html();
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/projek/media',
                data: {
                    key: 'image'
                },
                type: 'post',
                success: function(res) {
                    resetLoadingBtn(btn, htm);
                    $('.mymodal').html(res).modal('show');
                    setLoadingBtn($('.mymodal #media-list'));
                    viewList(1, null);
                    set = 0;
                },
                error: function(xhr, status, error) {
                    errorMsg(error);
                    resetLoadingBtn(btn, htm);
                },
            });
        })

        $('.mymodal').on('click', '.modal-content .modal-body .tab-content #media-list .row .media', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let btn = $(this).find('#insert-media');
            let htm = btn.html();
            let id = $(this).data('id');
            let call = $('.mymodal .modal-dialog').data('call');
            if (call == 'image') {
                if (id) {
                    setLoadingBtn(btn);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='X-CSRF-TOKEN']").attr('content')
                        }
                    });
                    $.ajax({
                        url: base_url + '/projek/detail',
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            let url_media = `${root_url}media/${res.data.media_slug}`;
                            if (call == 'image') {
                                value.val(url_media);
                                mediaPreview.attr('src', url_media);
                            }
                            resetLoadingBtn(btn, htm);
                            $('.mymodal').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            let response = JSON.parse(xhr.responseText);
                            let errorMessage = response.msg;
                            errorMsg(errorMessage);
                            resetLoadingBtn(btn, htm);
                        }
                    });
                }
            }
        });

        $('.mymodal').submit('.form-media', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let call = $('.mymodal .modal-dialog').data('call');
            console.log(call);
            if (call == 'image' && stage == set) {
                let form = $('.mymodal .form-media');
                let formData = new FormData($('.mymodal .form-media')[0]);
                let btn = form.find('.btn-submit');
                let htm = btn.html();
                setLoadingBtn(btn);
                $.ajax({
                    url: base_url + '/media/save',
                    type: 'post',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    success: function(res) {
                        if (res.message.status) {
                            successMsg(res.message.msg);
                            let url_media = `${root_url}media/${res.data.media_slug}`;
                            if (call == 'image') {
                                value.val(url_media);
                                mediaPreview.attr('src', url_media);
                            }
                            $('.mymodal').modal('hide');
                        } else {
                            resetLoadingBtn(btn, htm);
                            errorMsg(res.message.msg);
                        }
                        resetLoadingBtn(btn, htm);
                        form[0].reset();
                        set++;
                    },
                    error: function(xhr, status, error) {
                        resetLoadingBtn(btn, htm);
                        errorMsg(error);
                    }
                })
            }
        });

        role.on('change', function() {
            checkRole();
        });

        value.on('input', function() {
            mediaPreviewForm($(this).val());
        });

        $(socialMediaValue).on('click', function() {
            value.val($(this).data('value'));
        })

        $(iconValue).on('click', function() {
            value.val($(this).data('value'));
        })

        $('#myTabs a').click(function(e) {
            e.preventDefault()
            $(this).tab('show')
        });

        $("#imageInput").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('.form-setting').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var btn = form.find('.btn-submit');
            var htm = btn.html();
            setLoadingBtn(btn);
            const content = $('.box');
            $.ajax({
                url: base_url + '/setting/save',
                type: 'post',
                dataType: 'json',
                data: form.serialize(),
                success: function(res) {
                    if (res.status) {
                        successMsg(res.msg);
                        setTimeout(function() {
                            loadData();
                        }, 300);
                    } else {
                        errorMsg(res.msg);
                    }
                    resetLoadingBtn(btn, htm);
                },
                error: function(xhr, status, error) {
                    resetLoadingBtn(btn, htm);
                    errorMsg(error);
                }
            })
        });


        function initTinyMce() {
            let tableOption = {
                selector: 'textarea#optional',
                relative_urls: false,
                remove_script_host: false,
                convert_urls: true,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link template table charmap nonbreaking insertdatetime advlist lists wordcount help charmap quickbars emoticons ',
                placeholder: 'Ketik di sini',
                menubar: 'file edit view insert format tools table help',
                toolbar: "undo redo | table code template link | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | fullscreen preview | ltr rtl",
                table_class_list: [{
                    title: 'Default',
                    value: 'table table-hover table-striped table-bordered'
                }],
                table_header_type: 'auto',
                toolbar_sticky: false,
                draggable_modal: true,
                paste_block_drop: true,
                paste_data_images: false,
                invalid_elements: 'img',
                toolbar_sticky_offset: isSmallScreen ? 102 : 108,
                autosave_ask_before_unload: true,
                autosave_interval: '20s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '30m',
                quickbars_insert_toolbar: ' quicktable ',
                quickbars_selection_toolbar: 'bold italic underline | quicklink ',
                setup: function(editor) {
                    editor.on('change', function() {
                        tinymce.triggerSave();
                    });
                    editor.on("Click", function(ed, e) {
                        /* if ($(ed.target).data("toggle") == "tab") {
                            $(ed.target).tab("show");
                            let tabId = $(ed.target).attr("href");
                            tinymce.activeEditor.dom.removeClass(tinymce.activeEditor.dom.select('.tab-content div'), 'in active')
                            tinymce.activeEditor.dom.addClass(tinymce.activeEditor.dom.select(tabId), 'in active')
                        } */
                    });
                },
                importcss_append: false,
                templates: [ ],
                mobile: {
                    menubar: true,
                    toolbar_mode: 'sliding'
                },
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 650,
                image_caption: true,
                noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                contextmenu: 'link image table',
                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: [
                    root_url + 'plugins/fontawesome/css/font-awesome.min.css',
                    root_url + 'css/front/bootstrap.css',
                    root_url + 'css/front/animate.css',
                    root_url + 'css/front/style.css',
                    root_url + 'css/front/color-blue.css',
                    root_url + 'css/front/retina.css',
                    root_url + 'css/front/responsive.css',
                ],
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px; margin:8px!important; }',
                promotion: false,
                valid_elements: '*[*]',
                extended_valid_elements: 'script[src|async|defer|type|charset]'
            };
            let set = 0;
            tinymce.remove();
            tinymce.init(tableOption);
        }
    });
</script>