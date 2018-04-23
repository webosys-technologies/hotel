$(document).ready(function() {
	$('.slider').each(function() {
		$(this).CustomSlider();
	})
});

(function($) {
    $.fn.CustomSlider = function() {
    	var slider = $(this);

		var slider_w = slider.width();
		var curr = 1;
		var total = slider.find('.slides .slide').length;
		var slides = slider.find('.slides');
		var sliding = false;
		var is_video_slider = slider.hasClass('video_slider');
		var curr_slide_height;
		var timer;

		var interval = $(this).attr('data-interval');
		if (typeof interval == typeof undefined || interval == false) {
			interval = 7000;
		}

		if( total > 1 ) {
			var html = '';
			html += '	<div class="navigation">';
			html += '		<a href="#prev" class="prev"><i class="fa fa-angle-left"></i></a>';
			html += '		<a href="#next" class="next"><i class="fa fa-angle-right"></i></a>';
			html += '	</div>';

			var total_dots = slider.find('.slide').length;
			html += '<div class="dots_nav">';
			for( var i=1; i<=total_dots; i++ ) {
				html += '<span data-id="'+i+'" class="dot'+i+'">'+i+'</span>';
			}
			html += '</div>';

			slider.append(html)
		}

		$(window).resize(function() {
			set_slides();
			adjust_slider_height();
		});

		slider.find('.slide1 .thumb img').load(function() {
			adjust_slider_height();
			set_slides();
			slider.removeClass('loading');
			if( total > 1 ) start_autoslide();
		}).each(function() {
			if(this.complete) $(this).load();
		});
		
		function adjust_slider_height() {
			slider_w = slider.width();
			slider.find('.slide').width(slider_w);
			curr_slide_height = slider.find('.slides .slide'+curr)[0].scrollHeight;
			slider.css({'height':curr_slide_height+'px'});
		}

		setInterval(adjust_slider_height, 1000);

		function set_slides() {
			slider_w = slider.width();
			slider.find('.slides').width('99999');
			slider.find('.slide').width(slider_w).show();
			slider.find('.slides .slide'+curr).addClass('active');
			slides.css({'margin-left':'-'+(slider_w*(curr-1))+'px'});
			set_bullets();
		}

		function set_bullets() {
			if( total > 1 ) {
				slider.find('.dots_nav span').removeClass('active');
				if( slider.find('.dots_nav').length > 0 ) {
					slider.find('.dots_nav span.dot'+curr).addClass('active');
				}
			}
		}

		function start_autoslide() {
			if( slider.hasClass('autoslide') ) {
				timer = window.setInterval(function() {
					slider.find('.navigation a.next').trigger('click');
				}, interval);
			}
		}

		function stop_autoslide() {
			if( slider.hasClass('with-nav') || slider.hasClass('with-bullets') ) {
				window.clearInterval(timer);
			}
		}

		slider.find('.navigation a.prev').click(function() {
			if( sliding ) return false;
			curr--;
			if( curr < 1 ) curr = total;
			slide();
			return false;
		});

		slider.find('.navigation a.next').click(function() {
			if( sliding ) return false;
			curr++;
			if( curr > total ) curr = 1;
			slide();
			return false;
		});

		function slide() {
			sliding = true
			slider.find('.slides .slide').removeClass('active');
			adjust_slider_height();
			slides.animate({'margin-left':'-'+(slider_w*(curr-1))+'px'}, "slow", "easeInOutCubic", function() {
				sliding = false;
				slider.find('.slides .slide'+curr).addClass('active');
				if( is_video_slider ) {
					slider.find('.slide.video').find('iframe').removeAttr('src').fadeOut();
				}
				stop_autoslide();
			});
			set_bullets();
			start_autoslide();
		}

		slider.find('.dots_nav span').click(function() {
			curr = $(this).data('id');
			slide();
		});

		if( is_video_slider ) {
			slider.find('.play_video').click(function() {
				var video_url = $(this).data('videourl');
				$(this).closest('.slide').find('iframe').attr('src', video_url).fadeIn();
				slider.addClass('video_is_playing');
				stop_autoslide();
			});
		}

    };
})(jQuery);


/* HTML Sample
<div id="slider" class="slider video_slider with-nav with-bullets autoslide">
	<div class="slider_content">
		<div class="slides noanim clearfix">
			<div class="slide slide1 video">
				<div class="thumb">
					<a data-videourl="http://youtube.com/embed/video_ID" class="play_video">
						<img src="images/slide1.jpg" />
					</a>
				</div>
				<iframe frameborder="0" class="noanim"></iframe>
			</div>
		</div>
	</div>
</div>
*/

