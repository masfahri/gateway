<div class="col-md-12">

<?php if ($this->uri->segment(1) == 'promo'):?>
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
            <a href="<?php echo site_url('news'.'/'.$n['post_id']); ?>" class="pull-right">
            <h1><?php echo ucfirst($n['title']); ?></h1>
            <center><img class="img-responsive" src="<?php echo empty($n['featurephoto']) || $n['featurephoto'] == "" ? 'http://placehold.it/300x100&text=News' : base_url('assets/img/thumbnails/' . $n['featurephoto']); ?>" alt="<?php echo $n['title']; ?>"></center>
            <p><?php echo limit_to_numwords(strip_tags($n['post_entry']), 25); ?></p>
            </a>
                <span class="badge">Posted <?php echo $n['create_date']; ?></span>
            <hr>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php endif; ?>
</div>