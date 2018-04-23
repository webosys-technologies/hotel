$(document).ready(function (e) {
    //videoCallNotification();
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });

    //setInterval("videoCallNotification()",120000);
    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
        });
    $('#change_new_password').validate({
        rules: {
            old_password: {
                required: true
            },
            new_password: {
                required: true,
                pwcheck: true,
                minlength: 6
            },
            con_password: {
                required: true,
                pwcheck: true,
                minlength: 6,
                equalTo: "#new_password"
            },
        },
        errorPlacement: function (error, element) {
        },
        highlight: function (element) {
            $(element).parent('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).parent('.form-group').removeClass('has-error');
        },
        submitHandler: function (form) {
            $(form).find(':submit').attr('disabled', 'disabled');
            $.ajax({
                url: form.action,
                type: form.method,
                dataType: 'JSON',
                data: $(form).serialize(),
                success: function (response) {
                    if (response.error == true) {
                        $(form).find('.message').html(response.message);
                    } else {
                        $(form).find('.message').html(response.message);
                        setTimeout(location.reload.bind(base_url), 1000);
                    }
                    $(form).find(':submit').removeAttr('disabled');
                }
            });
        }
    });


    $(".alert-dismissable").click(function (e) {
        $(this).fadeOut('slow');
    });
    if ($(".select2").length > 0) {
        $(".select2").select2();

    }
    /*$('b[role="presentation"]').hide();
    $('.select2-selection__arrow').append('<i class="fa fa-angle-down"></i>');*/



    $('.open_fields_box .link').click(function () {
        //$(this).parent().addClass('active');
    });

    /*$('.file_field input').change(function () {
     if ($(this).val() == '') {
     $(this).closest('.file_field').find('.file_name').html('');
     } else {
     var image_name = $(this)[0].files[0].name;
     $(this).closest('.file_field').find('.file_name').html(image_name);
     }
     });

     // Verify Document is not verify then user can delete the old document and upload new
     $('.file_field .file_info .btn-danger').click(function () {
     $(this).parent('.file_info').addClass('hide');
     $(this).parent().parent().find('.upload_input').removeClass('hide');
 });*/

    //fancybox popup
    $(document).on('click', '.fancybox', function (event) {
        var link = $(this).attr('href');
        var options = {
            href: link,
            padding: 0,
            autoHeight: true,
            autoCenter: true,
            openEffect: 'fade',
            closeEffect: 'fade',
            closeClick: false,
            helpers: {
                overlay: {closeClick: false},
                overlay: {locked: false}
            },
        };
        if ($(this).hasClass('youtube')) {
            options.type = "iframe";
            options.padding = 5;
            options.width = 720;
            options.height = 9 / 16 * 720;
        }
        if ($(this).hasClass('iframe')) {
            options.type = "iframe";
        }
        if (typeof $(this).data('download') !== 'undefined') {
            var url = $(this).data('download');
            options.afterLoad = function () {
                this.title = '<a href="' + url + '"><i class="fa fa-download"></i> Download</a> ';
            };
        }
        var $video_player, _player, _isPlaying = false;
        if ($(this).hasClass('video')) {
            options.padding = 5;
            options.width = 720;
            options.height = (9 / 16 * 720);
            options.type = "html";
            options.beforeLoad = function () {
                this.content = "<video id='video_player' src='" + this.href + "' height='" + (9 / 16 * 720) + "' width='720' poster='' controls='controls' autoplay preload='block' ></video>";
            }

            options.afterShow = function () {
                var height = options.height + 3;
                var $video_player = new MediaElementPlayer('#video_player', {
                    defaultVideoWidth: 720,
                    //defaultVideoHeight: 9 / 16 * 720,
                    success: function (mediaElement, domObject) {
                        _player = mediaElement; // override the "mediaElement" instance to be used outside the success setting
                        _player.load(); // fixes webkit firing any method before player is ready
                        // _player.play(); // autoplay video (optional)
                        _player.addEventListener('playing', function () {
                            _isPlaying = false;
                        }, false);
                    } // success
                });
            }

            options.beforeClose = function () {
                // if video is playing and we close fancyBox
                // safely remove Flash objects in IE
                if (_isPlaying && navigator.userAgent.match(/msie [6-8]/i)) {
                    // video is playing AND we are using IE
                    _player.remove(); // remove player instance for IE
                    _isPlaying = false; // reinitialize flag
                }
            }
        }

        $.fancybox.open(options);
        return false;
    });
    if ($('input[type="checkbox"].minimal, input[type="radio"].minimal').length > 0) {
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
    }

    //Red color scheme for iCheck
    if ($('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').length > 0) {
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
    }
    //Flat red color scheme for iCheck
    if ($('input[type="checkbox"].flat-red, input[type="radio"].flat-red').length > 0) {
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    }

    if ($('input[type="checkbox"].flat-red, input[type="radio"].flat-red').length > 0) {

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    }

    if ($('#video, .video').length > 0) {
        $('#video, .video').mediaelementplayer({
            plugins: ['flash', 'silverlight'],
            enablePluginSmoothing: false,
            // enabled pseudo-streaming (seek) on .mp4 files
            enablePseudoStreaming: false,
            // start query parameter sent to server for pseudo-streaming
            pseudoStreamingStartQueryParam: 'start',
            success: function (mediaElement, domObject) {
                if (mediaElement.pluginType == 'silverlight') {
                    mediaElement.addEventListener('canplay', function () {
                        // Player is ready
                        mediaElement.play();
                    }, false);
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    var retriction = false; //{componentRestrictions: {'country': 'in'}};

    if ($('#address').length > 0 || $('#clinicAddress').length > 0) {
        $.ajax({
            url: '//maps.googleapis.com/maps/api/js?signed_in=false&v=3.exp&libraries=geometry&libraries=places&key=AIzaSyDllkLHRu7QzCUCHJhjqF4GK1F5GnxW4F4',
            dataType: 'script',
            cache: true,
            success: function () {

                if ($('#address').length > 0) {
                    initAutocomplete();
                }
                if ($('#clinicAddress').length > 0) {
                    //initAutocompleteClinic();
                }
            }
        });
    }
    function initAutocomplete() {
        client_profile = document.getElementById('address');
        autocomplete_for_client_profile = new google.maps.places.Autocomplete(client_profile, retriction);
        google.maps.event.addListener(autocomplete_for_client_profile, 'place_changed', onPlaceChanged_client_profile);
    }

    function initAutocompleteClinic() {
        client_profileOne = document.getElementById('clinicAddress');
        autocomplete_for_client_profileOne = new google.maps.places.Autocomplete(client_profileOne, retriction);
        google.maps.event.addListener(autocomplete_for_client_profileOne, 'place_changed', onPlaceChanged_client_profileOne());
    }

    function onPlaceChanged_client_profile() {
        var place = autocomplete_for_client_profile.getPlace();
        var street_number = '';
        var suburb = '';
        var location = '';
        var town = '';
        var state = '';
        var country = '';
        var postal_code = '';

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            var val = place.address_components[i];
            console.log(addressType);
            console.log(val);
            if (addressType == 'locality') {
                location = location + val.long_name + ' ';
            } else if(addressType == 'street_number') {
                street_number = val.long_name;
            } else if (addressType == 'route' || addressType == 'premise' || addressType == 'sublocality_level_2' || addressType == 'sublocality_level_1') {
                suburb= val.long_name + ' ';
            } else if (addressType == 'administrative_area_level_2' || addressType == 'neighborhood') {
                town = town + val.long_name + ' ';
            } else if (addressType == 'administrative_area_level_1' || addressType == 'state') {
                state = state + val.long_name + ' ';
            } else if (addressType == 'country') {
                country = country + val.long_name + ' ';
            } else if (addressType == 'postal_code') {
                postal_code = postal_code + val.long_name + ' ';
            }

        }

        var geometry = place.geometry.location;
        var geolocation = {
            lat: geometry.lat(),
            lng: geometry.lng()
        };
        $('input[name=suburb]').val(suburb);
        $('input[name=street]').val(street_number);
        $('input[name=city]').val(location);
        $('input[name=state]').val(state);
        $('input[name=country]').val(country);
        $('input[name=postalcode]').val(postal_code);
        $('input[name=lat]').val(geolocation.lat);
        $('input[name=lon]').val(geolocation.lng);
    }

    function onPlaceChanged_client_profileOne() {
        var place = autocomplete_for_client_profileOne.getPlace();
        var street_number = '';
        var suburb = '';
        var location = '';
        var town = '';
        var state = '';
        var country = '';
        var postal_code = '';

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            var val = place.address_components[i];
            // console.log(addressType);
            // console.log(val);
            if (addressType == 'locality') {
                location = location + val.long_name + ' ';
            } else if(addressType == 'street_number') {
                street_number = val.long_name;
            } else if (addressType == 'route' || addressType == 'premise' || addressType == 'sublocality_level_2' || addressType == 'sublocality_level_1') {
                suburb= val.long_name + ' ';
            } else if (addressType == 'administrative_area_level_2' || addressType == 'neighborhood') {
                town = town + val.long_name + ' ';
            } else if (addressType == 'administrative_area_level_1' || addressType == 'state') {
                state = state + val.long_name + ' ';
            } else if (addressType == 'country') {
                country = country + val.long_name + ' ';
            } else if (addressType == 'postal_code') {
                postal_code = postal_code + val.long_name + ' ';
            }

        }

        var geometry = place.geometry.location;
        var geolocation = {
            lat: geometry.lat(),
            lng: geometry.lng()
        };
        $('input[name=clinicSuburb]').val(suburb);
        $('input[name=clinicStreet]').val(street_number);
        $('input[name=clinicCity]').val(town + ', ' + location);
        $('input[name=clinicState]').val(state);
        $('input[name=clinicCountry]').val(country);
       
        $('input[name=clinicPostalcode]').val(postal_code);
        $('input[name=clinicLat]').val(geolocation.lat);
        $('input[name=clinicLon]').val(geolocation.lng);
    }
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }


});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

$(function () {
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
            $(this).toggleClass('open');
            $('b', this).toggleClass("caret caret-up");
        });

    "use strict";
    if ($(".droupdown").length > 0) {
        $(".droupdown").select2();
    }
    if ($("[data-mask]").length > 0) {
        $("[data-mask]").inputmask();
    }

    $('[data-toggle="popover"]').popover();


    $("[rel='tooltip'], .tooltip").tooltip();

    if ($(".text_editor").length > 0) {
        $(".text_editor").each(function (index, element) {
            if (typeof $(this).data('height') !== 'undefined') {
                $(this).summernote({height: $(this).data('height')});
            } else {
                $(this).summernote({
                    height: 200,
                });
            }
        });
    }

//    $('body').on('focus', '.input-group.date form-control', function (event) {
//        $(this).datetimepicker({
//            format: "DD-MM-YYYY",
//            pickTime: false
//        });
//    });

    $('body').on('click', '.input-group.date .input-group-addon', function () {
        $(this).closest('.input-group.date').find('.form-control').trigger('focus');
    });

});

