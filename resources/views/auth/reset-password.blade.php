@extends('auth.layouts.auth-template')
@section('title', 'Reset Password')
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
                                <h2>Reset Password</h2>
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

                            <form action="{{ route('backend.auth.reset-password.update', $token) }}" method="POST"
                                id="reset-password">
                                @csrf
                                <div class="row field-container">
                                    <!-- Password Input with Eye Icon -->
                                    <div class="password-field-wrapper">
                                        <div class="password-field">
                                            <input type="password" name="new_password" id="new-password" class="input-field"
                                                placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                onpaste="return false" value="{{ old('new_password') }}" />
                                            <i class="toggle-password-icon fas fa-eye-slash disabled"
                                                data-target="new-password"></i>
                                        </div>
                                        @error('new_password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror

                                        <div class="password-field">
                                            <input type="password" name="confirm_password" id="confirm-password"
                                                class="input-field" placeholder="Confirm Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onpaste="return false"
                                                value="{{ old('confirm_password') }}" />
                                            <i class="toggle-password-icon fas fa-eye-slash disabled"
                                                data-target="confirm-password"></i>
                                        </div>
                                        @error('confirm_password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- General Errors -->
                                    @if (session('error'))
                                        <span class="error">{{ session('error') }}</span>
                                    @endif

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn reset-password-btn">Update
                                        Password</button>
                                    <span class="account-desc">Back to <a href="{{ url('/') }}"
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
            $("#reset-password").validate({
                rules: {
                    new_password: {
                        required: true,
                        checklower: true,
                        checkupper: true,
                        checkdigit: true,
                        checkspecial: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#new-password"
                    },
                },
                messages: {
                    new_password: {
                        checklower: "The password must contain at least 1 lowercase letter.",
                        checkupper: "The password must contain at least 1 uppercase letter.",
                        checkdigit: "The password must contain at least 1 numeric character.",
                        checkspecial: "The password must contain at least 1 special character.",
                    }
                },
                submitHandler: function(form, e) {
                    form.submit();
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                }
            });
            $.validator.addMethod("checklower", function(value) {
                return /[a-z]/.test(value);
            });
            $.validator.addMethod("checkupper", function(value) {
                return /[A-Z]/.test(value);
            });
            $.validator.addMethod("checkdigit", function(value) {
                return /[0-9]/.test(value);
            });
            $.validator.addMethod("checkspecial", function(value) {
                return /[\'.?!@#$%^&*()_-]/.test(value);
            });
        });

        // Function to handle password toggle for any field
        function setupPasswordToggle(passwordInputId, toggleIcon) {
            const passwordInput = document.getElementById(passwordInputId);

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
        }

        // Set up toggle for both password fields
        document.querySelectorAll('.toggle-password-icon').forEach(icon => {
            const targetId = icon.getAttribute('data-target');
            setupPasswordToggle(targetId, icon);
        });
    </script>
@endsection
