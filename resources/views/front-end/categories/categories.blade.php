<!-- Displaying the current category -->
<li
    class="@if($hasChildren) {{'has-sub'}}@endif">
    <a href="@if(!$hasChildren && $category->parent_id != 0) {{route("front.$parent_slug.child",$category->slug)}}
    @else{{route("front.$category->slug")}} @endif"
       aria-current="page" class="nav-top-link">{{ $category->name}}</a>
    <!-- If category has children -->
    @if (count($category->allLevelChildrenWithSubChild) > 0)
        <ul class="list-unstyled">
            @foreach ($category->allLevelChildrenWithSubChild as $sub)
                @include('front-end.categories.categories', ['parent_slug' => $parent_slug,'category' => $sub,'hasChildren' => count($sub->allLevelChildrenWithSubChild) > 0 ? true : false])
            @endforeach
        </ul>
    @endif

</li>
