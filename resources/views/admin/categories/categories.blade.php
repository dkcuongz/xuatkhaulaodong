<!-- Displaying the current category -->
<option
    value="{{ $category->id }}" @if(isset($selected) && $category->id == $selected) {{'selected'}} @endif>{{ $level }}{{ $category->name}}</option>
<!-- If category has children -->
@if (count($category->allLevelChildren) > 0)
    @foreach ($category->allLevelChildren as $sub)
        <!-- Call this blade file again (recursive) and pass the current subcategory to it -->
        @include('admin.categories.categories', ['parent_id' => $parent_id,'category' => $sub,'hasChildren' => true, $level.=' -- '])
    @endforeach
@endif