function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

function myFunctionNot() {
    var x = document.getElementById('myDIVNot');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

function myFunctionCal() {
    var x = document.getElementById('myDIVCal');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}


$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $('#menu ul').hide();
});

function initMenu() {
    $('#menu ul').hide();
    $('#menu ul').children('.current').parent().show();
}
function videoCallNotification() {
    $('#video-token').html('');
    $('#video-token').closest('.alert.alert-danger').removeClass('in');
    $.ajax({
        type: "POST",
        url: base_url + "dashboard/notifications/token",
        data: {data:'notification'},
        dataType: "JSON",
        success: function(response){
            if(response.error == false) {
                $('#video-token').closest('notification').show();
                $('#video-token').html(response.message);
                /*var audio = $('#alert-tone');
                audio.play();*/
                $('#video-token').closest('.alert.alert-danger').addClass('in');
                $('html, body').animate({
                    'scrollTop' : $("#video-token").position().top
                });
            } else {
                $('#video-token').closest('notification').hide();
            }
        }
    });
}

$(document).on('click', '.notification .alert.alert-danger .close', function () {
    var token = $('#close-token').data('token');
    $.ajax({
        type: "POST",
        url: base_url + "dashboard/notifications/tokenSkeep",
        data: {token:token},
        dataType: "JSON",
        success: function(response) {}
    });
});

