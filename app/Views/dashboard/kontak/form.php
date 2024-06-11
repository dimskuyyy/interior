<?php
helper(['form']);
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Form Kontak</h4>
        </div>
        <?php echo form_open('#', ['class' => 'form-kontak']);
        if (isset($data)) {
            echo form_hidden('id', $data['kontak_id']);
        }
        ?>
        <div class="modal-body">
            <div class="form-group" id="nama-group">
                <label for='komentar' class="label-name">Nama</label>
                <input type="text" class="form-control" value="<?= isset($data) ? $data['kontak_nama'] : '' ?>" required id="nama">
            </div>
            <div class="form-group" id="email-group">
                <label for='komentar' class="label-post">Email</label>
                <input type="text" class="form-control" value="<?= isset($data) ? $data['kontak_email'] : '' ?>" required id="kontak">
            </div>
            <div class="form-group" id="perihal-group">
                <label for='komentar' class="label-post">Perihal</label>
                <input type="text" class="form-control" value="<?= isset($data) ? $data['kontak_perihal'] : '' ?>" required id="perihal">
            </div>
            <div class="form-group" id="kontak-group">
                <label for="pesan" class="label-pesan">Pesan</label><br>
                <textarea id="pesan" style=" width: 100%;" rows="10"><?= isset($data) ? $data['kontak_pesan'] : '' ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
            <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Simpan</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script>
    $('.form-kontak').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var btn = form.find('.btn-submit');
        var htm = btn.html();
        setLoadingBtn(btn);
        $.ajax({
            url: base_url + '/kontak/save',
            type: 'post',
            dataType: 'json',
            data: form.serialize(),
            success: function(res) {
                if (res.status) {
                    successMsg(res.msg);
                    form[0].reset();
                    $('#table-kontak').DataTable().ajax.reload();
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
</script>