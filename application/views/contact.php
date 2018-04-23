<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul class="c1 breadcrumb text-left">
					<li><a href="#">Shortcodes</a></li>
					<li>Contact Us</li>
				</ul>
				<h3>Contact Us</h3>
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
<div class="map">
	<iframe class="googlemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25211.358248932185!2d144.97024199999998!3d-37.827057399999994!2m3!%20!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce7e0!2sMelbourne+Victoria%2C+Avustralya!5e0!3m2!1str!2s!4v1426652198251" height="430"></iframe>
</div>
<section class="section clearfix">
	<div class="container">
		<div class="row">
			<div id="fullwidth" class="col-sm-12">

				<!-- START CONTENT -->
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<h5>Contact Info</h5>
						<div class="contact-info">
							<ul>
								<li><i class="icon-map"></i> 16 East Wood Avenue, New York, NY 778569, USA</li>
								<li><i class="icon-phone"></i> <strong>Phone:</strong> +444 123456789</li>
								<li><i class="icon-print"></i> <strong>Fax:</strong> +444 123456789</li>
								<li><i class="icon-mail"></i> <strong>Email:</strong> <a href="#">hello@domain.com</a></li>
								<li><i class="icon-link"></i> <strong>Web:</strong> <a href="#">www.domain.com</a></li>
							</ul>
						</div>
					</div><!-- end col -->

					<div class="col-md-8 col-sm-8 col-xs-12">
						<h5>Contact Form</h5>
						<div id="contact_form" class="contact_form">
							<div id="message"></div>
							<form id="contactform" class="row" action="http://trendingtemplates.com/demos/trips/contact.php" name="contactform" method="post">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="name" id="name" class="form-control" placeholder="Name *"> 
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="email" id="email" class="form-control" placeholder="Email *"> 
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input type="text" id="subject" class="form-control" placeholder="Subject"> 
								</div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<textarea class="form-control" name="comments" id="comments" rows="8" placeholder="Messages goes here.."></textarea>
									<button type="submit" value="SEND" id="submit" class="pull-right btn btn-primary btn-lg border-radius">SUBMIT</button>
								</div>
							</form>    
						</div><!-- end contact-form -->
					</div><!-- end col -->
				</div><!-- end row -->
				<!-- END CONTENT -->

			</div><!-- end fullwidth -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>