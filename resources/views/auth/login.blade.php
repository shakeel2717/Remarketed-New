@extends('layouts.auth')
@section('form')
    <form class="js-validate" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text-center mb-5">
            <h1 class="display-4">Welcome Back!</h1>
            <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a>
            </p>
        </div>
        <hr>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="js-form-message form-group">
                    <label class="input-label" for="email">Your email</label>
                    <input type="email" class="form-control form-control-lg" name="email" id="email"
                        placeholder="Markwilliams@example.com" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="js-form-message form-group">
                    <label class="input-label" for="password">Type Password</label>
                    <input type="password" class="form-control form-control-lg" name="password" id="password"
                        placeholder="**********" required>
                </div>
            </div>
        </div>
        <div class="js-form-message form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox">
                <label class="custom-control-label text-muted" for="termsCheckbox">
                    Stay Logged In
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-block btn-primary mb-2">Sign In</button>
        <a class="btn btn-block btn-link" href="{{ route('password.request') }}">Forgot Password?</a>
    </form>
@endsection
