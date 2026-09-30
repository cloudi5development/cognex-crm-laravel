@extends('auth.layouts.auth-template')
@section('title', 'Forgot Password')
@section('content')
    <section>
        <div class="row">
            @include('auth.left-banner')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-0 right-content-wrapper">
                <div class="login-form-section">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-12 contact-right-align">
                            <div class="login-form-title text-center">
                                <img src="{{ asset('assets/template/images/logo/logo.png') }}" alt="" />
                                <h2>Forgot Password?</h2>
                            </div>

                            @if ($errors->has('errors'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('errors') }}
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form action="{{ route('backend.auth.forgot-password.send') }}" method="POST" id="reset-password">
                                @csrf
                                <div class="row input-items">
                                    <input type="email" id="email" name="email" class="input-field"
                                        placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                    <button class="btn reset-password-btn">Send Reset Link</button>
                                    <span class="account-desc">Back to <a href="{{ route('backend.auth.index') }}"
                                            class="text-green">Login</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    @include('auth.layouts.patterns')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // Initialize form validation
            $("#reset-password").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form if validation passes
                }
            });
        });
    </script>
@endsection
