<?php $this->load->view('common/header1'); ?>
<section id="page-header" class="section background">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3> <?php echo ($hotelroom[0]->hotel_name)?></h3>
                <p>
<!--                    <span class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </span> end rating -->
                    <?php echo ($hotelroom[0]->hotel_address)?></p>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end section -->

    <section class="section clearfix">
        <div class="container">
            <div class="row">
            <div id="fullwidth" class="col-sm-12">
                    <!-- START CONTENT -->
                    <div class="single-hotel-wrapper">
                        <div class="single-hotel-image">
                             <img src="<?php echo FILE .$hotelroom[0]->hotel_pic; ?>" alt="" class="img-responsive">
<!--                            <div class="price">
                                <h6>FANTASTIC 8.4</h6>
                                <h2><small>$</small>523<span>/NIGHT</span></h2>
                                <a href="#" class="btn btn-primary btn-lg">BOOK NOW</a>
                            </div> end price -->

<!--                            <div class="thumbnails">
                                <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" title="" href="upload/hotel_01.png"><img src="<?php echo base_url(); ?>/assets/upload/hotel_01.png" alt="" class="img-responsive"></a>
                                <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" title="" href="upload/hotel_02.png"><img src="<?php echo base_url(); ?>/assets/upload/hotel_02.png" alt="" class="img-responsive"></a>
                                <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" title="" href="upload/hotel_03.png"><img src="<?php echo base_url(); ?>/assets/upload/hotel_03.png" alt="" class="img-responsive"></a>
                                <a data-gal="prettyPhoto[product-gallery]" rel="bookmark" title="" href="upload/hotel_04.png"><img src="<?php echo base_url(); ?>/assets/upload/hotel_04.png" alt="" class="img-responsive"></a>
                            </div> end price -->

                            <div class="single-hotel-bottom">
                                <p>
                                    <i class="icon-location38"></i> <strong>Area:</strong> Marina Bay 
                                    <i class="icon-person199"></i> <strong>Rooms:</strong> 2561 
                                    <i class="icon-wifi10"></i> <strong>Free:</strong> Wifi
                                </p>
                            </div><!-- end bottom -->
                        </div><!-- end image -->

                        <hr class="hotel-hr">

                        <div class="row">
                            <div id="content" class="col-md-9 col-sm-12 col-xs-12">
                                <div class="book-widget">
                                    <div class="hotel-title">
                                        <h5>ENTER DATE TO SEE PRICES AND AVAILABILITY</h5>
                                    </div>

                                    <form class="bookform form-inline row">
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Check in" id="datepicker">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Check out" id="datepicker1">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                            <div class="dropdown">
                                                <select class="selectpicker" data-style="btn-white">
                                                    <option>Adults</option>
                                                    <option>2+1 with Bedroom + 2 Child</option>
                                                    <option>1+1 with Bedroom + 1 Child</option>
                                                    <option>2+1 with Bedroom + Full</option>
                                                    <option>Full Services 15 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-primary btn-block btn-normal"><i class="icon-search"></i></button>
                                        </div>
                                    </form>

                                    <div class="clearfix"></div>

                                    <div class="hotel-list">
                                        <div class="row border-bottom2">
                                            <div class="col-sm-5">
                                                <h6>ROOM TYPES</h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6>PRICE</h6>
                                            </div>
                                            <div class="col-sm-2">
                                                <h6>NO.ROOMS</h6>
                                            </div>
                                            <div class="col-sm-3">
                                                <h6>ACTION</h6>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                
                                                <img src="<?php echo FILE .$hotelroom[0]->hotel_pic; ?>" alt="" class="img-responsive alignleft">
                                                <p>Luxury Suite</p>
                                                <p class="lead">Double or twin beds, en-suite bathrooms, a large living</p>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <h5>$523<span>/NIGHT</span></h5>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <div class="dropdown selectmini">
                                                    <select class="selectpicker" data-style="btn-white">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 list-style-hotel">
                                                <a href="#" class="btn btn-primary btn-normal border-radius">BOOK NOW</a>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img src="<?php echo base_url(); ?>/assets/upload/single_hotel_02.png" alt="" class="img-responsive alignleft">
                                                <p>Luxury Suite</p>
                                                <p class="lead">Double or twin beds, en-suite bathrooms, a large living</p>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <h5>$523<span>/NIGHT</span></h5>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <div class="dropdown selectmini">
                                                    <select class="selectpicker" data-style="btn-white">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 list-style-hotel">
                                                <a href="#" class="btn btn-primary btn-normal border-radius">BOOK NOW</a>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img src="<?php echo base_url(); ?>/assets/upload/single_hotel_03.png" alt="" class="img-responsive alignleft">
                                                <p>Luxury Suite</p>
                                                <p class="lead">Double or twin beds, en-suite bathrooms, a large living</p>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <h5>$523<span>/NIGHT</span></h5>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <div class="dropdown selectmini">
                                                    <select class="selectpicker" data-style="btn-white">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 list-style-hotel">
                                                <a href="#" class="btn btn-primary btn-normal border-radius">BOOK NOW</a>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-sm-5">
                                                <img src="<?php echo base_url(); ?>/assets/upload/single_hotel_04.png" alt="" class="img-responsive alignleft">
                                                <p>Luxury Suite</p>
                                                <p class="lead">Double or twin beds, en-suite bathrooms, a large living</p>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <h5>$523<span>/NIGHT</span></h5>
                                            </div>
                                            <div class="col-sm-2 list-style-hotel">
                                                <div class="dropdown selectmini">
                                                    <select class="selectpicker" data-style="btn-white">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 list-style-hotel">
                                                <a href="#" class="btn btn-primary btn-normal border-radius">BOOK NOW</a>
                                            </div>
                                        </div>   

                                        <div class="clearfix"></div>
                                    </div><!-- end hotel-list -->

                                    <hr>
                                    <br>

                                    <div class="row hotel-desc">
                                        <div class="col-md-12">
                                            <h5>AMENITIES</h5>
                                            <p>Maecenas vitae turpis condimentum metus tincidunt semper bibendum ut orci. Donec eget accumsan est. Duis laoreet sagittis elit et vehicula. Cras viverra posuere condimentum. Donec urna arcu, venenatis quis augue sit amet, mattis gravida nunc. Integer faucibus, tortor a tristique adipiscing, arcu metus luctus libero, nec vulputate risus elit id nibh.</p>
                                        </div>
                                    </div><!-- end row -->

                                    <br>

                                    <div class="row hotel-icon-list">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <p><span class="icon-container"><i class="icon-sedan3"></i></span> Free Parking</p>
                                            <p><span class="icon-container"><i class="icon-tea24"></i></span> Free Breakfast</p>
                                            <p><span class="icon-container"><i class="icon-tour"></i></span> Free Tour</p>
                                            <p><span class="icon-container"><i class="icon-silhouette66"></i></span> Swimming pool</p>
                                        </div><!-- end col -->

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <p><span class="icon-container"><i class="icon-sedan3"></i></span> Free Parking</p>
                                            <p><span class="icon-container"><i class="icon-tea24"></i></span> Free Breakfast</p>
                                            <p><span class="icon-container"><i class="icon-tour"></i></span> Free Tour</p>
                                            <p><span class="icon-container"><i class="icon-silhouette66"></i></span> Swimming pool</p>
                                        </div><!-- end col -->

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <p><span class="icon-container"><i class="icon-sedan3"></i></span> Free Parking</p>
                                            <p><span class="icon-container"><i class="icon-tea24"></i></span> Free Breakfast</p>
                                            <p><span class="icon-container"><i class="icon-tour"></i></span> Free Tour</p>
                                            <p><span class="icon-container"><i class="icon-silhouette66"></i></span> Swimming pool</p>
                                        </div><!-- end col -->
                                    </div><!-- end hotel-icon-list -->

                                    <hr>
                                    <br>

                                    <div class="row hotel-desc">
                                        <div class="col-md-12">
                                            <h5>ABOUT THE HOTEL</h5>
                                            <p>Sed aliquam nunc eget velit imperdiet, in rutrum mauris malesuada. Quisque ullamcorper vulputate nisi, et fringilla ante convallis quis. Nullam vel tellus non elit suscipit volutpat. Integer id felis et nibh rutrum dignissim ut non risus. In tincidunt urna quis sem luctus, sed accumsan magna pellentesque. Donec et iaculis tellus. Vestibulum ut iaculis justo, auctor sodales lectus. Donec et tellus tempus, dignissim maurornare, consequat lacus. Integer dui neque, scelerisque nec sollicitudin sit amet, sodales a erat. Duis vitae condimentum ligula. Integer eu mi nisl. Donec massa dui, commodo id arcu quis, venenatis scelerisque velit. </p>

                                            <p>Praesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non, faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec velit non odio aliquam suscipit. Sed non neque faucibus, condimentum lectus at, accumsan enim. Fusce pretium egestas cursus. Etiam consectetur, orci vel rutrum volutpat, odio odio pretium nisiodo tellus libero et urna. Sed commodo ipsum ligula, id volutpat risus vehicula in. Pellentesque non massa eu nibh posuere bibendum non sed enim. Maecenas lobortis nulla sem, vel egestas dui ullamcorper ac.</p> 

                                            <p>Sed scelerisque lectus sit amet faucibus sodales. Proin ut risus tortor. Etiam fermentum tellus auctor, fringilla sapien et, congue quam. In a luctus tortor. Suspendisse eget tempor libero, ut sollicitudin ligula. Nulla vulputate tincidunt est non congue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus at est imperdiet, dapibus ipsum vel, lacinia nulla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus id interdum lectus, ut elementum elit. Nullam a molestie magna. Praesent eros turpis, commodo vel justo at, pulvinar mollis eros. Mauris aliquet eu quam id ornare. Morbi ac quam enim. Cras vitae nulla condimentum, semper dolor non, faucibus dolor. Vivamus adipiscing eros quis orci fringilla, sed pretium lectus viverra.</p>
                                        </div><!-- end col -->
                                    </div><!-- end hote-desc -->
                                </div><!-- end book-widget -->

                                <div class="clearfix"></div>
                                <hr>
                                <br>

                                <div class="review-widget">
                                    <div class="hotel-title">
                                        <h5>REVIEWS</h5>
                                    </div>

                                    <div class="row hotel-review">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="review-list">
                                                <h5>SERVICE:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>SLEEP QUALITY:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>LOCATION:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>SWIMMING POOL:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="review-list">
                                                <h5>VALUE:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>CLEANLINESS:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>ROOMS:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>

                                            <div class="review-list">
                                                <h5>FITNESS FACILITY:</h5> 
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="review-total text-center">
                                                <h1>10/10</h1>
                                                <span class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span><!-- end rating -->
                                            </div><!-- end review-total -->
                                        </div><!-- end col -->
                                    </div><!-- end hotel-review -->
                                </div><!-- end review widget -->

                                <hr>

                                <div class="comments">
                                    <ul class="media-list clearfix">
                                        <li class="media clearfix">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="<?php echo base_url(); ?>/assets/upload/comment_01.png" alt="Generic placeholder image">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Luke Bring</h4>
                                                <p class="comment-meta pull-left">
                                                   January 10, 2015 . 11:05 PM
                                               </p>

                                               <span class="rating pull-right">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span><!-- end rating -->

                                            <div class="clearfix"></div>

                                            <p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                        </div>
                                    </li>

                                    <li class="media clearfix">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="<?php echo base_url(); ?>/assets/upload/comment_02.png" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Jenny DOE</h4>
                                            <p class="comment-meta pull-left">
                                               January 10, 2015 . 11:05 PM
                                           </p>

                                           <span class="rating pull-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span><!-- end rating -->

                                        <div class="clearfix"></div>

                                        <p>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- end comments -->

                        <div class="leave-a-feedback text-center clearfix">
                            <h6>PLEASE <a href="login.html">LOGIN / REGISTER</a> TO LEAVE A FEEDBACK</h6>
                        </div><!-- end leave-a-feedback -->

                        <div class="related-hotels clearfix">
                            <div class="hotel-title">
                                <h5>RELATED HOTELS</h5>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="post-wrapper clearfix border-bottom">
                                        <div class="hotel-wrapper">
                                            <div class="post-media">
                                                <a href="hotel-single.html"><img src="<?php echo base_url(); ?>/assets/upload/hotel_01.png" alt="" class="img-responsive"></a>
                                            </div><!-- end media -->
                                            <div class="post-title clearfix">
                                                <div class="pull-left">
                                                    <h5><a href="hotel-single.html" title="">VALLE AURINA</a></h5>
                                                </div><!-- end left -->
                                                <div class="pull-right">
                                                    <h6>$500</h6>
                                                </div><!-- end left -->
                                            </div><!-- end title -->
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span><!-- end rating -->
                                            <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia..</p>
                                        </div><!-- end hotel-wrapper -->                            
                                    </div><!-- end post-wrapper -->
                                </div><!-- end col -->

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="post-wrapper clearfix border-bottom">
                                        <div class="hotel-wrapper">
                                            <div class="post-media">
                                                <a href="hotel-single.html"><img src="<?php echo base_url(); ?>/assets/upload/hotel_02.png" alt="" class="img-responsive"></a>
                                            </div><!-- end media -->
                                            <div class="post-title clearfix">
                                                <div class="pull-left">
                                                    <h5><a href="hotel-single.html" title="">PRINCIPE FORTE..</a></h5>
                                                </div><!-- end left -->
                                                <div class="pull-right">
                                                    <h6>$225</h6>
                                                </div><!-- end left -->
                                            </div><!-- end title -->
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span><!-- end rating -->
                                            <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia..</p>
                                        </div><!-- end hotel-wrapper -->                            
                                    </div><!-- end post-wrapper -->
                                </div><!-- end col -->

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="post-wrapper clearfix border-bottom">
                                        <div class="hotel-wrapper">
                                            <div class="post-media">
                                                <a href="hotel-single.html"><img src="<?php echo base_url(); ?>/assets/upload/hotel_03.png" alt="" class="img-responsive"></a>
                                            </div><!-- end media -->
                                            <div class="post-title clearfix">
                                                <div class="pull-left">
                                                    <h5><a href="hotel-single.html" title="">VOGLAUER QUADRO</a></h5>
                                                </div><!-- end left -->
                                                <div class="pull-right">
                                                    <h6>$225</h6>
                                                </div><!-- end left -->
                                            </div><!-- end title -->
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span><!-- end rating -->
                                            <p>Template based on deep research on the most popular travel booking websites such as booking.com, tripadvisor, yahoo travel, expedia..</p>
                                        </div><!-- end hotel-wrapper -->                            
                                    </div><!-- end post-wrapper -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end related-hotels -->
                    </div><!-- end content -->

                    <div id="sidebar" class="col-md-3 col-sm-12 col-xs-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h6>CLIENTS LIKE THIS HOTEL FOR:</h6>
                            </div><!-- end title -->

                            <div class="hotel-widget clearfix">
                                <p><i class="icon-car82"></i> Nearest Railway Station:</p>
                                <small>Marina Bay MRT Station (0.8 Km / 10 min walk)</small>
                            </div><!-- end listwidget -->

                            <div class="hotel-widget clearfix">
                                <p><i class="icon-location38"></i> Area recommended for:</p>
                                <small>restaurants</small>
                                <small>shopping</small>
                                <small>sightseeing</small>
                            </div><!-- end listwidget -->

                            <div class="hotel-widget clearfix">
                                <p><i class="icon-air6"></i> Distance to airport:</p>
                                <small>Seletar Airport (14.9 Km)</small>
                                <small>Changi International Airport (16.8 Km)</small>
                            </div><!-- end listwidget -->

                            <div class="hotel-widget clearfix">
                                <p><i class="icon-comment43"></i> Customer comments:</p>
                                <small>“Casino” , “New hotel” , “Nice pool” , “Room design”</small>
                            </div><!-- end listwidget -->

                            <div class="hotel-widget clearfix">
                                <p><i class="icon-camera"></i> Top attractions in the area:</p>
                                <small>Marina Bay Sands Casino (0.0 Km)</small>
                                <small>Merlion (0.7 Km / 9 min walk)</small>
                                <small>Marina Bay Floating Platform (0.8 Km / 10 min walk)</small>
                                <small>Esplanade Theatres on the Bay (0.9 Km / 11 min walk)</small>
                            </div><!-- end listwidget -->

                            <div class="hotel-widget clearfix">
                                <span class="notice">Note:Note: Distances are measured as a straight line, calculated from a starting point to a destination point.</span>
                            </div><!-- end listwidget -->

                            <div class="sidebar-price clearfix">
                                <h6>FANTASTIC 8.4</h6>
                                <h2><small>$</small>523<span>/NIGHT</span></h2>
                                <a href="#" class="btn btn-primary btn-lg">BOOK NOW</a>
                            </div><!-- end price -->

                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end row -->
            </div><!-- end single-hotel-wrapper -->
            <!-- END CONTENT -->

        </div><!-- end fullwidth -->
    </div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->
<?php $this->load->view('common/footer'); ?>