@extends('../layout')
@section('title','Login')
@section('window-footer')
    <div class="bg-blue py-4 px-3">
        <div class="row">
            <div class="m-auto font-weight-bold">
                Error:
            </div>

            <!--
            <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
            <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            -->
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>

    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
    }

    .card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
    }

    .card2 {
    margin: 0px 40px
    }

    .facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
    }

    .twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
    }

    .linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
    }

    .line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
    }

    .or {
    width: 10%;
    font-weight: bold
    }

    .text-sm {
    font-size: 14px !important
    }

    ::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
    }

    :-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
    }

    ::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
    }

    input,
    textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
    }

    button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
    }

    a {
    color: inherit;
    cursor: pointer
    }

    .bg-blue {
    color: #fff;
    background-color: #1A237E
    }

    @media screen and (max-width: 991px) {

    .border-line {
    border-right: none
    }

    .card2 {
    border-top: 1px solid #EEEEEE !important;
    margin: 0px 15px
    }
    }*/
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush
@section('content')
    <div class="container-fluid py-5 col-lg-6 col-md-8 mx-auto">
        <div class="card card0 border-0">

            @error('fail')
            <div class="alert-danger py-4 px-3">
                <div class="row">
                    <div class="m-auto font-weight-bold">
                        Error: {{ $message }}
                    </div>
                    <!--
                    <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                    <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
                    -->
                </div>
            </div>
            @enderror

            <div class="row d-flex">

                <div class="mx-auto">
                    <div class="card2 card border-0 px-1 py-5">
                        <!--
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div> <small class="or text-center">Or</small>
                            <div class="line"></div>
                        </div>
                        -->
                        <form method="post" action="">@csrf
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label>
                            <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address">
                        </div>

                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <input type="password" name="password" placeholder="Enter password">
                        </div>

                        <div class="row px-3 mb-4">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input id="chk1" type="checkbox" name="remember" class="custom-control-input">
                                <label for="chk1" class="custom-control-label text-sm">Remember me</label>
                            </div> <!--<a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>-->
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-primary px-5 text-center">Login</button>
                        </div>
                        </form>
                        <!--
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div>
                        -->
                    </div>
                </div>

            </div>
            @yield('window-footer1')
        </div>
    </div>
@endsection

