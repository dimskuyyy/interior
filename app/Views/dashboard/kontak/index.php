<?= $this->extend('dashboard/layout/back_main') ?>

<?= $this->section('title') ?>
Kontak
<?= $this->endsection() ?>

<?= $this->section('header') ?>
<section class="content-header">
    <h1>
        Kontak
    </h1>
</section>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="box box-widget">
    <div class="box-body">
        <br>
        <table id="table-kontak" class="table table-bordered table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th data-priority='1'>Nama</th>
                    <th data-priority='1'>Email</th>
                    <th data-priority='1'>Perihal</th>
                    <th data-priority='1'>Tgl. Simpan</th>
                    <th data-priority='1'>Tgl. Update</th>
                    <th data-priority='1'></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('js') ?>
<script>
    $('#table-kontak').on('click', 'tbody tr td .btn-edit', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/kontak/form',
                type: 'post',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.status == false) {
                        errorMsg(res.msg);
                        resetLoadingBtn(btn, htm);
                    } else {
                        resetLoadingBtn(btn, htm);
                        $('.mymodal').html(res).modal('show');
                        $('#myModalLabel').html('Form Edit Kontak');
                        $('#nama-group').remove();
                        $('#email-group').remove();
                        $('#perihal-group').remove();
                        $('#pesan-group').remove();
                    }
                },
                error: function(xhr, status, error) {
                    let response = JSON.parse(xhr.responseText);
                    let errorMessage = response.msg;
                    errorMsg(errorMessage);
                    resetLoadingBtn(btn, htm);
                }
            });
        }
    });
    $('#table-kontak').on('click', 'tbody tr td .btn-show', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/kontak/form',
                type: 'post',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.status == false) {
                        errorMsg(res.msg);
                        resetLoadingBtn(btn, htm);
                    } else {
                        resetLoadingBtn(btn, htm);
                        $('.mymodal').html(res).modal('show');
                        $('#myModalLabel').html('Form Show Kontak');
                        $('#nama').attr('disabled', true);
                        $('#email').attr('disabled', true);
                        $('#perihal').attr('disabled', true);
                        $('#pesan').attr('disabled', true);
                        $('.status').attr('disabled', true);
                        $('.btn-submit').remove();
                    }
                },
                error: function(xhr, status, error) {
                    let response = JSON.parse(xhr.responseText);
                    let errorMessage = response.msg;
                    errorMsg(errorMessage);
                    resetLoadingBtn(btn, htm);
                }
            });
        }
    });
    $('#table-kontak').on('click', 'tbody tr td .btn-delete', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            if (confirm('Yakin hapus kontak ?')) {
                setLoadingBtn(btn);
                $.ajax({
                    url: base_url + '/kontak/delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        if (res.status) {
                            successMsg(res.msg);
                            $('#table-kontak').DataTable().ajax.reload();
                        } else {
                            errorMsg(res.msg);
                        }
                        resetLoadingBtn(btn, htm);
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
    var oTable = $('#table-kontak').dataTable({
        'bFilter': false,
        'autoWidth': true,
        'pagingType': 'full_numbers',
        'paging': true,
        'processing': true,
        'serverSide': true,
        'searching': true,
        'ordering': true,
        'fixedColumns': true,
        'language': {
            processing: '<i class=\'fa fa-refresh fa-spin fa-3x fa-fw\'></i><span class=\'sr-only\'>Loading...</span>'
        },
        'columns': [
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'perihal',
                name: 'perihal'
            },
            {
                data: 'tgl_simpan',
                name: 'tgl_simpan'
            },
            {
                data: 'tgl_update',
                name: 'tgl_update'
            },
            {
                'data': null,
                'render': function(data, type, row) {
                    return ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-warning btn-flat btn-show\' title=\'klik untuk show komentar\'><i class=\'fa fa-eye\'></i></button>' +
                        ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-danger btn-flat btn-delete\' title=\'klik untuk hapus komentar\'><i class=\'fa fa-trash\'></i></button>';
                }
            },
        ],
        'ajax': function(data, callback, setting) {
            $.ajax({
                url: base_url + '/kontak/list',
                type: 'post',
                data: {
                    datatables: data
                },
                success: function(r) {
                    callback({
                        recordsTotal: r.recordsTotal,
                        recordsFiltered: r.recordsFiltered,
                        data: r.data
                    });
                },
                error: function(xhr, status, error) {
                    errorMsg(error);
                }
            })
        },
        'responsive': true
    });
</script>
<?= $this->endsection() ?>

<?= $this->section('plugin_css') ?>
<?php datatableCss() ?>
<?= $this->endsection() ?>

<?= $this->section('plugin_js') ?>
<?php datatableJs() ?>
<?= $this->endsection() ?>