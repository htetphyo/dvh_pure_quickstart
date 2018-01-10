<!DOCTYPE html>
<html>
<head>
  <title>Data Visualization Hackathon Sample Web</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<style type="text/css">
#map {
  height: 100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
#map{
  border: 2px solid #999;
  border-radius: 3px;
}
</style>

<!-- Bootstrap core CSS -->
   <link href="<?= base_url('startbootstrap/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

   <!-- Custom fonts for this template -->
   <link href="<?= base_url('startbootstrap/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

   <!-- Plugin CSS -->
   <link href="<?= base_url('startbootstrap/vendor/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="<?= base_url('startbootstrap/css/creative.min.css'); ?>" rel="stylesheet">
   <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('startbootstrap/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url('startbootstrap/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('startbootstrap/vendor/scrollreveal/scrollreveal.min.js'); ?>"></script>
    <script src="<?= base_url('startbootstrap/vendor/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url('startbootstrap/js/creative.min.js') ?>"></script>

</head>
<body  style="padding-top:80px; padding-bottom:70px !important" id="page-top">
  <!-- Navigation -->
    <nav style="background:#f05f40 !important " class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Data Visualization Hackathon</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= base_url('') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?= base_url("region.php?reg=ayeyarwaddy") ?>">regions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
