<style>
    .header
    {
            
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trips | Hotel Booking</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/images/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/images/apple-touch-icon-114x114.png" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <!-- Default Styles -->
    <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link href="<?php echo base_url();?>assets/rs-plugin/css/settings.css" rel="stylesheet">
</head>
<body>
    <div id="loader">
        <div class="loader-container">
            <h3 class="loader-back-text"><img src="<?php echo base_url();?>assets/images/loader.gif" alt="" class="loader"></h3>
        </div>
    </div>
    <div id="wrapper">
        <div class="topbar">
            <div class="container">
                <div class="pull-left">
                    <ul class="topbar-social list-inline">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-flickr"></i></a></li>
                        <li><i class="icon-telephone5"></i> 1800-3456-7891</li>
                    </ul><!-- end list-style -->
                </div><!-- end left -->
                <div class="pull-right">
                    <ul class="opbar-drops list-inline">
                     <?php if(!user_logged_in()): ?>
                        <li><a href="<?php echo base_url('login'); ?>">LOGIN/REGESTER</a></li>
                    <?php else: ?>
                     <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url('login'); ?>">Welcome :<?php echo ucwords($_SESSION['name']);?></a>
                         <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url('user/dashboard');?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('user/index').'/'.custom_encode($_SESSION['userid']); ?>">Profile Details</a></li>
                            <li><a href="<?php echo base_url('home/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul><!-- end list-style -->
        </div><!-- end right -->
    </div><!-- end container -->
</div><!-- end topbar -->
<header class="header fixedheader nobg" style="background-color: #818080 !important;
    padding: 0px;
    background-image: linear-gradient(to bottom, #23a1d1, #1f90bb) !important;
    background-repeat: repeat-x;
    border-color: #1f90bb #1f90bb #145e7a;">
    <div class="menu-container">
        <div class="container">
            <div class="menu-wrapper">
                <nav id="navigation" class="navbar" role="navigation">
                    <div class="navbar-inner">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="icon-menu27"></i>
                            </button>
                            <a id="brand" class="clearfix navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/images/wlogo.png" alt="Trips"></a>
                        </div><!-- end navbar-header -->
                        <div id="navbar-collapse" class="navbar-right navbar-collapse collapse clearfix">
                            <ul class="nav navbar-nav yamm">
                                <li class="">
                                    <a href="<?php echo base_url();?>" class="active" >HOME</a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('home/about');?>" class="" >ABOUT US</a>
                                </li>
                                <li><a href="<?php echo base_url('hotel'); ?>">HOTELS</a></li>
                                <li><a href="<?php echo base_url('htl'); ?>">HOTEL Login</a></li>
                                <li><a href="<?php echo base_url('contact'); ?>">CONTACT</a></li>
                            </ul><!-- end navbar-right -->
                        </div><!-- end navbar-callopse -->
                    </div><!-- end navbar-inner -->
                </nav><!-- end navigation -->
            </div><!-- menu wrapper -->
        </div><!-- end container -->
    </div><!-- end menu-container -->

    </header><!-- end header -->