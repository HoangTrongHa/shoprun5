@extends("fontend.layout")
@section("content")
    <!-- Add Cart Modal -->
        <div class="container">
            <ul class="checkout-progress-bar">
                <li class="active">
                    <span>Shipping</span>
                </li>
                <li>
                    <span>Review &amp; Payments</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-8 padding-right-lg">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Login to pay
                            </h2>
                            <form action="#">
                                <div class="form-group required-field">
                                    <label>Email Address </label>
                                    <div class="form-control-tooltip">
                                        <input type="email" class="form-control" required>
                                        <span class="input-tooltip" data-toggle="tooltip"
                                              title="We'll send your order confirmation here." data-placement="right"><i
                                                class="icon-question-circle"></i></span>
                                    </div><!-- End .form-control-tooltip -->
                                </div><!-- End .form-group -->

                                <div class="form-group required-field">
                                    <label>Password </label>
                                    <input type="password" class="form-control" required>
                                </div><!-- End .form-group -->
                                <p>You already have an account with us. Sign in or continue as guest.</p>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">LOGIN</button>
                                    <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                                    <a href="forgot-password.html" class="forget-pass"> Register</a>
                                </div><!-- End .form-footer -->
                            </form>
                        </li>
                    </ul>
                </div><!-- End .col-lg-8 -->
                <div class="col-lg-4">
                    <div class="order-summary">
                        <h3>Summary</h3>
                        <h4>
                            <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button"
                               aria-expanded="false" aria-controls="order-cart-section">There are
                                {{count($carts)}} products</a>
                        </h4>
                        <div class="collapse" id="order-cart-section">
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
                                <div>
                                    <h2>Total: ${{$total}}</h2>
                                </div>
                            </table>
                        </div><!-- End #order-cart-section -->
                    </div><!-- End .order-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->

@endsection
