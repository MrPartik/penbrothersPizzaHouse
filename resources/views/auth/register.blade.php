@extends('layouts.auth')

@section('title','Registration')

@section('content')

    <!-- begin register -->
    <div class="register register-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image" style="background-image:url({{asset('assets/img/pizza/pizza2-unsplash.jpg')}})"></div>
            <div class="news-caption">
                <a href="{{url('/')}}"><h4 class="caption-title"><b>Pizza</b>House</h4></a>

            </div>
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin register-header -->
            <h1 class="register-header">
                Sign Up
                <small>Create your account in PizzaHouse</small>
            </h1>
            <!-- end register-header -->
            <!-- begin register-content -->
            <div class="register-content">
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <label class="control-label">Full Name <span class="text-danger">*</span></label>
                    <div class="row row-space-10">
                        <div class="col-md-12 m-b-15">
                            <input id="name" type="text" placeholder="Full name"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>

                    <label class="control-label">Email <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <label class="control-label">Password <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                   required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <label class="control-label">Retype Password <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" placeholder="Retype password" class="form-control"
                                   name="password_confirmation"
                                   required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <label class="control-label">Phone <span class="text-danger">*</span></label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <input id="phone" type="text" placeholder="Phone"
                                   class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                   value="{{ old('phone') }}" required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <label class="control-label">Home Address </label>
                    <div class="row m-b-15">
                        <div class="col-md-12">
                            <textarea id="address" type="text" placeholder="Home Address"
                                      class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address"
                                      value="{{ old('address') }}" ></textarea>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="checkbox checkbox-css m-b-30">
                        <div class="checkbox checkbox-css m-b-30">
                            <input type="checkbox" id="agreement_checkbox" value="" required="">
                            <label for="agreement_checkbox">
                                By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
                            </label>
                        </div>
                    </div>
                    <div class="register-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                        Already a member? Click <a href="{{url('login')}}">here</a> to login.
                    </div>
                    <hr />
                    <p class="text-center">
                        &copy; PizzaHouse
                    </p>
                </form>
            </div>
            <!-- end register-content -->
        </div>
        <!-- end right-content -->
    </div>
    <!-- end register -->

@endsection
