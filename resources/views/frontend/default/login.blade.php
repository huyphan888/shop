@extends('frontend.layout.master')
@section('content')
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-md-6 col-md-offset-1">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">Sign In</h2>
                        <p>Hello, Welcome to your account</p>

                        <div class="social-auth-buttons">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                                </div>
                            </div>
                        </div>

                        <form role="form" class="login-form cf-style-1" method="post" action="{{route('frontend.login')}}">
                            @csrf
                            <div class="field-row">
                                <label>Email</label>
                                <input type="text" class="le-input" name="email" value={{old('email')}}>
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <label>Password</label>
                                <input type="text" class="le-input" name="password">
                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div><!-- /.field-row -->

                            <div class="field-row clearfix">
                        	<span class="pull-left">
                                <input class="" style="width: 10px" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                <label for="" style="margin-left: 8px;float:right;margin-top: 2px;">remember me</label>

                        	</span>

                                <span class="pull-right" >
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('frontend.password.request') }}" class="content-color bold">
                                        {{ __('Forgot Your Password?') }}
                                    </a>

                                    @endif
                        	</span>
                            </div>

                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">Secure Sign In</button>
                            </div><!-- /.buttons-holder -->
                        </form><!-- /.cf-style-1 -->

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->



            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    @stop
