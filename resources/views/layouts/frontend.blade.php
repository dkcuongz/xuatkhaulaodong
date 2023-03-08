<!DOCTYPE html>
<!--[if IE 8 ]>
<html dir="ltr" lang="vi" class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html dir="ltr" lang="vi" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="vi">
<!--<![endif]-->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <base/>
    <link href="{{asset('asset/javascript/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{asset('css/common.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{asset('asset/javascript/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('asset/javascript/jquery/owlcarousel/dist/assets/owl.carousel.min.css')}}" type="text/css"
          rel="stylesheet" media="screen"/>
    <link href="{{asset('asset/javascript/jquery/owlcarousel/dist/assets/owl.theme.default.min.css')}}" type="text/css"
          rel="stylesheet" media="screen"/>
    <link href="{{asset('home/js/rs-plugin/css/settings.css')}}" type="text/css" rel="stylesheet" media="screen"/>
    <link href="{{asset('upload/image/data/website/logo-d3f.png?v=2')}}" rel="shortcut icon"/>
    <link href="{{asset('home/stylesheet/animate.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('home/stylesheet/stylesheet.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('asset/javascript/jquery/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/javascript/jquery/owlcarousel/dist/owl.carousel.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('home/js/rs-plugin/js/jquery.themepunch.tools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/javascript/common.js')}}" type="text/javascript"></script>
    <script src="{{asset('home/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('asset/javascript/common.js')}}" type="text/javascript"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="{{asset('javascript/common.js')}}" type="text/javascript"></script>
    <![endif]-->
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '399062927649701',
                cookie: true,
                xfbml: true,
                version: 'v5.0'
            });

            FB.AppEvents.logPageView();

        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PQTX2J4');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQTX2J4"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <head>
        <meta name="facebook-domain-verification" content="nhmzdsjy4y5k6bbyhqnnpbkh8bxn25"/>
        <head>

            <!-- Meta Pixel Code -->
            <script>
                !function (f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function () {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '1684120121963543');
                fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none"
                           src="https://www.facebook.com/tr?id=1684120121963543&amp;ev=PageView&amp;noscript=1"
                /></noscript>
            <!-- End Meta Pixel Code -->
            <!--Nút Chat Facebook Trực Tiếp -->
            <div class="fb-livechat" style="display: block;">
                <div class="ctrlq fb-overlay">
                </div>
                <div class="fb-widget">
                    <div class="ctrlq fb-close">
                    </div>
                    <div class="fb-page fb_iframe_widget"
                         data-href="https://www.facebook.com/xhomeVietnam"
                         data-tabs="messages"
                         data-width="360"
                         data-height="400"
                         data-small-header="true"
                         data-hide-cover="true"
                         data-show-facepile="false"
                         fb-xfbml-state="rendered"
                         fb-iframe-plugin-query="app_id=&amp;
    container_width=0&amp;
    height=400&amp;
    hide_cover=true&amp;
    locale=en_US&amp;sdk=joey&amp;
    show_facepile=false&amp;
    small_header=true&amp;
    tabs=messages&amp;
    width=360">
        <span style="vertical-align: bottom; width: 360px; height: 0px;">
        <iframe name="f1f791959cc8758"
                width="360px"
                height="400px"
                title="fb:page Facebook Social Plugin"
                frameborder="0"
                allowtransparency="true"
                allowfullscreen="true"
                scrolling="no"
                allow="encrypted-media"
                src="https://www.facebook.com/v2.9/plugins/page.php?app_id=&amp;%20%20%20%20%20%20%20%20%20%20%20%20container_width=0&amp;%20%20%20%20%20%20%20%20%20%20%20%20height=400&amp;%20%20%20%20%20%20%20%20%20%20%20%20hide_cover=true&amp;%20%20%20%20%20%20%20%20%20%20%20%20locale=en_US&amp;%20%20%20%20%20%20%20%20%20%20%20%20sdk=joey&amp;%20%20%20%20%20%20%20%20%20%20%20%20show_facepile=false&amp;%20%20%20%20%20%20%20%20%20%20%20%20small_header=true&amp;%20%20%20%20%20%20%20%20%20%20%20%20tabs=messages&amp;%20%20%20%20%20%20%20%20%20%20%20%20width=360"
                style="border: none;
            visibility: visible;
            width: 360px;
            height: 0px;
            opacity: 1;
            " class="">
        </iframe>
        </span>
                    </div>
                    <div class="fb-credit">
                    </div>
                    <div id="fb-root"
                         class=" fb_reset">
                        <div style="position: absolute;
                top: -10000px;
                width: 0px;
                height: 0px;">
                            <div>
                                <iframe
                                    name="fb_xdm_frame_https"
                                    id="fb_xdm_frame_https"
                                    aria-hidden="true"
                                    title="Facebook Cross Domain Communication Frame"
                                    tabindex="-1"
                                    frameborder="0"
                                    allowtransparency="true"
                                    allowfullscreen="true"
                                    scrolling="no"
                                    allow="encrypted-media"
                                    src="https://staticxx.facebook.com/connect/xd_arbiter.php?version=44#channel=fcd083b3c0bbc8&amp;"
                                    style="border: none; opacity: 1;">
                                </iframe>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="https://m.me/xhomeVietnam"
                   title="Gửi tin nhắn cho chúng tôi qua Facebook"
                   class="ctrlq fb-button">
                    <div class="bubble">1</div>
                    <div class="bubble-msg">XHOME có thể giúp gì cho bạn?</div>
                </a>
            </div>
            <!--End Nút Chat -->
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61304090-2"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());

                gtag('config', 'UA-61304090-2');
            </script>
            <meta name="google-site-verification" content="FdjaqsLBOgGtUQfemAeZSuGwKHPwHGfwpHan8nJLqz4"/>
        </head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MB7STD9"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    @include('components.header')
</header>
@yield('content')
@include('components.footer')
<script type="text/javascript">
    $('.menu-mobile').on('click', function (e) {
        $('.main-nav').slideToggle(100);
    });
    var current_url = window.location.href;
    $('.main-nav li a[href$="' + current_url + '"]').addClass('active');
    $('.main-nav li a[href$="' + current_url + '"]').parent().parent().parent('.has-sub').find('a').addClass('active');
    wow = new WOW({boxClass: 'wow', animateClass: 'animated', offset: 0, mobile: false, live: true});
    wow.init();
</script>
<script src="{{asset('asset/javascript/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('home/js/wow.min.js" type="text/javascript')}}t"></script>
</body>
</html>
