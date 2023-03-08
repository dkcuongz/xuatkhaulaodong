<section id="slideshow">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul class="list-unstyled">
                @foreach($banners as $key => $banner)
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1000"
                        data-thumb="{{asset($banner->image->path)}}">
                        <img src="{{asset($banner->image->path)}}" alt="Trách nhiệm - Trung thực - Tận tâm"
                             title="Trách nhiệm - Trung thực - Tận tâm"
                             data-lazyload="{{asset('images-UI/banner-1.jpg')}}" data-bgposition="left top"
                             data-bgfit="cover" data-bgrepeat="no-repeat">
                        <span class="slider-overlay hidden-xs"></span>
                        <div class="caption lft ltb slide-title hidden-xs" data-x="center" data-y="center"
                             data-voffset="-50" data-speed="1000" data-start="1900"
                             data-easing="easeOutBack">{{$banner->title}}
                        </div>
                        <div class="caption lfr ltl slide-description hidden-xs" data-x="center" data-y="center"
                             data-speed="1000" data-start="2200" data-easing="easeOutBack"><span
                                class="border"></span><span>{{$banner->description}}</span><span
                                class="border"></span></div>
                        <div class="caption lfb ltt slide-link hidden-xs" data-x="center" data-y="center"
                             data-voffset="50" data-speed="1000" data-start="2400" data-easing="easeOutBack">
                            <a href="{{$banner->url}}" class="slide-read-more"
                               title="Trách nhiệm - Trung thực - Tận tâm">Xem sản phẩm</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        jQuery('.tp-banner').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 1600,
            startheight: 800,

            hideThumbs: 200,
            thumbWidth: 50,
            thumbHeight: 40,
            thumbAmount: 2,

            navigationType: 'bullet',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'off',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'none',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'off',
            forceFullWidth: 'off',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    </script>
</section>