$(document).on('click', '.hide-on-load', function () {
    var self = $(this);
    self.hide('slow', function(){ self.remove(); });
});

/*-----------------------------------------------------------------------------------------------------------------------------------*/
$body = $('body');
$(document).on('click', '.view_booking_info', function () {
    $body.addClass("loading");
    var booking_id = $(this).data('id');
    var self = $(this);
    self.attr('disabled', true);
    self.removeClass('view_booking_info');
    var flag = self.data('flag');
    if(flag != '' && flag == 'new'){
        var data = {booking_id: booking_id};
    }else{
        var data = {booking_id: booking_id, profile:true};
    }
    $.ajax({
        url: base_url + 'dashboard/appointments/view_booking_info',
        type: 'post',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            if (response.error == false) {
                $('#view_booking_info_model').html(response.message);
                $('#view_booking_info_model').modal('show');
            }
            $body.removeClass("loading");
            self.addClass('view_booking_info');
            self.removeAttr('disabled');
        }
    });
});

$(document).on('click', '#accept_booking', function () {
    $body.addClass("loading");
    var booking_id = $(this).data('id');
    var self = $(this);
    self.attr('disabled', true);
    $.ajax({
        url: base_url + 'dashboard/appointments/accept_booking',
        type: 'post',
        dataType: 'JSON',
        data: {booking_id: booking_id},
        success: function (response) {
            if (response.error == false) {
                $('#view_booking_info_model').find('.booking_message').html(response.message);
                setTimeout(function () {
                    $('#view_booking_info_model').modal('hide');
                    window.location.reload(1);
                }, 1800);
            }
            $body.removeClass("loading");
            self.removeAttr('disabled');
        }
    });
});

