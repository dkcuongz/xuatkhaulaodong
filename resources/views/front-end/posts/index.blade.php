@extends('layouts.frontend')

@section('title', 'Dự án')

@section('content_header')
    <h1 class="m-0 text-dark">Sản phẩm</h1>
@stop

@section('content')
    <div id="content" class="blog-wrapper blog-archive page-wrapper">
        <div class="row align-center">
            <div class="large-10 col">
                <div id="row-1983341037" class="row large-columns-3 medium-columns- small-columns-1 row-masonry">
                    @foreach($posts as $post)
                        <div class="col post-item">
                            <div class="col-inner">
                                <a href="{{route('front.san-pham.detail', [$post->category->slug ?? '', $post->id])}}" class="plain">
                                    <div class="box box-text-bottom box-blog-post has-hover">
                                        <div class="box-image">
                                            <div class="image-cover" style="padding-top:56%;">
                                                <img width="300" height="188"
                                                     src="../../../../wp-content/uploads/2022/07/3a-300x188.jpg"
                                                     class="attachment-medium size-medium wp-post-image" alt=""
                                                     loading="lazy"
                                                     srcset="https://noithatvnluxury.vn/wp-content/uploads/2022/07/3a-300x188.jpg 300w, https://noithatvnluxury.vn/wp-content/uploads/2022/07/3a-1024x640.jpg 1024w, https://noithatvnluxury.vn/wp-content/uploads/2022/07/3a-768x480.jpg 768w, https://noithatvnluxury.vn/wp-content/uploads/2022/07/3a-1536x960.jpg 1536w, https://noithatvnluxury.vn/wp-content/uploads/2022/07/3a-2048x1280.jpg 2048w"
                                                     sizes="(max-width: 300px) 100vw, 300px"/></div>
                                        </div>
                                        <div class="box-text text-center">
                                            <div class="box-text-inner blog-post-inner">


                                                <h5 class="post-title is-large ">Studio nhỏ xinh Nhật Bản- OASIS S2 căn
                                                    hộ
                                                    số 02</h5>
                                                <div class="is-divider"></div>
                                                <p class="from_the_blog_excerpt ">&nbsp; </p>


                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
