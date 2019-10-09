<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Elosi Studio, menyediakan jasa fotografi di daerah Makassar, sulawesi selatan dengan background kekinian untuk mengisi konten Media Sosial anda. Mulai dari foto prawedding, graduation, couple, family, maternity, baby, grup, product dll. Ayo foto di Elosi Studio dengan fotografer yang terpercaya dengan harga terjangkau dan hasil memuaskan.">
<meta name="author" content="mpampam.com">

<link rel="shortcut icon" href="<?=base_url()?>temp/front/images/favicon.png">
<title><?=strtoupper(profile("title"))?></title>
<!-- Bootstrap core CSS -->
<link href="<?=base_url()?>temp/front/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url()?>temp/front/css/plugins.css" rel="stylesheet">
<link href="<?=base_url()?>temp/front/style.css" rel="stylesheet">
<link href="<?=base_url()?>temp/front/custom.css" rel="stylesheet">
<link href="<?=base_url()?>temp/front/css/color/blue.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href="<?=base_url()?>temp/front/type/icons.css" rel="stylesheet">
<script src="<?=base_url()?>temp/front/js/jquery.min.js"></script>
<script src="<?=base_url()?>temp/front/js/bootstrap.min.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style media="screen">
#wacht-baixo a {
  font-size: 14px;
  position: fixed;
  z-index: 9999;
  left: 0;
  float: left;
  bottom: 20px;
  border-radius: 20px 0 0 0;
  margin-top: -25px;
  cursor: pointer;
  min-width: 50px;
  max-width: 150px;
  color: #fff;
  text-align: center;
  padding: 10px;
  margin: 0 auto 0 auto;
  /* background: #20B038; */
  -webkit-transition: All 0.5s ease;
  -moz-transition: All 0.5s ease;
  -o-transition: All 0.5s ease;
  -ms-transition: All 0.5s ease;
  transition: All 0.5s ease;
}
</style>
</head>
<body>
<div id="preloader"><div class="textload">Loading</div><div id="status"><div class="spinner"></div></div></div>
<main class="body-wrapper">
  <nav class="navbar solid dark">
    <div class="navbar-header">
      <div class="basic-wrapper">
        <div class="navbar-brand"> <a href="<?=site_url()?>"><img src="#" srcset="<?=base_url()?>temp/front/images/logo2.png 1x, <?=base_url()?>temp/front/images/logo@2x.png 2x" class="logo-light" alt="" /><img src="#" srcset="<?=base_url()?>temp/front/images/logo-dark.png 1x, <?=base_url()?>temp/front/images/logo-dark@2x.png 2x" class="logo-dark" alt="" /></a> </div>
        <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      </div>
      <!-- /.basic-wrapper -->
    </div>
    <!-- /.navbar-header -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?=site_url()?>">Home </a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle js-activated" data-toggle="dropdown">Portfolio <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php $portofolio = $this->db->get("portofolio"); ?>
            <?php foreach ($portofolio->result() as $portofolio): ?>
              <li><a href="<?=site_url("portofolio/$portofolio->id_portofolio/$portofolio->nama")?>"><?=$portofolio->nama?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
        <li><a href="<?=site_url("pricelist")?>">Pricelist </a></li>
        <li><a href="<?=site_url("daftar")?>">Dapatkan Voucher </a></li>
        <li><a href="<?=site_url("kontak")?>">Kontak </a></li>

      </ul>
      <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-collapse -->
    <div class="social-wrapper">
      <ul class="social naked">
        <li><a href="<?=profile("facebook")?>" target="_blank"><i class="icon-s-facebook"></i></a></li>
        <li><a href="<?=profile("instagram")?>" target="_blank"><i class="icon-s-instagram"></i></a></li>
        <li><a href="#"><i class="icon-s-youtube"></i></a></li>
        <li><a href="#"><i class="icon-s-twitter"></i></a></li>
      </ul>
      <!-- /.social -->
    </div>
    <!-- /.social-wrapper -->
  </nav>
  <!-- /.navbar -->
