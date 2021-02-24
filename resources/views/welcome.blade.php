<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/x-icon" />

    <title>@yield('title','TIMS')</title>

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}"/>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.default.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">

<div class="page login-page">
    <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
            <div class="row">
                <!-- Logo & Information Panel-->
                <div class="col-lg-6">
                    <div class="info d-flex align-items-center">
                        <div class="content">
                            <div class="logo">
                                <div class="avatar text-center"><img src="img/logo.png" alt="..." class="img-fluid"
                                        width="500" height="350">
                                </div>
                                <div class="title">

                                    <br>
                                    <h3 class="text-center">TRANSPORT INFORMATION MANGMENT SYSTEM(TIMS)</h3>
                                    <br>
                                    <p><i class="fa fa-user"></i> Developed By Yetimesht Tadesse</p>
                                    <p><i class="fa fa-mobile"></i> &nbsp; +251929102926</p>
                                    <p><i class="fa fa-google"></i> &nbsp; yetimnew@gmail.com</p>
                                    <p><i class="fa fa-facebook"></i> &nbsp; https://www.facebook.com</p>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Form Panel    -->
                <div class="col-lg-6 bg-white">
                    <div class="form d-flex align-items-center">
                        <div class="content">
                            @include('master.error')
                            <form method="POST" action=" {{ route('login')}}" >
                                @csrf
                                <div class="form-group required">
                                    <label for="mobile" class="control-label">Mobile Number</label>
                                    <input id="mobile" type="text" name="mobile" required class="form-control"
                                        placeholder="0911000000">

                                </div>
                                <div class="form-group required">
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" name="password" required class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-primary btn-md btn-block"> Login</button>
                            </form>
                            <a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account?
                            </small><a href="register.php" class="signup">Signup</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights text-center">
            <p>Design by <a href="#" class="external">Yetimeshet T</a>
            </p>
        </div>
    </div>
    {{-- @endsection --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/front.js') }}" > </script>
    {{-- <script src="{{ asset('js/jquery.min.js') }}" > </script> --}}
    {{-- <script
  src="https://code.jquery.com/jquery-3.2.0.slim.js"
  integrity="sha256-8YrBCTDoQjO4CBT1WVvMH2/610BH0DjZlxFOCIgK7AM="
  crossorigin="anonymous"></script> --}}
