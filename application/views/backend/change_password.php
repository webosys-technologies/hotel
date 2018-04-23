<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vcanship - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon" >
  

  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/constants.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/backend/style.css'); ?>">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('admin'); ?>"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="<?php echo SITE_NAME; ?>"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo get_flashdata('message'); ?>
    <div id="login-form">
      <p class="login-box-msg">Change Password</p>
      <form action="<?php echo base_url('admin/change_password'); ?>" method="post" id="change_password_form">

        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" required>
          <i class="fa fa-lock form-control-feedback"></i>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
          <i class="fa fa-lock form-control-feedback"></i>
        </div>
        <div class="row">
          <div class="col-md-8">
          <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="sign_in" value="change_password">Submit</button>
          </div>
        </div>
      </form>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="<?php echo base_url('assets/js/jquery-2.1.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/validator.js'); ?>"></script>

<script type="text/javascript">
  $(document).ready(function(e) {
    var change_password_form = $('#change_password_form');
    change_password_form.validate({
        rules: {
          new_password: {
          minlength: 6
        },
        confirm_password: {
          minlength: 6,
          equalTo: "#new_password"
        }
      },
      errorPlacement: function(error, element) {}
    });
  });
</script>