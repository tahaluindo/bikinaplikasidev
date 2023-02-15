<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/asp-studio/page_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 03:57:28 GMT -->
<head>
    <meta charset="utf-8"/>
    <title>AspStudio | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <link href="assets/css/app.min.css" rel="stylesheet"/>

</head>
<body>

<div id="app" class="app app-full-height app-without-header">

    <div class="login">

        <div class="login-content">
            @if(session()->has("error"))
                    <div class="alert alert-danger text-white" role="alert"
                         style='text-align: center; color: red; weight: bolder; '>
                        {{ session()->get("error") }}
                    </div>
                @endif
            
            <form method="POST" action="{{ route('login_manual') }}" name="login_form">
                <h1 class="text-center">Sign In</h1>
                <div class="text-muted text-center mb-4">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-lg fs-15px" name="email"
                           placeholder="example@example.com"/>
                </div>
                <div class="form-group">
                    <div class="d-flex">
                        <label>Password</label>
                    </div>
                    <input type="password" class="form-control form-control-lg fs-15px" name="password"
                           placeholder="Enter your password"/>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" value="" id="customCheck1"/>
                        <label class="custom-control-label fw-500" for="customCheck1">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Sign In</button>
                
            </form>
        </div>

    </div>


    <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

</div>

</body>
</html>