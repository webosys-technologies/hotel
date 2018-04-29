<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo SITE_NAME; ?> - Login</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/fav.png'); ?>" type="image/x-icon" >
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/constants.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/backend/style.css'); ?>">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url('htl'); ?>"><img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="<?php echo SITE_NAME; ?>"></a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body" >
			<?php echo get_flashdata('message'); ?>
			<div id="login-form">
				<p class="login-box-msg">Sign in to start your session</p>
				<div id="subscribe-success"></div>
				<form id="login_form"  method="post" action="<?php echo base_url('htl'); ?>">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="username" placeholder="email" required="required">
						<i class="fa fa-envelope form-control-feedback"></i>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
						<i class="fa fa-lock form-control-feedback"></i>
					</div>
					<div class="row">					
						<div class="col-md-12">
							<input type="hidden" name="timeZone" id="timeZone">
							<button type="submit" class="btn btn-primary btn-block btn-flat" name="sign_in" value="Sign In">Sign In</button>
						</div>
					</div>

				</form>
			</div>

			<div id="forgot-form" style="display: none;">
				<p class="forgot-box-msg">In case you forgot your password, don't worry. We'll help you to get your account access back. Just enter your email address, we'll send you an email with change password link.</p>
				<form id="forgot_form" action="<?php echo base_url('admin/forgot'); ?>" method="post">
					<div class="form-group has-feedback">
						<input type="email" class="form-control" name="forgot_email" placeholder="Email" required="required">
						<i class="fa fa-envelope form-control-feedback"></i>
					</div>
					<div class="row">
						<div class="col-md-8">
							<a href="#" class="back_to_login">Back To Login</a>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat" name="sign_in" value="forgot">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<center>	<a href="<?php echo base_url(); ?>" class=" link">« Go to homepage</a>
				</center>	
			</div>
		</div>
	</div>
	<!-- /.login-box -->
	<script src="<?php echo base_url('assets/backend/js/jquery-2.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/backend/js/validator.js'); ?>"></script>
</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jstimezonedetect/1.0.4/jstz.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        var tz = jstz.determine(); // Determines the time zone of the browser client
        var timezone = tz.name(); //'Asia/Kolhata' for Indian Time.
        $('#timeZone').val(timezone);
        $('#login_form').validate({
        	rules:{
        		username:{
        			required: true,
        			email: true
        		},
        		password: {
        			required: true
        		}
        	},
        	errorPlacement: function(error, element) {},
        	highlight: function(element) {
        		$(element).parent('div').addClass('has-error');
        	},
        	unhighlight: function(element) {
        		$(element).parent('div').removeClass('has-error');
        	}
        });
        $('#forgot_form').validate({
        	rules:{
        		forgot_email:{
        			required: true,
        			email: true
        		}
        	},
        	errorPlacement: function(error, element) {},
        	highlight: function(element) {
        		$(element).parent('div').addClass('has-error');
        	},
        	unhighlight: function(element) {
        		$(element).parent('div').removeClass('has-error');
        	}
        });

        $('#forgot-form').hide();
        
        $('.forgot_password').click(function() {
        	$('.alert-danger').hide();
        	$('#login-form').hide();
        	$('#forgot-form').show();
        });

        $('.back_to_login').click(function() {
        	$('#login-form').show();
        	$('#forgot-form').hide();
        });
    });
</script>
<script>
</script>
