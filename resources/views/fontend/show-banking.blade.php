@extends("fontend.layout")
@section("content")
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chekout</li>
                </ol>
            </div><!-- End .container-fluid -->
        </nav>
        <div class="page-header">
            <div class="container">
                <h1>Checkout</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="container">
            <ul class="checkout-progress-bar">
                <li>
                    <span>Shipping</span>
                </li>
                <li class="active">
                    <span>Review &amp; Payments</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>Summary</h3>
                        @php
                            $total = 0;
                        @endphp
                        <table class="table table-mini-cart">
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($carts as $cartItem)
                                @php
                                    $total += $cartItem["price"] * $cartItem["qty"];
                                @endphp
                                <tr>
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset($cartItem["image"])}}" alt="product">
                                            </a>
                                        </figure>
                                        <div>
                                            <h5 class="product-title">
                                                <a href="product.html">{{$cartItem["name"]}}</a>
                                            </h5>
                                            <span class="product-qty">{{$cartItem["qty"]}}</span>
                                        </div>

                                    </td>
                                    <td class="price-col">${{$cartItem["price"] * $cartItem["qty"]}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                        <div>
                            <h2>Total: ${{$total}}</h2>
                        </div>
                        <table class="table table-totals">
                            <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>${{$total}}</td>
                            </tr>

                            <tr>
                                <td>Tax</td>
                                <td>$15</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            @php
                                $order = 0;
                                $order = $total + 15
                            @endphp
                            <tr>
                                <td>Order Total</td>
                                <td>${{$order}}</td>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{route("banking")}}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                            <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
                        </div><!-- End .checkout-methods -->
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->
                <div class="col-lg-8 order-lg-first padding-right-lg">
                    <div class="checkout-payment">
                        <h2 class="step-title">Payment Method:</h2>

                        <h4>Check / Money order</h4>

                        <div class="form-group-custom-control">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="change-bill-address" value="1">
                                <label class="custom-control-label" for="change-bill-address">My billing and shipping address are the same</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .form-group -->
                        <div id="new-checkout-address" class="show">
                            <form action="{{route("saveshipping")}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group required-field">
                                    <label>Full Name</label>
                                    <input type="text" name="shipping_name" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Your Phone </label>
                                    <input type="text" name="shipping_phone" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Company </label>
                                    <input type="text" name="shipping_company" class="form-control">
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Street Address </label>
                                    <input type="text"name="shipping_address" class="form-control" required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text"name="shipping_Country" class="form-control" required>

                                    {{--                                    <div class="select-custom">--}}
{{--                                        <select class="form-control">--}}
{{--                                            <option value="USA">United States</option>--}}
{{--                                            <option value="Turkey">Turkey</option>--}}
{{--                                            <option value="China">China</option>--}}
{{--                                            <option value="Germany">Germany</option>--}}
{{--                                        </select>--}}
{{--                                    </div><!-- End .select-custom -->--}}
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Phone Number </label>
                                    <div class="form-control-tooltip">
                                        <input type="tel"name="shipping_phone" class="form-control" required>
                                        <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Shipping Notes </label>
                                    <div class="form-control-tooltip">
                                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->

                                <div class="form-group-custom-control">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="address-save">
                                        <label class="custom-control-label" for="address-save">Save in Address book</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <div class="form-control-tooltip">
                                        <input type="submit" value="send" name="send_order" class="btn btn-primary btn-sm" >
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->

                            </form>
                        </div><!-- End #new-checkout-address -->

                        <div class="clearfix">
                            <a href="#" class="btn btn-primary float-right">Place Order</a>
                        </div><!-- End .clearfix -->
                    </div><!-- End .checkout-payment -->

                    <div class="checkout-discount">
                        <h4>
                            <a data-toggle="collapse" href="#checkout-discount-section" class="collapsed" role="button" aria-expanded="false" aria-controls="checkout-discount-section">Apply Discount Code</a>
                        </h4>

                        <div class="collapse" id="checkout-discount-section">
                            <form action="#">
                                <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                                <button class="btn btn-sm btn-outline-secondary" type="submit">Apply Discount</button>
                            </form>
                        </div><!-- End .collapse -->
                    </div><!-- End .checkout-discount -->
                </div><!-- End .col-lg-8 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->

@endsection
