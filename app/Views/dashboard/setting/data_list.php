<div class="box-body">
    <div class="pull-left">
        <a href="#" class="btn btn-sm btn-flat btn-primary btn-create" data-backdrop="static"><i class="fa fa-plus"></i> Tambah <?= isset($page) ? str_replace('_', ' ', ucwords($page)) : 'Setting'; ?></a>
    </div><br><br>
    <table id="table-setting" class="table table-bordered table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th data-priority='1'><?= isset($page) ? str_replace('_', ' ', ucwords($page)) : 'Name'; ?></th>
                <th data-priority='1'>Value</th>
                <th data-priority='1'>Status</th>
                <th data-priority='1'>Tgl. Simpan</th>
                <th data-priority='1'>Tgl. Update</th>
                <th data-priority='1'></th>
            </tr>
        </thead>
    </table>
</div>
<script>
    $('#table-setting').on('click', 'tbody tr td .btn-edit', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            setLoadingBtn(btn);
            $.ajax({
                url: base_url + '/setting/form',
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
                        content.html(res);
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
    $('#table-setting').on('click', 'tbody tr td .btn-delete', function(e) {
        e.preventDefault();
        var btn = $(this);
        var htm = btn.html();
        var id = btn.attr('data-id');
        if (id) {
            if (confirm('Yakin hapus data ini ?')) {
                setLoadingBtn(btn);
                $.ajax({
                    url: base_url + '/setting/delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        if (res.status) {
                            successMsg(res.msg);
                            $('#table-setting').DataTable().ajax.reload();
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
    var oTable = $('#table-setting').dataTable({
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
                data: 'value',
                name: 'value'
            },
            {
                data: 'optional',
                name: 'optional'
            },
            {
                'data': null,
                'searchable': false,
                render: function(data, type, row) {
                    return data.status == 1 ? '<span class=\'label label-success\'> Aktif</label>' : '<span class=\'label label-danger\'>Non Aktif</label>';
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
                    return ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-success btn-flat btn-edit\' title=\'klik untuk edit kategori\'><i class=\'fa fa-edit\'></i></button>' +
                        ' <button data-id=\'' + data.id + '\' type=\'button\' class=\'btn btn-sm btn-danger btn-flat btn-delete\' title=\'klik untuk hapus kategori\'><i class=\'fa fa-trash\'></i></button>';
                }
            },
        ],
        'ajax': function(data, callback, setting) {
            $.ajax({
                url: base_url + '/setting/list',
                type: 'post',
                data: {
                    datatables: data,
                    role: segment
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
            url: base_url + '/setting/form',
            type: 'post',
            data: {
                role: segment
            },
            success: function(res) {
                resetLoadingBtn(btn, htm);
                content.html(res);
            },
            error: function(xhr, status, error) {
                errorMsg(error);
                resetLoadingBtn(btn, htm);
            }
        });
    });
</script>