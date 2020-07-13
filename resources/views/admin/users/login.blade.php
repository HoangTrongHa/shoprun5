@extends("admin.users.layout")
@section("content")
    <div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="{{url("backend")}}/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            @if(session('success'))
                <div class="header">
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="header">
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                </div>
            @endif
            <form action="{{route("admin.post.login")}}" method="POST">
                @csrf
                @method("POST")
                <div class="form-group">
                    <input class="form-control form-control-lg" name="email" id="username" type="email" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{route("admin.register")}}" class="footer-link">Create An Account</a></div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{route("admin.form-reset-pas")}}" class="footer-link">Forgot Password</a>
            </div>
        </div>
    </div>
    </div>
@endsection
