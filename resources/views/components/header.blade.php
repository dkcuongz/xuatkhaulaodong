<div class="header-top">
    <div class="container">
        <div class="pull-left logo-header">
            <a href="/" title="VNVHOME Việt Nam">
                <img src="{{asset('images-UI/logo.png')}}"
                     title="VNVHOME Việt Nam" alt="VNVHOME Việt Nam"
                     class="img-responsive img-fix center-block"/>
            </a>
        </div>
        <a class="menu-mobile visible-xs" href="javascript:void(0);"><i class="fa fa-bars"></i><span>MENU</span></a>
        <ul class="list-unstyled main-nav pull-right">
            @foreach ($categories as $subcategory)
                @include('front-end.categories.categories', ['parent_slug'=>$subcategory->slug,'category' => $subcategory, 'hasChildren' => count($subcategory->allLevelChildrenWithSubChild) > 0 ? true : false])
            @endforeach
            <li class="registration-menu">
                <a href="{{route('front.dang-ky-tu-van')}}" title="Đăng ký tư vấn">Đăng ký tư vấn</a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
</header>
