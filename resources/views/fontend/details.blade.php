@extends("fontend.layout")
@section("content")
    <div class="page-wrapper">
        <main class="main">
            <div class="banner banner-cat mb-0" style="background-image: url('assets/images/bg-2.jpg');">
                <div class="banner-content container-fluid">
                    <h1 class="banner-title">
                        Explore the best of you
                    </h1>
                    <a href="#" class="btn-sm btn-white">Shop Now</a>
                </div><!-- End .banner-content -->
            </div><!-- End .banner -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                    </ol>
                </div><!-- End .container-fluid -->
            </nav>
            <div class="container-fluid">
                <nav class="toolbox horizontal-filter">
                    <div class="toolbox-left">
                        <div class="filter-toggle">
                            <span>Filters:</span>
                            <a href=#>&nbsp;</a>
                        </div>
                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>

                        <div class="select-custom">
                            <select name="orderby" class="form-control">
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div><!-- End .select-custom -->

                        <a href="#" class="sorter-btn" title="Set Ascending Direction"><span class="sr-only">Set Ascending Direction</span></a>
                    </div><!-- End .toolbox-item -->

                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div><!-- End .select-custom -->
                    </div><!-- End .toolbox-item -->

                    <div class="layout-modes">
                        <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div><!-- End .layout-modes -->
                </nav>

                <div class="row products-body">
                    <div class="col-lg-9 col-xl-10 main-content">
                        <div class="row row-sm">
                            @foreach($products as $value)
                                <div class="col-6 col-md-4 col-xl-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="product.html">
                                                <img src="{{$value->getAvatar()}}">
                                            </a>
                                            <div class="btn-icon-group">
                                                {{--                                            <a href="{{route("addTocart",["id" => $value->id])}}"class="btn-icon btn-add-cart"><i class="icon-bag"></i></a>--}}
                                                <a class="btn-icon add-to-cart"
                                                   data-url="{{route("addTocart",["id" => $value->id])}}"><i
                                                        class="icon-bag"></i>{{count($products)}}</a>
                                            </div>
                                            <a href="/prodesc/{{$value->id}}" class="btn" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details align-items-center">
                                            <h2 class="product-title">
                                                <a href="product.html">{{$value->pro_name}}</a>
                                            </h2>
                                            <div class="price-box">
                                                <span class="product-price">{{$value->price}}</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <ul class="pagination">
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->
                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 col-xl-2 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                       aria-controls="widget-body-2">Men</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li><a href="#">Accessories</a></li>
                                            <li><a href="#">Watch Fashion</a></li>
                                            <li><a href="#">Tees, Knits & Polos</a></li>
                                            <li><a href="#">Pants & Denim</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                       aria-controls="widget-body-3">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .price-slider-wrapper -->

                                            <div class="filter-price-action">
                                                <button type="submit" class="btn btn-primary">Filter</button>

                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                </div><!-- End .filter-price-text -->
                                            </div><!-- End .filter-price-action -->
                                        </form>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
                                       aria-controls="widget-body-4">Size</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li><a href="#">Small</a></li>
                                            <li><a href="#">Medium</a></li>
                                            <li><a href="#">Large</a></li>
                                            <li><a href="#">Extra Large</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                       aria-controls="widget-body-5">Brand</a>
                                </h3>

                                <div class="collapse show" id="widget-body-5">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li><a href="#">Adidas</a></li>
                                            <li><a href="#">Calvin Klein (26)</a></li>
                                            <li><a href="#">Diesel (3)</a></li>
                                            <li><a href="#">Lacoste (8)</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-6" role="button" aria-expanded="true"
                                       aria-controls="widget-body-6">Color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-6">
                                    <div class="widget-body">
                                        <ul class="config-swatch-list">
                                            <li class="active">
                                                <a href="#" style="background-color: #1645f3;"></a>
                                                <span>Blue</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #f11010;"></a>
                                                <span>Red</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #fe8504;"></a>
                                                <span>Orange</span>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #2da819;"></a>
                                                <span>Green</span>
                                            </li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->

            <div class="mb-3"></div><!-- margin -->
        </main>
    </div>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        // $('add-to-cart').on('click', myFunction());
        $('.add-to-cart').click(function (event) {
            var urlCart = $(this).attr('data-url');
            alert(urlCart)
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: "json",
                success: function (data) {
                    if (data.code === 200) {
                        alert("Add Product Successfully. Please Check Your Cart And Checkout")
                    }
                    console.log(data)
                }, error: function () {

                }
            })
        });
    </script>

@endsection
