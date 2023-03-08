@extends('layouts.frontend')

@section('title', 'VNVHOME - Công ty thiết kế, thi công nội thất hàng đầu Việt Nam')
@section('content')
    @include('components.banner')
    @include('components.nav')
    @include('components.about-us')
    @include('components.people')
{{--    @include('components.carousel')--}}
    @include('components.box-why-choose')
    @include('components.box-product-featured')
    @include('components.box-space-option')
    <script type="text/javascript">
        if ($(window).width() > 767) {
            $('header').css('display', 'none');
        }
    </script>
@stop
