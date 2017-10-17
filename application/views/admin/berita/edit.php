<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form', );
echo form_open_multipart('admin/news/edit/'. $news->post_id, $attributes);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Edit Berita & Artikel</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputJab" class="col-lg-2 control-label">Title</label>
                <div class="col-lg-7">
                    <?php
                    $attr = attr(array('form-control', 'input_nama', 'title', 'length', '3-100', 'Title harus berisi 3-100 karakter'));
                    ?>
                    <?php echo form_input($attr, $news->title); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-lg-2 control-label">Deskripsi</label>
                <div class="col-lg-8">
                    <?php
                    $attr = attr(array('form-control', 'input_desc', 'post_entry', 'length', '1-1000', 'Harga harus berisi 3-1000 karakter'));
                    ?>
                    <?php echo form_textarea($attr, $news->post_entry); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-lg-2 control-label">Gambar</label>
                <div class="col-lg-8">
                    <img src="<?php echo base_url() . 'assets/img/'.$news->featurephoto; ?>"  width="221" height="146">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-lg-2">Upload</label>
                <div class="col-lg-8">
                     <?php
                    $data = array(
                        'name' => 'featurephoto',
                        'data-validation' => "required mime size",
                        'data-validation-allowing' => "jpg, png, gif",
                        'data-validation-max-size' => "2M"
                    );
                    ?>
                    <?php echo form_up($data); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php
            $data = array(
                "value" => 'Update',
                "class" => 'btn btn-primary',
                "id" => 'x',
                "name" => 'update'
            );
            ?>
            <?php echo form_submit($data); ?>
            <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary"'); ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php echo form_close(); ?>
<script>
    $.validate({
        form: '#myForm',
        modules: 'security',
    });
</script>
<script>
    $('#telo').on('hidden.bs.modal', function() {
        $(this).removeData('bs.modal');
    });
</script>