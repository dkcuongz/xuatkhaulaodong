<section class="box box-people">
    <div class="container">
        <h2 class="box-title text-center wow fadeInUp animated mb-35"><span>Con người XHOME</span></h2>
        <div class="box-info">
            <div class="owl-carousel owl-theme">
                @foreach($peoples as $people)
                <div class="item wow fadeInUp animated">
                    <div class="img">
                        <img src="{{asset($people->image->path)}}" alt="{{$people->title}}" class="center-block">
                    </div>
                    <div class="info">
                       {{$people->description}}
                    </div>
                </div>
                @endforeach
            </div>
            <script>
                $(document).ready(function () {
                    $(".box-people .owl-carousel").owlCarousel({
                        items: 1,
                        loop: true,
                        nav: false,
                        navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                        dots: true,
                        dotsEach: true,
                        autoplay: true,
                        margin: 0,
                        autoplayTimeout: 5000,
                    });
                });
            </script>
        </div>
    </div>
</section>
