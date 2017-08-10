<script type="text/javascript">
    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        window.location = '?id=' + selectedValue;
        if (selectBox.options[selectBox.selectedIndex].value == "<?php echo $kantin[1]['id_kategori_kantin']; ?>") {
        selectBox.attr("selected", 'selected');
    }
    }
</script>
<div class="page-header">
    <h1>Data Restaurant Hotel</h1>
</div>
<div class="col-md-12">
    <?php
    $attributes = array('class' => 'form-horizontal', 'id' => 'myForm', 'role' => 'form');
    echo form_open_multipart('admin/restaurant', $attributes);
    ?>
    <div class="form-group">
        <label for="inputJab" class="col-lg-2 control-label">Pilih Kelas</label>
        <div class="col-lg-7">
            <select name="id_kategori_kantin" class="form-control"  id ="selectBox" onChange="changeFunc()">
                <option value="">- please select -</option>
                <?php foreach ($kat_kantin as $kategori) : ?>
                    <option value="<?php echo $kategori['id_kategori_kantin']; ?>" <?php if ($kategori['id_kategori_kantin'] == $kantin[1]['id_kategori_kantin']) {echo "selected";}  ?>><?php echo $kategori['nama_kategori_kantin']; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
    <?php if (isset($_GET['id'])): ?>
        <div class="form-group">
            <label for="inputJab" class="col-lg-2 control-label">Jumlah Room</label>
            <div class="col-lg-3">
                <?php
                $attr = attr(array('form-control', 'input_jumlah', 'jumlah', 'number', '1-100', 'jumlah harus berisi angka'));
                ?>
                <?php echo form_input($attr, set_value('jumlah', $hitung->itung)); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName" class="col-lg-2 control-label">Prefix Nama Room</label>
            <div class="col-lg-3">
                <?php
                $attr = attr(array('form-control', 'input_title', 'namespace', 'length', '3-100', 'Nama Kamar harus berisi 3-100 karakter'));
                if (!empty($room)) {
                    echo form_input($attr, set_value('namespace', $room->namespace));
                } else {
                    echo form_input($attr, set_value('namespace'));
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php
                $add = array(
                    "value" => 'Add Room',
                    "class" => 'btn btn-success',
                    "id" => 'x',
                    "name" => 'add'
                );
                ?>
                <?php
                $data = array(
                    "value" => 'Update',
                    "class" => 'btn btn-primary',
                    "id" => 'x',
                    "name" => 'update'
                );
                ?>
                <?php echo form_submit($data); ?>
                <?php echo form_submit($add); ?>
                <?php echo form_reset('reset', 'Reset', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <div class="page-header">
            <h1>Data Promo Hotel</h1>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr class="success">
                    <th>Nama Kamar</th>
                    <th>Kelas</th>    
                    <th>Status</th>
                    <th>Booked By</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rooms): ?>
                    <?php foreach ($rooms as $r): ?>
                        <tr>
                            <td><?php echo $r->numbers; ?></td>
                            <td><?php echo $kelasget->title; ?></td>
                            <td><?php echo _tobooking('admin/rooms/aktif/', $r->idclass, $r->idrooms, $r->status); ?></td>
                            <td>
                                <?php if ($r->guest_id != 0): ?>
                                    <?php echo $r->nama_depan . ' ' . $r->nama_belakang; ?>
                                <?php endif; ?>
                            </td>
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