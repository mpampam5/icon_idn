<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta -->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title><?=ucfirst($temp_title)?></title>
  <!-- vendor css -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=config_item('sty_back')?>plugins/animate/animate.min.css">
  <!-- theme css -->
  <link rel="stylesheet" href="<?=config_item('sty_back')?>css/theme.css">
  <link rel="stylesheet" href="<?=config_item('sty_back')?>css/custom.css">

  <!-- vendor js -->
  <script src="<?=config_item('sty_back')?>plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="<?=config_item('sty_back')?>plugins/popper/popper.min.js"></script>
  <script src="<?=config_item('sty_back')?>plugins/bootstrap/js/bootstrap.min.js"></script>


</head>
<body class="fixed-header header-scroll">
<div id="alert"></div>
  <!-- header -->
  <header id="header">
    <div class="container">
      <div class="navbar-backdrop">
        <div class="navbar">
          <div class="navbar-left">
            <!-- <a class="navbar-toggle"><i class="fa fa-bars"></i></a> -->
             <img src="<?=base_url()?>temp/logo.png" alt="logo" class="logos">
            <!-- <a href="#" class="logo"> <h1 class="text-logo"><?=setting('title')?></h1></a> -->
          </div>


          <div class="nav navbar-right">
            <ul>
              <li class="dropdown dropdown-profile">
                <a href="login.html" data-toggle="dropdown"> <span> <?=session("name");?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" id="resetpwd" href="<?=site_url("backend/resetpwd")?>"><i class="fa fa-key"></i> Ganti Password</a>
                  <a class="dropdown-item" href="<?=site_url("adm-logout")?>" id="sign-out"><i class="fa fa-sign-out"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </div>
        </div>





      </div>




    </div>
  </header>
  <!-- /header -->

<div id="menu-content">
  <div id="cssmenu">
    <?=getMenu()?>
  </div>
</div>
