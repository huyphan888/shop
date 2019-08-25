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


                    <section class="section register inner-left-xs">
                        <div class="col-md-6">

                        <h2 class="bordered">Create New Account</h2>
                        <p>Create your own Media Center account</p>

                        <form role="form" class="register-form cf-style-1" method="post" action="{{url('register')}}">
                            @csrf
                            <div class="field-row">
                                <label>Name</label>
                                <input type="text" class="le-input" name="name" value="{{old('name')}}">
                                <span class="text-danger">{{$errors->first('name')}}</span>

                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>Email</label>
                                <input type="text" class="le-input" name="email" value="{{old('email')}}">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>password</label>
                                <input type="text" class="le-input" name="password">
                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div><!-- /.field-row -->
                            <div class="field-row">
                                <label>password confirmation</label>
                                <input type="text" class="le-input" name="password_confirmation">
                                <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                            </div><!-- /.field-row -->


                            <div class="buttons-holder">
                                <button type="submit" class="le-button huge">Sign Up</button>
                            </div><!-- /.buttons-holder -->
                        </form>


                        </div>
                        <div class="col-md-5 col-md-offset-1" style="margin-top: 150px;">
                            <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                            <ul class="list-unstyled list-benefits">
                                <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                                <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                                <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                            </ul>
                        </div>
                    </section><!-- /.register -->

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    @stop
