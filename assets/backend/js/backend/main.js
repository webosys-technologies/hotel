$(function () {

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
                $(this).summernote({height: 300});
            }
        });
    }

//    $('body').on('focus', '.input-group.date .form-control', function (event) {
//        $(this).datetimepicker({
//            format: "DD-MM-YYYY",
//            pickTime: false
//        });
//    });

    $('body').on('click', '.input-group.date .input-group-addon', function () {
        $(this).closest('.input-group.date').find('.form-control').trigger('focus');
    });


    $('.select_all').on("click", function () {
        $(this).select();
    });

    $(".check_all").on('click', function () {
        var target_class = $(this).data('target');
        $('.' + target_class).prop('checked', this.checked).change();
    });

    $('.fieldset .field').change(function () {
        if ($(this).val() != "") {
            $(this).addClass('filled');
        } else {
            $(this).removeClass('filled');
        }
    });
})

$(document).ready(function (e) {

    $('.open_fields_box .link').click(function () {
        //$(this).parent().addClass('active');
    });

    $('.file_field input').change(function () {
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
    });

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

    if ($('#video').length > 0) {
        $('#video').mediaelementplayer({
            plugins: ['flash', 'silverlight'],
            enablePluginSmoothing: false,
            // enabled pseudo-streaming (seek) on .mp4 files
            enablePseudoStreaming: false,
            // start query parameter sent to server for pseudo-streaming
            pseudoStreamingStartQueryParam: 'start',
            success: function (mediaElement, domObject) {
                if (mediaElement.pluginType == 'flash') {
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

    if ($('#address').length > 0) {
        $.ajax({
            url: '//maps.googleapis.com/maps/api/js?signed_in=false&v=3.exp&libraries=geometry&libraries=places&key=AIzaSyDllkLHRu7QzCUCHJhjqF4GK1F5GnxW4F4',
            dataType: 'script',
            cache: true,
            success: function () {
                initAutocomplete();
            }
        });
    }
    var retriction = false;//{componentRestrictions: {'country': 'in'}};

    function initAutocomplete() {
        if ($('#address').length > 0) {
            client_profile = document.getElementById('address');
            autocomplete_for_client_profile = new google.maps.places.Autocomplete(client_profile, retriction);
            google.maps.event.addListener(autocomplete_for_client_profile, 'place_changed', onPlaceChanged_client_profile);
        }
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
        $('input[name=city]').val(town + ', ' + location);
        $('input[name=state]').val(state);
        $('input[name=country]').val(country);
        $('input[name=postalcode]').val(postal_code);
        $('input[name=lat]').val(geolocation.lat);
        $('input[name=lon]').val(geolocation.lng);
    }

});



