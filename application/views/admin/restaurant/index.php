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
        <label for="inputJab" class="col-lg-2 control-label">Pilih Kategori</label>
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