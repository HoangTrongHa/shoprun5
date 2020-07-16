@extends("fontend.layout")
@section("content")
<div class="page-wrapper">
    <main class="main">
        <div class="products-filter-container">
            <div class="product-slider-section">
                <div class="product-section-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                    <div class="product-section-slide">
                        <div class="slide-bg owl-lazy" data-src="{{asset("assets/images/product-section-slider/slidertr.jpg")}}"></div><!-- End .slide-bg -->
                        <div class="container-fluid product-slide-content">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-6 col-lg-5 offset-lg-7">
                                    <h3>TREADMILL</h3>
                                    <a href="{{url("/details/5")}}" class="btn btn-white">Shop Now</a>
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-slide-content -->
                    </div><!-- .product-section-slide -->
                </div><!-- End .product-section-slider -->
            </div><!-- End .product-slider-section -->
        </div><!-- End .produts-filter-container-->
        <div class="product-slider-section">
            <div class="product-section-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                <div class="product-section-slide">
                    <div class="slide-bg owl-lazy" data-src="assets/images/product-section-slider/slide-1.jpg"></div><!-- End .slide-bg -->
                    <div class="container-fluid product-slide-content">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-6 col-lg-5 offset-lg-7">
                                <h3>Shoes</h3>
                                <img src="{{asset("assets/images/product-section-slider/img-1.png")}}" alt="img">
                                <a href="{{url("/details/6")}}" class="btn btn-white">Shop Now</a>
                            </div>
                        </div><!-- End .row -->
                    </div><!-- End .product-slide-content -->
                </div><!-- .product-section-slide -->
            </div><!-- End .product-section-slider -->
        </div><!-- End .product-slider-section -->
        <div class="products-filter-container">
            <div class="product-slider-section">
                <div class="product-section-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                    <div class="product-section-slide">
                        <div class="slide-bg owl-lazy" data-src="{{asset("images/nenwomen.jpg")}}"></div><!-- End .slide-bg -->
                        <div class="container-fluid product-slide-content">
                            <div class="row">
                                <div class="col-sm-6 offset-sm-6 col-lg-5 offset-lg-7">
                                    <h3>WOMEN'S SPORTSWEAR</h3>
                                    <a href="{{url("/details/7")}}" class="btn btn-white">Shop Now</a>
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-slide-content -->
                    </div><!-- .product-section-slide -->
                </div><!-- End .product-section-slider -->
            </div><!-- End .product-slider-section -->
        </div><!-- End .produts-filter-container-->
        <div class="products-filter-container">
            <div class="product-slider-section">
                <div class="product-section-slider owl-carousel owl-carousel-lazy owl-theme owl-theme-light">
                    <div class="product-section-slide">
                        <div class="slide-bg owl-lazy" data-src="{{asset("images/nenmen.jpg")}}"></div><!-- End .slide-bg -->
                        <div class="container-fluid product-slide-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 style="color: black">MEN'S SPORTSWEAR</h3>
                                    <a href="{{url("/details/8")}}" class="btn btn-outline-dark">Shop Now</a>
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-slide-content -->
                    </div><!-- .product-section-slide -->
                </div><!-- End .product-section-slider -->
            </div><!-- End .product-slider-section -->
        </div><!-- End .produts-filter-container-->
    </main><!-- End .main -->
</div>
@include("components.mobile_menu_container")
{{--@include("components.newsletter")--}}
@endsection
<style>
    .abcde{
        transition: transform .2s; /* Animation */
    }
    .abcde:hover{
        transform: scale(1.2);
    }
    button:hover{
        background-color: wheat;

    }
</style>
