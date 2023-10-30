<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">

        @foreach($categories as $category)
        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>{{ $category->category_name_en }}</a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                @php
                    $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                @endphp

                @foreach($subcategories as $subcategory)
                <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">
                    <h2 class="title">{{ $subcategory->subcategory_name_en }}</h2>
                </a>
                @php
                    $childSubCategories = App\Models\ChildSubCategory::where('subcategory_id',$subcategory->id)->orderBy('childCategory_name_en','ASC')->get();
                @endphp

                <ul class="links">
                    @foreach($childSubCategories as $childCategory)
                    <li><a href="{{ url('child_subcategory/product/'.$childCategory->id.'/'.$childCategory->childCategory_slug_en) }}">{{ $childCategory->childCategory_name_en }}</a></li>
                    @endforeach
                </ul>
                </div>
                @endforeach
              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          @endforeach
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->

        <!-- /.menu-item -->

      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
