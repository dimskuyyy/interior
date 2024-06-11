<?php
helper(['form']);
?>
<div class="box box-widget">
    <div class="box-body">
        <div class="pull-left">
            <button class="btn btn-sm btn-flat btn-primary btn-list"><i class="fa fa-list"></i> List Projek</button>
        </div><br><br>
        <?php echo form_open('#', ['class' => 'form-post']);
        if (isset($data)) {
            echo form_hidden('id', $data['projek_id']);
        }
        ?>
        <div class="modal-body">

            <div class="form-group">
                <label for='nama'>Nama Projek</label><br>
                <input type="text" name="nama" class="form-control" value="<?= isset($data) ? $data['projek_nama'] : '' ?>" required>
            </div>

            <div class="row">
                <div class="col-md-8 ">
                    <div class="form-group">
                        <textarea name="konten" class="form-control" id="konten"><?= isset($data) ? $data['projek_konten'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-md-4 ">

                    <div class="form-group">
                        <label for='deskripsi'>deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required style="resize: vertical;min-height:120px"><?= isset($data) ? $data['projek_deskripsi'] : '' ?></textarea>
                    </div>
                    <!-- End of condition -->

                    <!-- Gausah di masukkan dulu karena tabel media belum ada bre: -->

                    <!-- Buat kondisi dimana user admin atau penulis:  -->
                    <div class="form-group">
                        <label for='kategori'>Kategori</label><br>
                        <select name="kategori" class="form-control select-mod select2">
                            <?php foreach ($kategori as $row) : ?>
                                <?php if (isset($data) && $data['projek_kategori_id'] == $row['kat_id']) : ?>
                                    <option value="<?= $row['kat_id'] ?>" selected><?= $row['kat_nama'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $row['kat_id'] ?>"><?= $row['kat_nama'] ?></option>
                                <?php endif; ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group form-checkbox">
                        <label>Status Post</label><br>
                        <div class="checkbox-wrap">
                            <div>
                                <input id="draft-check" type="radio" name="status" value="1" <?= isset($data) ? ($data['projek_status'] == 1 ? 'checked' : '') : 'checked' ?> required>
                                <label for="draft-check" class="btn btn-sm btn-flat btn-default"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save as draft</label>
                            </div>
                            <div>
                                <?php if (AuthUser()->level == 1) : ?>
                                    <input id="publish-check" type="radio" name="status" value="2" <?= isset($data) ? ($data['projek_status'] == 2 ? 'checked' : '') : '' ?> required>
                                    <label for="publish-check" class="btn btn-sm btn-flat btn-default"><i class="fa fa-cloud" aria-hidden="true"></i>&nbsp; Publish</label>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End of condition -->

                    <div class="form-group">
                        <label for='media'>Media</label><br>
                        <div class="choose-media">
                            <a href="#" class="btn btn-sm btn-flat btn-primary btn-media" data-backdrop="static"><i class="fa fa-plus"></i> Pilih Media</a>
                            <button type="button" class="btn btn-default btn-flat btn-sm btn-reset-media"><i class="fa fa-recycle" aria-hidden="true"></i></button>
                        </div>
                        <input type="hidden" name="media" id="media-id" value="<?= isset($data) ? $data['projek_media_id'] : '' ?>">
                        <div class="source-media">
                            <img id="media-source" <?= isset($media) ? 'src="' . base_url() . 'media/' . $media[0]['media_slug'] . '"' : 'class="no-source"' ?>>
                            <p class="note-media <?= isset($media) ? 'active' : '' ?>">Tidak Ada Cover</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-close-form" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>js/wbpanel.js"></script>
<script>
    let placeholder = "<?= base_url('img/front/placeholder/180x180.png') ?>";
</script>
<script>
    $(document).ready(function() {
        $('.btn-reset-media').on('click', function(e) {
            let mediaId = $('#media-id').val();
            let mediaSrc = $('#media-source');
            let mediaNote = $('.note-media');
            if (mediaId.length != 0) {
                $('#media-id').val('');
            }
            mediaSrc.addClass('no-source');
            mediaSrc.removeAttr('src');
            mediaNote.removeClass('active');
        });

        $('.form-post').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var btn = form.find('.btn-submit');
            var htm = btn.html();
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/projek/save',
                type: 'post',
                dataType: 'json',
                data: form.serialize(),
                success: function(res) {
                    if (res.status) {
                        successMsg(res.msg);
                        form[0].reset();
                        loadData();
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

        // Select 2
        $('.btn-list,.btn-close-form').click(function(e) {
            e.preventDefault();
            loadData();
        });

        // Memanggil fungsi
        initTinyMce();

        $('.btn-media').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var htm = btn.html();
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/projek/media',
                data: {
                    key: 'cover'
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
        });

        function initTinyMce() {
            let set = 0;
            tinymce.remove();
            tinymce.init({
                selector: 'textarea#konten',
                relative_urls: false,
                remove_script_host: false,
                convert_urls: true,
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons accordion ',
                placeholder: 'Ketik di sini',
                menubar: 'file edit view insert format tools table help',
                toolbar: "undo redo | code template | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | link image | table media | lineheight outdent indent| forecolor backcolor removeformat | charmap emoticons | fullscreen preview | save print | pagebreak anchor codesample | accordion accordionremove | ltr rtl",
                toolbar_sticky: false,
                draggable_modal: true,
                paste_block_drop: true,
                toolbar_sticky_offset: isSmallScreen ? 102 : 108,
                autosave_ask_before_unload: true,
                autosave_interval: '20s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '30m',
                image_advtab: true,
                quickbars_insert_toolbar: 'image quicktable ',
                quickbars_selection_toolbar: 'bold italic underline | blockquote image quicktable quicklink ',
                quickbars_image_toolbar: 'alignleft aligncenter alignright',
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
                link_list: [
                    /* {
                        title: 'My page 2',
                        value: 'http://www.moxiecode.com'
                    } */
                ],
                image_class_list: [
                    /* {
                        title: 'Some class',
                        value: 'class-name'
                    } */
                ],
                importcss_append: false,
                file_picker_types: 'image',
                file_picker_callback: (callback, value, meta) => {
                    if (meta.filetype === 'image') {
                        let stage = set;
                        $.ajax({
                            url: base_url + '/projek/media',
                            data: {
                                key: 'tinymce'
                            },
                            type: 'post',
                            success: function(res) {
                                $('.mymodal').html(res).modal('show');
                                setLoadingBtn($('.mymodal #media-list'));
                                viewList(1, null);
                            },
                            error: function(xhr, status, error) {
                                errorMsg(error);
                            }
                        });

                        $(document).on('click', '.modal-content .modal-body .tab-content #media-list .row .media', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            if (set == stage) {
                                let btn = $(this).find('#insert-media');
                                let htm = btn.html();
                                let id = $(this).data('id');
                                let call = $('.mymodal .modal-dialog').data('call');
                                // console.log(call,id)                                                                      
                                if (call == 'tinymce') {
                                    callMedia(call, id, btn, htm, callback);
                                    // return false;
                                }
                            } else {
                                return false;
                            }
                            set += 1;
                        });

                        $('.mymodal').on('submit', '.form-media', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            if (stage == set) {
                                let form = $('.mymodal .form-media');
                                let formData = new FormData($('.mymodal .form-media')[0]);
                                let btn = form.find('.btn-submit');
                                let htm = btn.html();
                                let call = $('.mymodal .modal-dialog').data('call');
                                setLoadingBtn(btn);
                                if (call == 'tinymce') {
                                    submitMedia(form, formData, btn, htm, call, callback);
                                }
                            } else {
                                return false;
                            }
                            set += 1;
                        });
                    }
                },
                templates: [{
                        title: 'Blockquote',
                        description: 'New BlockQuote',
                        content: `
                        <blockquote>
                            Pellentesque eleifend semper rhoncus. Aliquam nunc mauris, imperdiet gravida malesuada sit, semper non erat. Integer dictum laoreet purus, at pretium felis pharetra sit.
                        </blockquote>
                        <p></p>`
                    },
                    {
                        title: 'Template Projek 1',
                        description: 'New Template Project',
                        content: `
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <img src="<?=base_url()?>img/project/details/details-1.jpg" alt="">
                                            <img src="<?=base_url()?>img/project/details/details-3.jpg" alt="">
                                            <img src="<?=base_url()?>img/project/details/details-5.jpg" alt="">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <img src="<?=base_url()?>img/project/details/details-2.jpg" alt="">
                                            <img src="<?=base_url()?>img/project/details/details-4.jpg" alt="">
                                            <img src="<?=base_url()?>img/project/details/details-6.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="project__sidebar">
                                        <div class="project__sidebar__about">
                                            <h2>Office Building Creative</h2>
                                            <p>Metasurfaces are generally designed by placing scatterers in periodic or pseudo-periodic
                                                grids. We propose and discuss design rules for functional metasurfaces with randomly
                                            placed.</p>
                                            <p>Anisotropic elements that randomly sample. Quisque sit amet nisl ante. Fusce lacinia non
                                            tellus id gravida. Cras neque dolor, volutpat et hendrerit et.</p>
                                        </div>
                                        <div class="product__details__widget">
                                            <div class="product__details__widget__item">
                                                <span>Clients:</span>
                                                <h4>John Smith</h4>
                                            </div>
                                            <div class="product__details__widget__item">
                                                <span>Location:</span>
                                                <p>101 E 129th St, East Chicago, US</p>
                                            </div>
                                            <div class="product__details__widget__item">
                                                <span>Location:</span>
                                                <p>Decoration, building, Office.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                    },
                    {
                        title: 'Template Projek 2',
                        description: 'New Template Project',
                        content: `
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10">
                                    <div class="blog__details__content">
                                        <div class="blog__details__title">
                                            <ul>
                                                <li>December 20, 2019 </li>
                                                <li>By John Doe</li>
                                                <li>Planning</li>
                                            </ul>
                                            <h2>Target and Amazon Shopping List for Home Stagers</h2>
                                            <img src="<?=base_url()?>img/blog/details/blog-details.jpg" alt="">
                                            <p>Forget Ebay and other forms of advertising for your property that costs you hard earned
                                                money. Properties have ready several locations around the world to take your free
                                            listings for any luxury property you have.</p>
                                        </div>
                                        <div class="blog__details__text">
                                            <p>Each location web site is purpose built so every Search Engine will pick up new listings
                                                within minutes. This way your customers only have to type in keywords relating to their
                                                search for a luxury home and the Search Engine will show the Invest Asset web site
                                            applicable to their location they are looking for.</p>
                                            <p>Most real estate companies are way too busy with selling their client’s properties to put
                                                any effort forth to their web site. Hence, making it difficult for web surfers to find
                                            their listings.</p>
                                        </div>
                                        <div class="blog__item__quote">
                                            <p>“Without question this is the stager you want to use! Jennifer staged a hard to sell home
                                            for me and we sold it fast! …. Jennifer made it possible.”</p>
                                            <span>Martin Lockhart</span>
                                        </div>
                                        <div class="blog__details__text">
                                            <p>Now times have changed and we at Investment Assets Properties are thinking of the
                                                customer before the business. If you have a property in a location not listed at
                                                Investment Assets Properties. Don’t worry. A quick email to us will ensure your location
                                            is built to accommodate your listing.</p>
                                            <p>Selling your luxury home, condominium or property should not be a painstaking event. It
                                                should be easy and stress free and it should be able to be advertised on a global scale
                                                for free. Investment Assets Properties can and will do this for you in a hassle free
                                            way.</p>
                                        </div>
                                        <div class="blog__details__pic">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <img src="<?=base_url()?>img/blog/details/bi-1.jpg" alt="">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <img src="<?=base_url()?>img/blog/details/bi-2.jpg" alt="">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <img src="<?=base_url()?>img/blog/details/bi-3.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                    }
                ],
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
                    root_url + 'css/front/bootstrap.min.css',
                    root_url + 'css/front/elegant-icons.css',
                    root_url + 'css/front/font-awesome.min.css',
                    root_url + 'css/front/slick.css',
                    root_url + 'css/front/slicknav.min.css',
                    root_url + 'css/front/style.css'
                ],
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px; margin:8px!important; }',
                promotion: false,
                valid_elements: '*[*]',
                extended_valid_elements: 'script[src|async|defer|type|charset]'
            });
        }
    });
</script>