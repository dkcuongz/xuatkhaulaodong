<section class="box box-space-option">
    <div class="container">
        <h2 class="box-title text-center wow fadeInUp animated mb-35"><span>Hệ thống XHOME</span></h2>
        <div class="box-info">
            <div class="owl-carousel owl-theme">
                @foreach($systems as $system)
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="{{route('front.he-thong-vn-vhome.detail',$system->id)}}" title="{{$system->title}}"
                               class="overlay"></a>
                            <img
                                src="{{asset($system->image->path)}}"
                                alt="{{$system->title}}" class="center-block img-responsive">
                            <div class="info">
                                <a href="{{route('front.he-thong-vn-vhome.detail',$system->id)}}"
                                   title="{{$system->title}}">{{$system->title}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
                $(document).ready(function () {
                    $(".box-space-option .owl-carousel").owlCarousel({
                        items: 4,
                        loop: true,
                        nav: true,
                        navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                        dots: false,
                        dotsEach: true,
                        autoplay: true,
                        margin: 10,
                        autoplayTimeout: 5000,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 3
                            },
                            768: {
                                items: 4
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</section>
