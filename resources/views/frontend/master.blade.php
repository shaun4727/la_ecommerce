<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <style>
        .modal-header {
            min-height: 16.43px;
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
            display: flex;
            justify-content: space-between;
        }

        .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            width: 800px;
            /* left: 0px!important; */
            position: absolute;
            left: -85px;
        }
    </style>

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" type="text/css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->


    <!-- ============================================== HEADER : END ============================================== -->

    @include('frontend.body.header')
    @yield('content')
    <!-- /#top-banner-and-menu -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER ============================================================= -->

    <!-- ============================================================= FOOTER : END============================================================= -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="..." style="width:200px;"
                                    id="pimage">

                            </div>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span
                                            id="pprice"></span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red; color: white;"></span>
                                </li>
                            </ul>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1"
                                    min="1">
                            </div>

                        </div><!-- // end col md -->
                        <input type="hidden" name="" id="product_id">

                    </div> <!-- // end row -->
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        // Start frontend modal
        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $('#qty').val(1);
                    $('#product_id').val(id);

                    // Product Price
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    } // end prodcut price
                    // Start Stock opiton
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('available');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option

                    // color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                    }) // end color
                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size
                }
            })

        }

        // end frontend modal



        // start add to cart

        function addToCart() {
            let product_name = $('#pname').text();
            let id = $('#product_id').val();
            let color = $('#color option:selected').text();
            let size = $('#size option:selected').text();
            let quantity = $('#qty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    $('#closeModal').click();
                    console.log(data);
                    miniCart();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }

        // end add to cart

        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('span[id="cartSubTotal-f"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);


                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price}</div>
                    </div>
                    <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }

        miniCart();

        /// mini cart remove Start
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        //  end mini cart remove

        //  wish list start

        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }

        // wish list end


        // start loading wishlist data

        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {
                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thumbnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                        <div class="price">
                        ${value.product.discount_price == null
                            ? `${value.product.selling_price}`
                            :
                            `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                        }

                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                    });

                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();
        // end loading wishlist data



        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {
                    if(response.carts?.length == 0){
                        $('#couponCalField').html('');
                        $('#applied_coupon').html('');
                    }
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
                    <td class="col-md-2"><img src="/${value.options.image} " alt="img" style="width:60px;"></td>

                    <td class="col-md-2">
                        <div class="product-name"><a href="#">${value.name}</a></div>

                        <div class="price">
                            ${value.price}
                        </div>
                    </td>
                    <td class="col-md-2">
                        <strong>${value.options.color} </strong>
                        </td>
                    <td class="col-md-2">
                    ${value.options.size == null
                        ? `<span> .... </span>`
                        :
                    `<strong>${value.options.size} </strong>`
                    }
                        </td>
                    <td class="col-md-2">
                        <button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>
                            <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >
                            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>
                        </td>
                        <td class="col-md-2">
                        <strong>$${value.subtotal} </strong>
                        </td>

                    <td class="col-md-1 close-btn">
                        <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                    </td>
                            </tr>`
                    });

                    $('#cartPage').html(rows);
                }
            })
        }
        cart();



        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    cart();
                    miniCart();
                    couponCalculation();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }



        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    couponCalculation();
                }
            });
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    couponCalculation();
                }
            });
        }


        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalculation();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                }
            })
        }

        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$ ${data.total}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">$ ${data.total}</span>
                                        </div>
                                    </th>
                                </tr>`
                        )
                    } else {
                        $('#applied_coupon').html(
                            `<thead>
                                    <tr>
                                        <th>
                                            <p>Applied Coupon..</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <p>${data.coupon_name} <button type="submit" class="btn-upper btn btn-primary" onclick="couponRemove()" ><i class="fa fa-times"></i></button></p>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>`
                        )
                        $('#couponCalField').html(
                            `<tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                                        </div>
                                        <div class="cart-sub-total">
                                            Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                                        </div>
                                    </th>
                                </tr>`
                        )
                    }
                }
            })
        }
        couponCalculation();



        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    $('#applied_coupon').html(
                            `<thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input" id="coupon_name" placeholder="You Coupon..">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>`
                        )
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message

                }
            });
        }


    </script>

    <script>
        const checkout = Swal.mixin({

            showConfirmButton: true,
        })

        @if(Session::has('checkout'))
        checkout.fire({
            type: '{{ Session::get('alertType') }}',
            icon: '{{ Session::get('alertType') }}',
            title: '{{ Session::get('checkout') }}'
        })
        @else
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',

            showConfirmButton: false,
            timer: 3000
        })
            Toast.fire({
                type: 'success',
                icon: '{{ Session::get('alertType') }}',
                title: '{{ Session::get('message') }}'
            })
        @endif

    </script>


</body>

</html>
