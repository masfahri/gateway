<div class="col-md-12">

<?php if ($this->uri->segment(1) == 'news'):?>
    <?php if (count($news) > 0): ?>  
        <?php foreach ($news as $n): ?>
            <h1><?php echo ucfirst($n['title']); ?></h1>
            <img class="img-responsive" src="<?php echo empty($n['featurephoto']) || $n['featurephoto'] == "" ? 'http://placehold.it/300x100&text=News' : base_url('assets/img/thumbnails/' . $n['featurephoto']); ?>" alt="<?php echo $n['title']; ?>">
            <p><?php echo ucfirst(limit_to_numwords($n['post_entry'], 100)); ?></p>
            <div>
                <span class="badge">Posted <?php echo $n['create_date']; ?></span></div>         
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ($all as $n): ?>
            <div class="col-md-6">
            <h1><?php echo ucfirst($n['title']); ?></h1>
            <img class="img-responsive" src="<?php echo empty($n['featurephoto']) || $n['featurephoto'] == "" ? 'http://placehold.it/300x100&text=News' : base_url('assets/img/thumbnails/' . $n['featurephoto']); ?>" alt="<?php echo $n['title']; ?>">
            <p><?php echo ucfirst(limit_to_numwords($n['post_entry'], 100)); ?></p>
            <div>
                <span class="badge">Posted <?php echo $n['create_date']; ?></span></div>         
            <hr>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php endif; ?>
</div>