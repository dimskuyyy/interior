<?= $this->extend('dashboard/layout/back_main') ?>

<?= $this->section('title') ?>
<?= isset($page) ? $judul = str_replace('_', ' ', ucwords(esc($page))) : 'Setting'; ?>
<?= $this->endsection() ?>

<?= $this->section('css') ?>
<style>
    input[type='text'] {
        height: 34px;
        background-color: white;
        margin: 0px;
    }

    textarea {
        background-color: white;
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
<?= $this->endsection() ?>

<?= $this->section('header') ?>
<section class="content-header">
    <h1>
        <?= isset($page) ? $judul = str_replace('_', ' ', ucwords(esc($page))) : 'Setting'; ?>
    </h1>
</section>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<?php
helper(['form']);
?>
<div class="box box-info">
    <div class="box-body">
        <div>
            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 2rem;">
                <div role="tabpanel" class="tab-pane active" id="judul">
                    <?php echo form_open('#', ['class' => 'form-setting']);
                    echo form_hidden('role', $data['set_role'] ?? $page);
                    if (isset($data)) {
                        echo form_hidden('id', $data['set_id']);
                    }
                    ?>
                    <div class="form-group value-set">
                        <label for="value">Value Setting</label><br>
                        <div style="display: flex;flex-wrap:nowrap;align-items:center;margin-bottom:1rem">
                            <input type="text" name="value" style="width: 100%; flex-grow: 1;" class=" keyword tagify-form-control" value="<?= isset($data) ? $data['set_value'] : ''; ?>" required id="value" disabled>
                            <button class="btn btn-primary btn-value-media" style="margin-left:1rem" type="button">
                                <i class="fa fa-upload" aria-hidden="true" style="font-size: 18px;"></i>
                            </button>
                        </div>
                        <div class="value-media">
                            <img src="" alt="">
                        </div>
                    </div>

                    <div class="form-group set-optional">
                        <label for="optional">Optional Value Setting</label><br>
                        <textarea id="optional" style=" width: 100%;" name="optional" rows="5" disabled><?= isset($data) ? $data['set_optional'] : ''; ?></textarea>
                    </div>
                    <div class="form-group set-additional">
                        <label for="additional">Additional Setting</label><br>
                        <textarea id="additional" style=" width: 100%;" name="additional" rows="5" disabled><?= isset($data) ? $data['set_additional'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for='status'>Status</label><br>
                        <label><input type="radio" class="status" name="status" value="1" <?= isset($data) ? ($data['set_status'] == 1 ? 'checked' : '') : 'checked' ?> required disabled> Active</label>
                        <label><input type="radio" class="status" name="status" value="2" <?= isset($data) ? ($data['set_status'] == 2 ? 'checked' : '') : '' ?> required disabled> In Active</label>
                    </div>
                    <div class="modal-footer set-submit">
                        <button type="submit" class="btn btn-primary btn-submit" disabled><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script>
    let placeholder = "<?= base_url('img/front/placeholder/180x180.png') ?>";
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
    const useDarkMode = window.matchMedia('(prefers-color-scheme: default)').matches;
    const form = $('.form-setting'),
        role = $('input[name="role"]'),
        valueLabel = $('.value-set label'),
        value = $('#value'),
        mediaButton = $('.btn-value-media'),
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

    const viewList = debounce((page, keyword) => {
        loadMedia(page, keyword)
    }, 800, $('.mymodal #media-list'));

    function loadMedia(page, keyword = null) {
        $.ajax({
            url: base_url + '/media/list',
            type: 'post',
            data: {
                page: page,
                keyword: keyword,
                type: 2,
                perPage: 6
            },
            success: function(data) {
                resetLoadingBtn($('.mymodal #media-list'));
                $('.mymodal #media-list').html(data);
            },
            error: function(xhr, status, error) {
                errorMsg(error);
                resetLoadingBtn($('.mymodal #media-list'));
            }
        });
    }

    function checkRole() {
        let roleValue = role.val();
        switch (roleValue) {
            case "judul":
                enableInput(true);
                switchInput({
                    valLabel: 'Judul Utama',
                    optLabel: 'Sub Judul',
                    addLabel: 'Deskripsi Singkat Website',
                    valPhd: 'ex. Teknik Informatika',
                    optPhd: 'ex. Universitas Muhammadiyah Riau',
                    addPhd: 'ex. Kami menawarkan anda dengan produk ... (2-3 kalimat)',
                    valReadonly: false
                });
                break;
            case "contact":
                enableInput(true);
                switchInput({
                    valLabel: 'No. Hp',
                    optLabel: 'Email',
                    valPhd: 'ex. +628xxxx...',
                    optPhd: 'ex. johndoe@gmail.com...',
                    valReadonly: false
                });
                $('.set-additional').css('display','none');
                break;
            case "location":
                enableInput(true);
                switchInput({
                    valLabel: 'URL Google Maps (Embedded)',
                    optLabel: 'Alamat',
                    addLabel: 'Deskripsi Singkat Lokasi (Jika Perlu)',
                    valPhd: 'ex. https://www.google.com/maps/embed?...',
                    optPhd: 'ex. Jl. Tuanku Tambusai, No.43, ...',
                    addPhd: 'ex. Tepat Sebrang Warung ...',
                    valReadonly: false
                });
                break;
            case "logo":
                enableInput(true, mediaContent, mediaButton);
                switchInput({
                    valLabel: 'Link Gambar',
                    optLabel: 'Alternative Text',
                    valPhd: 'ex. https://imagepath',
                    optPhd: 'ex. Pemandangan',
                    valReadonly: false
                });
                $('.set-additional').css('display','none');
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
        let hiddenFeatures = [mediaButton, mediaContent];
        let input = [value, optional];
        // input.forEach(el => el.val(''));
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
            case "LOGO":
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
                        resetLoadingBtn(btn, htm);
                        let response = JSON.parse(xhr.responseText);
                        let errorMessage = response.msg;
                        errorMsg(errorMessage);
                    }
                });
            }
        }
    });

    $(document).ready(function() {
        $(document).on('click', '.mymodal .pagination a', function(e) {
            let keyword = $('.mymodal #keyword').val();
            if ($(this).attr('href')) {
                e.preventDefault();
                let page = $(this).attr('href');
                page = page.split('=');
                loadMedia(page[1], keyword);
            }
        });

        $(document).on('input', '.mymodal #keyword', function() {
            const UpdatedKey = $(this).val();
            viewList(1, UpdatedKey);
        });

    })

    $('.mymodal').submit('.form-media', function(e) {
        e.preventDefault();
        e.stopPropagation();
        let call = $('.mymodal .modal-dialog').data('call');
        console.log(call);
        if (call == 'image') {
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
                // $('#preview').removeClass('hidden');
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
        $.ajax({
            url: base_url + '/setting/save',
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(res) {
                if (res.status) {
                    successMsg(res.msg);
                    setTimeout(function() {
                        document.location.href = base_url + '/setting/' + json_decode(<?= $data['set_role'] ?? $page; ?>);
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
    $('.form-setting-logo').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        let formData = new FormData($('.form-setting-logo')[0]);
        var btn = form.find('.btn-submit');
        var htm = btn.html();
        setLoadingBtn(btn);
        $.ajax({
            url: base_url + '/setting/save',
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function(res) {
                if (res.msg) {
                    successMsg(res.msg);
                    $('.form-setting-logo input[type="file"]').val('');
                } else {
                    errorMsg(res.msg);
                }
                resetLoadingBtn(btn, htm);
            },
            error: function(xhr, status, error) {
                resetLoadingBtn(btn, htm);
                let response = JSON.parse(xhr.responseText);
                let errorMessage = response.msg;
                errorMsg(errorMessage);
            }
        })
    });
</script>

<?= $this->endsection() ?>

<?= $this->section('plugin_js') ?>

<?= $this->endsection() ?>