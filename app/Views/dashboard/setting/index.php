<?= $this->extend('dashboard/layout/back_main') ?>

<?= $this->section('title') ?>
<?= isset($page) ? $judul = str_replace('_', ' ', ucwords($page)) : 'Setting'; ?>
<?= $this->endsection() ?>

<?= $this->section('header') ?>
<section class="content-header">
    <h1>
        <?= isset($page) ? str_replace('_', ' ', ucwords($page)) : 'Setting'; ?>
    </h1>
</section>
<?= $this->endsection() ?>
<?= $this->section('content') ?>

<div class="box box-info">

</div>
<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script>
    const content = $('.box');
    const segment = "<?= isset($page) ? $page : null ?>";
    const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
    const useDarkMode = window.matchMedia('(prefers-color-scheme: default)').matches;

    $(document).ready(function() {
        loadData();

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

        $(document).on('click', '.modal-content .modal-body .tab-content #media-list .row .media', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let btn = $(this).find('#insert-media');
            let htm = btn.html();
            let id = $(this).data('id');
            let call = $('.mymodal .modal-dialog').data('call');
            if (call == 'cover') {
                callMedia(call, id, btn, htm);
            }
        });

        $('.mymodal').submit('.form-media', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let call = $('.mymodal .modal-dialog').data('call');
            if (call == 'cover') {
                let form = $('.mymodal .form-media');
                let formData = new FormData($('.mymodal .form-media')[0]);
                let btn = form.find('.btn-submit');
                let htm = btn.html();
                setLoadingBtn(btn);
                submitMedia(form, formData, btn, htm, call);
            }
        });
    })

    function loadData() {
        $.ajax({
            url: base_url + '/setting/datatable',
            type: 'post',
            cache: true,
            data: {
                role: segment,
            },
            success: function(data) {
                resetLoadingBtn(content);
                content.html(data);
            },
            error: function(xhr, status, error) {
                errorMsg(error);
                resetLoadingBtn(content);
            }
        });
    }

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
</script>

<?= $this->endsection() ?>

<?= $this->section('plugin_css') ?>
<?php datatableCss() ?>
<?= $this->endsection() ?>

<?= $this->section('plugin_js') ?>
<?php datatableJs();
tinymceJS() ?>

<?= $this->endsection() ?>