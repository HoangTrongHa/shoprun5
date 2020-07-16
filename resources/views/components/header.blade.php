<header class="header">
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <a href="{{"/"}}" class="logo">
                    <img src="{{asset("assets/images/logo.png")}}" alt="Porto Logo">
                </a>
            </div>
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a class="sf-with-ul">Shop</a>
                            <ul>
                                @foreach($ca as $value)
                                    <li><a href="{{url("/details/". (string) $value->id)}}">{{$value->cate_name}}</a></li>
                                    @endforeach
                                    </li>
                            </ul>
                        </li>
                        <li><a href="{{route("admin.logout")}}">My account</a></li>
                        <li><a href="{{"/contact"}}">Contact</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                    </ul>
                </nav>
                <div class="header-right">
                    <button class="mobile-menu-toggler" type="button">
                        <i class="icon-menu"></i>
                    </button>
                    <div class="dropdown cart-dropdown">
                        <a href="{{route("show")}}" class="dropdown-toggle" role="button">
{{--                            <span class="cart-count">2</span>--}}
                        </a>
                    </div><!-- End .dropdown -->
                </div><!-- End .header-right -->            </div><!-- End .dropdown -->
            </div><!-- End .header-center -->
        </div><!-- End .container-fluid -->    </div><!-- End .header-middle -->
</header><!-- End .header -->
