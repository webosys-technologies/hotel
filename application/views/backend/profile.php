<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo $page_title; ?></h1>
		<?php echo get_flashdata('message'); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- <div class="col-md-6">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Profile Information</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="box-body">
							<div class="box-body box-profile">
								<form id="profile-update" action="<?php echo base_url('admin/settings/update/'.$profile['id']); ?>" method="POST">
									<div class="form-group">
										<label for="name">First Name</label>
										<input type="text" name="name" class="form-control" required="" value="<?php echo $profile['name']; ?>">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" class="form-control" required="" value="<?php echo $profile['email']; ?>">
									</div>
                                    <div class="form-group"  id="errordiv">
                                        <div class="col-md-6">
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> Profile Picture
                                                <input type="file" id="fUpload" name="attachment">
                                            </div>
                                            <p class="help-block" id="file-info">Max. 1MB</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="pull-right nowrap">
                                                    <button type="submit" value="submit" name="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Change Password</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">
						<div class="box-body col-md-4">
							<div class="box-body box-profile">
								<form id="password-update" action="<?php echo base_url('admin/login/change_password'); ?>" method="POST">
                                    <div class="form-group">
                                        <label class="control-label" for="old_password">Old Password</label>
                                        <input type="password" class="form-control" id="old_password" name="old_password" required>
                                    </div>
									<div class="form-group">
										<label for="newPassword">New Password</label>
										<input type="Password" name="password" id="password" class="form-control" required="">
									</div>
									<div class="form-group">
										<label for="confirmPassword">Confirm New Password</label>
										<input type="Password" name="confirmPassword" id="confirmPassword" class="form-control" required="">
									</div>
									<div class="form-group">
										<div class="pull-right nowrap">
											<button type="submit" name="sign_in" value="change_password" class="btn btn-danger">change password</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<script>
	jQuery(document).ready(function($) {
		$('#password-update').validate({
            rules: {
                password: {
                    minlength: 5
                },
                confirmPassword: {
                    minlength: 5,
                    equalTo: "#password"
                },
            },
            errorPlacement: function(error, element) {},
            highlight: function(element) {
				$(element).parent('div').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).parent('div').removeClass('has-error');
			}
        });

        $('#profile-update').validate({
            errorPlacement: function (error, element) {
                if($(element).id == 'fUpload'){
                    error.appendTo('#errordiv');
                }
            },
            highlight: function (element) {
                $(element).parent('div').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).parent('div').removeClass('has-error');
            }
        });

        $("#fUpload").on('change', function () {
            $("#file-info").empty();
            var fp = $("#fUpload");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fragment = "";
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    var fileName = items[i].name; // get file name
                    var fileSize = bytesToSize(items[i].size); // get file size
                    //var fileType = items[i].type; // get file type
                    // append li to UL tag to display File info
                    fragment += fileName + " (<b>" + fileSize + "</b>)";
                }
                $("#file-info").append(fragment);
            }
        });

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0)
                return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
	});
</script>
