<script type="text/javascript">
    function changeFunc() {
        var selectBox = document.getElementById("selectBox").selectedIndex;
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        
        if (selectBox.options[selectBox.selectedIndex].value == "<?php echo $get->idclass ?>") {
        selectBox.attr("selected", 'selected');
        }
        alert(document.getElementsByTagName("option")[selectBox].value);
    }
</script>
<?php
$attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
echo form_open_multipart('admin/promo/add', $attributes);
?>
<div class="modal-dialog">
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
    <div class="form-group">
        <label for="inputJab" class="col-lg-2 control-label">Pilih Kategori</label>
        <div class="col-lg-7">
            <select name="idclass" class="form-control"  id ="selectBox" onChange="changeFunc()">
                <option value="">- please select -</option>
                <?php foreach ($get as $kategori) : ?>
                    <option value="<?php echo $kategori['idclass']; ?>" <?php if ($kategori['idclass'] == $get[1]['idclass']) {echo "selected";}  ?>><?php echo $kategori['title']; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
    <?php if (isset($_GET['id'])): ?>
        <div class="form-group">
            <label for="inputJab" class="col-lg-2 control-label">Jumlah Restaurant</label>
            <div class="col-lg-3">
                <?php echo $hitung->itung; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">Nama Makanan</label>
            <div class="col-lg-3">
                <?php
                $attr = attrName(array('form-control', 'input_jumlah', 'nama_makanan', 'length', '3-100', 'Nama Makanan harus berisi 3-100 karakter'));
                echo form_input($attr, set_value('nama_makanan'));;
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php
                $add = array(
                    "value" => 'Add Restaurant',
                    "class" => 'btn btn-success',
                    "id" => 'x',
                    "name" => 'add'
                );
                ?>
                <?php echo form_submit($add); ?>
                <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="page-header">
            <h1>Daftar Restaurant Hotel</h1>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr class="">
                    <th>Id Kantin</th>
                    <th>Nama Makanan</th>    
                    <th>Deskripsi Makanan</th>
                    <th>Harga</th>
                    <th>Foto Makanan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($kantin): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($kantin as $r): ?>
                        <?php $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r['nama_makanan']; ?></td>
                            <td><p style=" width: 200px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?php echo $r['deskripsi_makanan']; ?></p></td>
                            <!-- <td><?php echo _tobooking('admin/rooms/aktif/', $r['idclass'], $r['idrooms'], $r['status']); ?></td> -->
                            <td>
                                <?php echo $r['harga_makanan']; ?>
                            </td>
                            <td><?php if ($r['foto_makanan'] =='') {
                                echo "<img src='http://placehold.it/90x90&text=MAKANAN'>" ;
                            }else{
                            echo "<img src='http://placehold.it/90x90&text=ADA FOTO'>"; }?></td>
                            <td><?php echo _toada('admin/restaurant/aktif/', $r['id_kategori_kantin'], $r['id_kantin'], $r['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td>Belum ada data !</td></tr> 
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php echo form_close(); ?>
    <script>
    $.validate({
        form: '#myForm',
        modules: 'security',
    });
    </script>
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
<script>
    $.validate({
    });
</script>
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