<section class="box box-product-featured">
    <div class="container">
        <h2 class="box-title text-center wow fadeInUp animated mb-35"><span>Sản phẩm Thiết kế</span></h2>
        <div class="box-info">
            <div class="owl-carousel owl-theme">
                @foreach($posts as $post)
                    <div class="item wow fadeInUp animated">
                        <div class="img">
                            <a href="{{route('front.san-pham.detail',[$post->category->slug ?? '', $post->id])}}"
                               title="{{$post->title}}" class="overlay"></a>
                            <img
                                src="{{asset($post->images->first()->path)}}"
                                alt="{{$post->title}}" class="center-block img-responsive">
                            <div class="info">
                                <a href="{{route('front.san-pham.child',$post->category->slug ?? '')}}"
                                   title="{{$post->category->name ?? ''}}">{{$post->category->name ?? ''}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
                const jobs = @json(count($posts) ?? 0);
                $(document).ready(function () {
                    $(".box-product-featured .owl-carousel").owlCarousel({
                        items: 5,
                        loop: true,
                        nav: false,
                        navText: ['<img src="{{asset('images-UI/ar_left.png')}}">', '<img src="{{asset('images-UI/ar_right.png')}}">'],
                        dots: true,
                        dotsEach: true,
                        autoplay: true,
                        margin: jobs,
                        autoplayTimeout: 5000,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 4
                            },
                            768: {
                                items: 5
                            }
                        }
                    });
                });
            </script>
        </div>
    </div>
</section>
