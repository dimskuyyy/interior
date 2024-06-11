<?= $this->extend('dashboard/layout/back_main') ?>

<?= $this->section('title') ?>
User
<?= $this->endsection() ?>

<?= $this->section('header') ?>
<section class="content-header">
    <h1>
        User
    </h1>
</section>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="box box-widget">
    <div class="box-body">
        <div class="pull-left">
            <a href="#" class="btn btn-sm btn-flat btn-primary btn-create" data-backdrop="static"><i class="fa fa-plus"></i> Tambah User</a>
        </div><br><br>
        <table id="table-user" class="table table-bordered table-hover table-striped" style="width:100%">
            <thead>
                <tr>
                    <th data-priority='1'>Nama</th>
                    <th data-priority='1'>Level</th>
                    <th data-priority='1'>Status</th>
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
    $('#table-user').on('click', 'tbody tr td .btn-edit', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/user/form',
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
                        $('#myModalLabel').html('Form Edit User');
                        $('#form-password').remove();
                        $('#form-confirm').remove();

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
    $('#table-user').on('click', 'tbody tr td .btn-reset', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/user/form',
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
                        $('#myModalLabel').html('Form Reset Password User');
                        $('#form-nama').remove();
                        $('#form-username').remove();
                        $('#form-level').remove();
                        $('#form-status').remove();
                        $('#password').val('');
                        $('#confirm_password').val('');
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
    $('#table-user').on('click', 'tbody tr td .btn-show', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/user/form',
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
                        $('#myModalLabel').html('Form Show User');
                        $('#nama').attr('disabled', true);
                        $('#username').attr('disabled', true);
                        $('.level').attr('disabled', true);
                        $('.status').attr('disabled', true);
                        $('#form-password').remove();
                        $('#form-confirm').remove();
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
    $('#table-user').on('click', 'tbody tr td .btn-delete', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            if (confirm('Yakin hapus user ?')) {
                setLoadingBtn(btn);
                $.ajax({
                    url: base_url + '/user/delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        if (res.status) {
                            successMsg(res.msg);
                            $('#table-user').DataTable().ajax.reload();
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
    var oTable = $('#table-user').dataTable({
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
        'columns': [{
                data: 'nama',
                name: 'nama'
            },
            {
                'data': null,
                'searchable': false,
                render: function(data, type, row) {
                    return data.level == 1 ? '<span class=\'label label-primary\'>Admin</label>' : '<span class=\'label label-warning\'>Writer</label>';
                }
            },
            {
                'data': null,
                'searchable': false,
                render: function(data, type, row) {
                    return data.status == 1 ? '<span class=\'label label-danger\'>Tidak Aktif</label>' : '<span class=\'label label-success\'>Aktif</label>';
                }
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
                    return ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-warning btn-flat btn-show\' title=\'klik untuk show user\'><i class=\'fa fa-eye\'></i></button>' +
                        ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-success btn-flat btn-edit\' title=\'klik untuk edit user\'><i class=\'fa fa-edit\'></i></button>' +
                        ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-primary btn-flat btn-reset\' title=\'klik untuk reset password\'><i class=\'fa fa-key\'></i></button>' + ((data.level == 2) ? ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-danger btn-flat btn-delete\' title=\'klik untuk hapus user\'><i class=\'fa fa-trash\'></i></button>' : '');
                }
            },
        ],
        'ajax': function(data, callback, setting) {
            $.ajax({
                url: base_url + '/user/list',
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
    $('.btn-create').click(function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        setLoadingBtn(btn);
        $.ajax({
            url: base_url + '/user/form',
            type: 'post',
            success: function(res) {
                resetLoadingBtn(btn, htm);
                $('.mymodal').html(res).modal('show');
            },
            error: function(xhr, status, error) {
                errorMsg(error);
                resetLoadingBtn(btn, htm);
            }
        });
    });
</script>
<?= $this->endsection() ?>

<?= $this->section('plugin_css') ?>
<?php datatableCss() ?>
<?= $this->endsection() ?>

<?= $this->section('plugin_js') ?>
<?php datatableJs() ?>
<?= $this->endsection() ?>