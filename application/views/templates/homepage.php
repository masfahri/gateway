    <?php $this->load->view('web/widget/slider2'); ?>
    <?php $this->load->view('web/widget/reservasi2'); ?>

    <!-- Promo -->
    <section class="section-accommo_1 bg-white">
        <div class="row">
            <div class='text-center'>
                <h2>Latest Promo</h2>
            </div>
        </div>
        <?php if ($promo) : ?>
            <div class="container">
                <?php foreach ($promo as $p) : ?>
                    <div class="col-md-6">
                        <div class="offer-promo offer-success-promo">
                            <div class="shape-promo">
                                <div class="shape-text-promo">
                                    Disc 
                                    <p><?php echo $p['discount']; ?> %</p>
                                </div>
                            </div>
                            <div class="offer-content-promo">
                                <h5 class="lead">
                                    <?php echo $p['nmprom'] ; ?><br>
                                    <small><?php echo date('d M Y', strtotime($p['start_date'])) . ' s/d ' . date('d M Y', strtotime($p['end_date'])); ?></small>
                                </h5>
                                <p>
                                    <?php echo limit_to_numwords(strip_tags($p['description']), 50); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="separator-line"></div>
        <?php endif; ?>
    </section>
    <!-- END PROMO -->

    <!-- SERVICE -->
    <section class="section-accomd awe-parallax bg-14">
        <div class="awe-overlay"></div>

        <div class="container">
            <div class="accomd-modations">
                <div class="row">
                    <div class="col-md-3">
                        <div class="accomd-modations-header">
                            <h2 class="heading">ACCOM MODATIONS</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing</p>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-1">
                        <div class="accomd-modations-content owl-single">
                            
                            <div class="row">
                            <?php foreach ($kelas as $k) : ?>
                                <!-- ITEM -->
                                <div class="col-xs-6">
                                    <div class="accomd-modations-room">
                                        <div class="img">
                                            <a href="#"><img src="<?php echo ($k->image == '' ? 'http://placehold.it/180x150&text=Belum+ada+gambar' : base_url($k->image) ); ?>" alt=""></a>
                                        </div>
                                        <div class="text">
                                            <h2><a href="#"><?php echo $k->title; ?></a></h2>
                                            <p class="price">
                                                <span class="amout">Rp. <?php echo $k->price; ?></span>/days
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                                <!-- END / ITEM -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICE -->

    <!-- HOME NEW -->
        <section class="section-event-news bg-white">
            <div class="container">

                <div class="event-news">
                    <div class="row">
                        
                        <!-- EVENT -->
                        <div class="col-md-6">
                            <div class="event">
                                <h2 class="heading">EVENT &amp; DEAL</h2>
                                <p>Lorem Ipsum is simply dummy text</p>

                                <div class="row">

                                    <!-- ITEM -->
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="event-slide owl-single">

                                            <div class="event-item">
                                                <div class="img">
                                                    <a href="#">
                                                        <img src="<?php echo base_url('assets/new/images/home/eventdeal/img-1.jpg'); ?>" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="event-item">
                                                <div class="img">
                                                    <a href="#">
                                                        <img src="<?php echo base_url('assets/new/images/home/eventdeal/img-1.jpg'); ?>" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                    <!-- ITEM -->
                                    <div class="col-xs-6">
                                        <div class="event-item">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="<?php echo base_url('assets/new/images/home/eventdeal/img-2.jpg'); ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="text">
                                                <div class="text-cn">
                                                    <h2>SAVE THE DATE</h2>
                                                    <span>BECCA &amp; ROBERT</span>
                                                    <a href="#" class="awe-btn awe-btn-12">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                    <!-- ITEM -->
                                    <div class="col-xs-6">
                                        <div class="event-item">
                                            <div class="img">
                                                <a href="#">
                                                    <img src="<?php echo base_url('assets/new/images/home/eventdeal/img-3'); ?>.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="text">
                                                <div class="text-cn">
                                                    <h2>GO ON BEACH. HILLTER </h2>
                                                    <a href="#" class="awe-btn awe-btn-12">VIEW MORE</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->

                                </div>
                            </div>
                        </div>
                        <!-- END / EVENT -->
                        
                        <!-- NEWS -->
                        <div class="col-md-6">
                            <div class="news">
                                <h2 class="heading">NEWS</h2>
                                <p>Lorem Ipsum is simply dummy</p>

                                <div class="row">
                                <?php if ($news) : ?>
                                    <?php foreach ($news as $new): ?>
                                    <!-- ITEM -->
                                    <div class="col-md-12">
                                        <div class="news-item">
                                            <div class="img">
                                                <a href="#"><img src="<?php echo empty($new['featurephoto']) || $new['featurephoto'] == "" ? 'http://placehold.it/300x100&text=News' : base_url('assets/img/thumbnails/' . $new['featurephoto']); ?>" alt="<?php echo $new['title']; ?>"></a>
                                            </div>
                                            <div class="text">
                                                <span class="date">21 / March</span>
                                                <h2><a href="#"><?php echo $new['title']; ?></a></h2>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END / ITEM -->
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </div>

                                <a href="<?php echo site_url('news'.'/'.$new['post_id']); ?>" class="awe-btn awe-btn-default">VIEW MORE</a>
                            </div>
                        </div>
                        <!-- END / NEWS -->
                    </div>
                </div>
            </div>
        </section>
    <!-- END / HOME NEW -->

    <!-- GUEST BOOK -->
            <section class="section-home-guestbook awe-parallax bg-13">

                <div class="awe-overlay"></div>

                <div class="container">
                    <div class="home-guestbook">
                            
                        <div class="row">
                            <div class="col-md-3 col-lg-2 col-lg-offset-1 col-lg-push-9 col-md-push-9">
                                <div class="guestbook-header">
                                    <h2 class="heading">TESTIMONIALS</h2>
                                    <p>Your feedback means the world to us.</p>
                                    <a href="#" class="awe-btn awe-btn-default">VIEW MORE</a>
                                </div>
                            </div>
                            
                            <div class="col-md-9 col-lg-9 col-lg-pull-3 col-md-pull-3">
                                <div class="guestbook-content owl-single">
                                    
                                    <!-- ITEM -->
                                    <div class="guestbook-item">
                                        <div class="img">
                                            <img src="images/avatar/img-5.jpg" alt="">
                                        </div>
                                    
                                        <div class="text">
                                            <p>This is the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your ocean view window and then to top it all off...</p>
                                            <span><strong>Seelentag</strong>From Los Angeles, California</span>
                                        </div> 
                                    </div>
                                    <!-- ITEM -->

                                    <!-- ITEM -->
                                    <div class="guestbook-item">
                                        <div class="img">
                                            <img src="images/avatar/img-5.jpg" alt="">
                                        </div>
                                    
                                        <div class="text">
                                            <p>This is the only place to stay in Catalina! I have stayed in the cheaper hotels and they were fine, but this is just the icing on the cake! After spending the day bike riding and hiking to come back and enjoy a glass of wine while looking out your ocean view window and then to top it all off...</p>
                                            <span><strong>Seelentag</strong>From Los Angeles, California</span>
                                        </div> 
                                    </div>
                                    <!-- ITEM -->
                                
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
    <!-- GUEST BOOK -->

