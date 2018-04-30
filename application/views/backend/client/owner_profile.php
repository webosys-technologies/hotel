<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $page_title; ?></h1>
        <?php echo get_flashdata('message'); ?>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-primary">
                    <?php  
                    // echo '<pre>';
                    // print_r($client_info);
                    // echo '</pre>';
                    ?>
                    <form role="form" method="post" action="<?php echo base_url('regester/owner_signup'); ?>" id="userform" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="prodId">First Name</label>
                                    <input type="text" class="form-control" id="fname"  name="fname"  value="<?php if(isset($client_info[0]->fname)){ echo $client_info[0]->fname; } ?>" autofocus=""  placeholder="Enter First Name">
                                </div>
                            </div>
                            <?php if(isset($client_info[0]->id)): ?>
                                <input type="hidden" name="userid" value="<?php echo custom_encode($client_info[0]->id); ?>" />
                                <input type="hidden" name="status" value="<?php echo $client_info[0]->isverified; ?>" />

                            <?php  endif; ?> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="prodType">Last Name</label>
                                    <input type="text" class="form-control" id="lname"  name="lname" value="<?php if(isset($client_info[0]->lname)){ echo $client_info[0]->lname; } ?>"   placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"  value="<?php if(isset($client_info[0]->phone)){ echo $client_info[0]->phone; } ?>"  placeholder="Enter Phone No.">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Email address</label>
                                    <input type="text" class="form-control" id="email" name="email"  value="<?php if(isset($client_info[0]->email)){ echo $client_info[0]->email; } ?>" placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($client_info[0]->password)){ echo $client_info[0]->password; } ?>"  placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Confirm Password</label>
                                    <input type="password"  class="form-control" id="confpassword" name="confpassword"  value="<?php if(isset($client_info[0]->password)){ echo $client_info[0]->password; } ?>"  placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >D.o.b</label>
                                    <input type="text"  class="form-control" id="dob" name="dob"  value="<?php if(isset($client_info[0]->dob)){ echo $client_info[0]->dob; } ?>"  placeholder="Select dob">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Select Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="<?php  if(isset($client_info[0]->id)){ echo $client_info[0]->country.", ".$client_info[0]->state; } ?>"  placeholder="Select Address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="<?php if(isset($client_info[0]->country)){ echo $client_info[0]->country; } ?>"  placeholder="Select Country">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >State</label>
                                    <input type="text"  class="form-control" id="state" name="state" value="<?php if(isset($client_info[0]->state)){ echo $client_info[0]->state; } ?>"  placeholder="Select State">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >City</label>
                                    <input type="text"  class="form-control" id="city" name="city" value="<?php if(isset($client_info[0]->city)){ echo $client_info[0]->city; } ?>"  placeholder="Select city">
                                </div>
                            </div>  
                        </div>
                        <div class="box-footer">
                            <input type="submit"  id="" name="updateProduct" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    $(document).ready(function ($) {

        $("#dob").datetimepicker({
          format: 'DD/MM/YYYY',
          pickTime: false,
          changeMonth:true,
          changeYear:true,   
      });
        
        $('#userform').validate({
            rules:{
             fname:{
                required: true,
            },
            email: {
                required: true,
                email:true,
            },
            lname:{
                required: true,
            },
            phone:{
                required:true,
                number:true,
            },
            password:{
                required:true,
            },
            confpassword:{
                required:true,
                equalTo:"#password"
            },
            dob:{
                required:true,
            },
            address:{
                required:true,
            }
        },
        errorPlacement: function(error, element) {},
        highlight: function (element) {
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).parent('div').removeClass('has-error');
        }
    });

    });
</script>

