<!DOCTYPE html>
<html lang="fa" dir="ltr">
    <head>

        <meta charset="utf-8" />
        <title>ورود</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app.min.css') }} " rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }} " rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-0">
                <div class="row align-items-center g-0">
                    
         

                    <div class="col-xl-7">
                        <div class="account-page-bg p-md-5 p-4">
                            <div class="text-center">
                                <h3 class="text-dark mb-3 pera-title">اندر دل بی وفا غــم و ماتم باد

آن را که وفا نیست ز عالم کم باد

دیدی که مـرا هیچ کسی یاد نکرد

جز غـم که هزار آفرین بر غم باد</h3>
                                <div class="auth-image">
                                    <img src=" {{ asset('backend/assets/images/authentication.svg') }}" class="mx-auto img-fluid"  alt="images">
                                </div>
                            </div>
                        </div>
                    </div>

                               <div class="col-xl-5">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                    <div class="mb-4 p-0">
                                        <a href="index.html" class="auth-logo">
                                            <img src="{{ asset('backend/assets/images/logo-dark.png') }} " alt="logo-dark" class="mx-auto" height="28" />
                                        </a>
                                    </div>
    
                                    <div class="pt-0">
                                        <form method="POST" action="{{ route('login') }}" class="my-4">
                                            @csrf



                                            {{-- @if (session('error'))
                                                <div class="alrt alert-danger" >
                                                    {{ session('error')}}
                                                </div>
                                            @endif --}}

                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="form-label">ایمیل </label>
                                                <input class="form-control" type="email" id="email" name="email" required="" placeholder="ایمیل  خود را وارد کنید">
                                                @error('email')
                                                    <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                
                                            <div class="form-group mb-3">
                                                <label for="password" class="form-label">رمز عبور </label>
                                                <input class="form-control" type="password" required="" name="password" id="password" placeholder="رمز خود را وارد کنید ">
                                                @error('password')
                                                    <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                
                                        
                                            
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit">ورود</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
    
                                        <div class="saprator my-4"><span></span></div>
    
                                        <div class="text-center text-muted mb-4">
                                            <p class="mb-0">حساب کاربری ندارید؟<a class='text-primary ms-2 fw-medium' href='{{ route('register') }}'>ثبت  نام </a></p>
                                        </div>
    
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    
                </div>
            </div>
        </div>
        
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src=" {{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js-->
        <script src=" {{ asset('backend/assets/js/app.js') }}"></script>
        
    </body>
</html>