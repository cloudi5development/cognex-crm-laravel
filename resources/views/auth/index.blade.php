@extends('auth.layouts.auth-template')
@section('title', 'Login')
@section('content')
    <section>
        <div class="row">
            @include('auth.left-banner')
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-0">
                <div class="login-form-section">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-sm-10">
                            <div class="login-form-title text-center">
                                <img src="{{ asset('assets/template/images/logo/logo.png') }}" alt="" />
                                <h2>Sign in</h2>
                            </div>
                            @if ($errors->has('errors'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ $errors->first('errors') }}
                                </div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <form action="{{ route('backend.auth.login') }}" method="post" id="sign-in">
                                @csrf

                                <div class="row field-container">
                                    <!-- Email Input -->
                                    <input type="text" name="username" id="login-email" class="input-field"
                                        placeholder="Enter Email or Mobile No" value="{{ old('username') }}" />
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror

                                    <!-- Password Input with Eye Icon -->
                                    <div class="password-field-wrapper">
                                        <div class="password-field">
                                            <input type="password" name="password" id="login-password" class="input-field"
                                                placeholder="Password" value="{{ old('password') }}" />
                                            <i class="toggle-password-icon fas fa-eye-slash disabled" id="toggle-password"></i>
                                        </div>
                                        @error('password')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <!-- Remember Me and Forgot Password -->
                                    <div class="checkbox-item">
                                        <div class="checkbox-gap">
                                            <input type="checkbox" id="remember-check" name="remember"
                                                {{ old('remember') ? 'checked' : '' }} />
                                            <label for="remember-check" class="mb-0">Remember me?</label>
                                        </div>
                                        <span>
                                            <a href="{{ route('backend.auth.forgot-password') }}" class="text-green">Forgot
                                                Password</a>
                                        </span>
                                    </div>

                                    <!-- General Errors -->
                                    @if (session('error'))
                                        <span class="error-message">{{ session('error') }}</span>
                                    @endif

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn login-btn">Log In</button>
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
            $("#sign-in").validate({
                rules: {

                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                },
                messages: {
                    password: {
                        required: "Please enter your password.",
                        minlength: "Password must be at least 6 characters long."
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                }
            });
        });
        // Elements
        const passwordInput = document.getElementById('login-password');
        const toggleIcon = document.getElementById('toggle-password');

        // Enable/Disable Eye Icon Based on Password Input
        passwordInput.addEventListener('input', function() {
            if (passwordInput.value.trim() !== "") {
                toggleIcon.classList.remove('disabled');
            } else {
                toggleIcon.classList.add('disabled');
            }
        });

        // Toggle Password Visibility on Icon Click
        toggleIcon.addEventListener('click', function() {
            if (!toggleIcon.classList.contains('disabled')) {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

                // Toggle Icon State
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            }
        });
    </script>
@endsection
