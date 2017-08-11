<div class="col-md-12">
<?php if ($this->uri->segment(1) == 'restaurant'):?>
    <?php if (count($kantin) > 0): ?>  
        <?php foreach ($kantin as $n): ?>
            <h1><?php echo ucfirst($n['nama_makanan']); ?></h1>
            <img class="img-responsive" src="<?php echo empty($n['foto_makanan']) || $n['foto_makanan'] == "" ? 'http://placehold.it/300x100&text=News' : base_url('assets/img/thumbnails/' . $n['foto_makanan']); ?>" alt="<?php echo $n['nama_makanan']; ?>">
            <p><?php echo ucfirst(limit_to_numwords($n['harga_makanan'], 100)); ?></p>
            <div>
                <span class="badge">Posted <?php echo $n['deskripsi_makanan']; ?></span></div>         
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ($all as $n): ?>
        <div class="col-md-6">
            <div id="<?php echo $n['id_kategori_kantin']; ?>">
                <center><h1><?php echo ucfirst($n['nama_makanan']); ?></h1>
                <img class="" src="<?php echo empty($n['foto_makanan']) || $n['foto_makanan'] == "" ? 'http://placehold.it/390x325&text=Makanan' : base_url('assets/img/thumbnails/' . $n['foto_makanan']); ?>" alt="<?php echo $n['nama_makanan']; ?>">
                <p><?php echo ucfirst(limit_to_numwords($n['harga_makanan'], 100)); ?></p>
                <div>
                    <span class="badge" style=" width: 250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">Posted <?php echo $n['deskripsi_makanan']; ?></span>
                </div>  </center>       
                <hr>
            </div>
        </div>
         <?php endforeach; ?>
    <?php endif; ?>
<?php endif; ?>
</div>