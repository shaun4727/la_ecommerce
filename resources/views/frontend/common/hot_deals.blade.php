<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($products as $product)
        @if($product->hot_deals == 1)

        @php
            $review = App\Models\Review::groupBy('product_id')
                    ->select('product_id',DB::raw('AVG(rating) as rating'))
                    ->where('product_id',$product->id)
                    ->first();

            if(isset($review)){
                $rating = intval($review->rating);
            }else{
                $rating = 0;
            }
        @endphp
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image"> <img src="{{ asset($product->product_thumbnail) }}" alt=""> </div>
            @php
                $amount = $product->selling_price - $product->discount_price;
                $percentage = ($amount/$product->selling_price)*100;
            @endphp
            <div class="sale-offer-tag"><span>{{ round($percentage) }}%<br>
              off</span></div>
            {{-- <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
              </div>
            </div> --}}
          </div>
          <!-- /.hot-deal-wrapper -->

          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">{{ $product->product_name_en }}</a></h3>
            <div class="">
                @for($i=0; $i<5; $i++)
                    <i class="fa-solid fa fa-star"></i>
                @endfor
            </div>
            <div class="" style="position: relative; top:-18.5px;">
                @for($i=0; $i<$rating; $i++)
                    <i class="fa-solid fa fa-star" style="color:yellow;"></i>
                @endfor
            </div>
            <div class="product-price">
                @if($product->discount_price != NULL)
                <span class="price"> ${{ $product->discount_price }} </span>
                <span class="price-before-discount">${{ $product->selling_price }}</span>
                @else
                @endif
            </div>
            <!-- /.product-price -->

          </div>
          <!-- /.product-info -->

          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </div>
            </div>
            <!-- /.action -->
          </div>
          <!-- /.cart -->
        </div>
      </div>
      @endif
      @endforeach



    </div>
    <!-- /.sidebar-widget -->
  </div>
