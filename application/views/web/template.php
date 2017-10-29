<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title><?php echo $meta_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- NEW TEMPLATE -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/font-awesome.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/font-hilltericon.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/owl.carousel.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/jquery-ui.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/magnific-popup.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/settings.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/lib/bootstrap-select.min.css'); ?>">

        <!-- MAIN STYLE -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/new/css/styles_1.css'); ?>">
        <!-- END NEW TEMPLATE -->

    </head>

    <body>
        <div id="preloader">
            <span class="preloader-dot"></span>
        </div>
        <div id="page-wrap">
            <?php $this->load->view('web/components/page_head'); ?>
            <?php if (!empty($content)): ?>
                <?php $this->load->view($content); ?>
            <?php else: ?>
                <?php echo 'Halaman tidak ada'; ?>
            <?php endif; ?>
            <div class="row">
                <?php $this->load->view('web/components/page_footer'); ?>
            </div>
        </div>

    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery-1.11.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/bootstrap-select.js'); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/isotope.pkgd.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.themepunch.revolution.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.themepunch.tools.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/owl.carousel.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.appear.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.countTo.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.countdown.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.parallax-1.1.3.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.magnific-popup.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/SmoothScroll.js'); ?>"></script>
    <!-- validate -->
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.form.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/lib/jquery.validate.min.js'); ?>"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/new/js/scripts.js'); ?>"></script>
    </body>

</html>
