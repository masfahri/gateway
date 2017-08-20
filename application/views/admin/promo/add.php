<script type="text/javascript">
    $(document).ready(function() {
      $('#kelas').change(function() {
        if($(this).val() != 0) {
          var url = "<?php echo site_url('admin/promo/addAjaxKelas'); ?>/"+$(this).val();
          $.get(url, function(data, status){
              $('#rooms').html(data);
          });
        }
        return false;
      });
    })
</script>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
echo form_open_multipart('admin/promo/add', $attributes);
?>
<div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Add Berita & Artikel</h4>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
                echo form_open_multipart('admin/restaurant', $attributes);
                ?>
            </div>
                <label for="inputJab" class="col-lg-2 control-label">Pilih Kategori</label>
                <div class="col-lg-6">
                    <select class="kelas form-control" name="idclass" id="kelas">
                      <option value="0">Pilih Kelas</option>
                      <?php foreach ($getAll as $get) {?>
                        <option value="<?php echo $get['idclass'] ?>"><?php echo $get['title'] ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <select class="rooms form-control" name="idrooms" id="rooms">
                      <option value="0">Pilih Kelas</option>
                    </select>
                </div>
                <div id="rooms-content">
                    <div class="col-lg-6">
                        <div class="row"> 
                            <div class="form-group">
                                <label for="inputJab" class="col-lg-2 control-label">Nama Diskon</label>
                                <div class="col-lg-7">
                                    <?php
                                    $attr = attr(array('form-control', 'input_title', 'title', 'length', '10-100', 'Title harus berisi 10-100 karakter'));
                                    ?>
                                    <?php echo form_input($attr); ?>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mulai Diskon</label>
                                <input type="text" class="form-control datepicker input-sm" id="input_startdate" data-validation="date" data-validation-format="yyyy/mm/dd" id="from" placeholder="Enter date" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Akhir Diskon</label>
                                <input type="text" class="form-control datepicker input-sm" id="input_enddate" data-validation="date" data-validation-format="yyyy/mm/dd" id="to" placeholder="Enter date" name="end_date">
                            </div>  
                            <div class="form-group">
                                <label for="inputJab" class="col-lg-2 control-label">Diskon</label>
                                <?php
                                    $attr = attr(array('form-control', 'input_discount', 'discount', 'number', '1-100', 'Diskon harus berisi angka'));
                                ?>
                                <?php echo form_input($attr, set_value('discount', '')); ?>
                            </div>                     
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">Keterangan Diskon</label>
                                <div class="col-lg-8">
                                    <?php
                                    $attr = attr(array('form-control', 'input_description', 'description', 'length', '3-1000', 'Harga harus berisi 3-1000 karakter'));
                                    ?>
                                    <?php echo form_textarea($attr); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <?php
            $data = array(
                "value" => 'Submit',
                "class" => 'btn btn-primary',
                "id" => 'x',
                "name" => 'submit'
            );
            ?>
            <?php echo form_submit($data); ?>
            <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary"'); ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
</div>
<!-- /.modal-dialog -->
<?php echo form_close(); ?>
<?php echo showHide(); ?>
<script>
    $(function() {
        var currentDate = new Date();
        $("#from").datepicker({
            defaultDate: currentDate,
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            minDate: currentDate,
            dateFormat: "yy/mm/dd",
            onClose: function(selectedDate) {
                $("#to").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            changeYear: true,
            numberOfMonths: 1,
            dateFormat: "yy/mm/dd",
            onClose: function(selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>
