<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $page_title; ?></title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/fav.png'); ?>" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
	<?php
	foreach ($inclusions['css'] as $file) {
		echo "<link href='" . base_url($file . '.css') . "' rel='stylesheet' type='text/css' />\n";
	}

	foreach ($inclusions['header_js'] as $js) {
		echo "<script type='text/javascript' src='" . base_url($js . '.js') . "'></script>\n";
	}

	if (isset($inclusions['php_scripts'])) {
		foreach ($inclusions['php_scripts'] as $script) {
			include(FCPATH . $script);
		}
	}
	?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<script type="text/javascript">
		window.base_url = '<?php echo base_url(); ?>'
	</script>
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url('admin'); ?>" class="logo">
				<span class="logo-mini"><img src="<?php echo base_url('assets/images/logo.png'); ?>"/>TS</span>
				<span class="logo-lg"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="TODAYSALE"/></span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="<?php echo base_url('admin/logout') ?>" class="btn btn-flat" >
								<span class="hidden-xs">Logout</span>
							</a>					
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<div class="modal ajax"><!-- Place at bottom of page --></div>