$(document).on('click', '#reject_booking', function () {
    var booking_id = $(this).data('id');
    $('#booking_id').val(booking_id);
    $('#view_booking_info_model').modal('hide');
    $('#view_booking_info_model').empty();
    $('#reject_booking_model').modal('show');
});

$(document).on('click', '.cancel_booking', function () {
    var booking_id = $(this).data('id');
    $('#booking_id').val(booking_id);
    $('#view_booking_info_model').modal('hide');
    $('#view_booking_info_model').empty();
    $('#reject_booking_model').modal('show');
});

$('#reject_form').validate({
    highlight: function (element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    submitHandler: function (form) {
        $('#reject_form').find(':submit').attr('disabled', 'disabled');
        $.ajax({
            url: form.action,
            type: form.method,
            dataType: 'JSON',
            data: $(form).serialize(),
            success: function (response) {
                if (response.error == false) {
                    $('#reject_form')[0].reset();
                    setTimeout(function () {
                        $('#reject_booking_model').modal('hide');
                        window.location.reload(1);
                    }, 1800);
                }
                $('#reject_form').find('.message').html(response.message);
                $('#reject_form').find(':submit').removeAttr('disabled');
            }
        });
    }
});

$(document).on('click', '#view_profile', function () {
    var user_id = $(this).data('id');
    var booking_id = $(this).data('book');
    var self = $(this);
    self.attr('disabled', true);
    $.ajax({
        url: base_url + 'dashboard/appointments/view_profile_info',
        type: 'post',
        dataType: 'JSON',
        data: {booking_id: booking_id, user_id:user_id},
        success: function (response) {
            if (response.error == false) {
                $('#view_profile_info_model').html(response.message);
                $('#view_booking_info_model').modal('hide');
                $('#view_profile_info_model').modal('show');
            }
            self.removeAttr('disabled');
        }
    });
});

$(document).on('click', '#go_back', function () {
    var booking_id = $(this).data('id');
    var self = $(this);
    self.attr('disabled', true);
    $.ajax({
        url: base_url + 'dashboard/appointments/view_booking_info',
        type: 'post',
        dataType: 'JSON',
        data: {booking_id: booking_id},
        success: function (response) {
            if (response.error == false) {
                $('#view_booking_info_model').html(response.message);
                $('#view_booking_info_model').modal('show');
            }
            self.removeAttr('disabled');
        }
    });
});

$body = $("body");

$(document).on({
    ajaxStart: function () {
        $body.addClass("loading");
    },
    ajaxStop: function () {
        $body.removeClass("loading");
    }
});

$(document).on('click', '.drop-icon-bt', function () {
    $('.select2').focus();
    $('.select2-selection__rendered').trigger('click');
});
