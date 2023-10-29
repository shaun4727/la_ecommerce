@php

$tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();

$tags = array();
foreach($tags_en as $tag){
    $sp_tag = explode(",",$tag->product_tags_en);

    foreach($sp_tag as $stag){
        if(!in_array($stag,$tags)){
            array_push($tags,$stag);
        }
    }


}


@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list">
        @foreach($tags as $tag)
        <a class="item" title="Phone" href="{{ url('product/details/'.$tag) }}">{{ $tag }}</a>
        @endforeach
        {{-- <a class="item active" title="Vest" href="category.html">Vest</a> --}}
    </div>
      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
