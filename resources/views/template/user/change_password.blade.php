@extends('template.layouts.template-base')
@section('title', 'Change Password')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Change Password</h4>
                    </div>
                    <!-- end card header -->
                    <!-- Success Message -->

                    <form action="{{ route('backend.password.update', $user->id) }}" method="POST"
                        id="reset-password">
                        @csrf
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="old_password" class="form-label">Old Password<span class="error"
                                                style="color: red;">*</span></label>
                                        <input type="text" name="old_password" class="form-control" id="old_password"
                                            placeholder="Old Password" value="{{ old('old_password') }}">
                                        @error('old_password')
                                            <span class="error-message text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="new_password" class="form-label">New Password <span class="error"
                                                style="color: red;">*</span></label>

                                        <input type="text" name="new_password" class="form-control" id="new_password"
                                            placeholder="New Password" value="{{ old('new_password') }}">
                                        @error('new_password')
                                            <span class="error-message text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="confirm_password" class="form-label">Confirm New Password <span
                                                class="error" style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="confirm_password"
                                            id="confirm_password" placeholder="Confirm New Password"
                                            value="{{ old('confirm_password') }}">
                                        @error('confirm_password')
                                            <span class="error-message text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->


                                <!--end col-->
                                <div class="row">
                                    <div class="col-xxl-3 mt-3 col-md-6">
                                        <div class="col-xxl-3 col-md-6">
                                            <button type="submit" class="btn btn-success btn-label right ms-auto"><i
                                                    class="bx bx-right-arrow-alt label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $("#reset-password").validate({
                rules: {
                    old_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#new_password"
                    }
                },
                messages: {
                    old_password: {
                        required: "Please enter your old password."
                    },
                    new_password: {
                        required: "Please enter a new password.",
                        minlength: "Password must be at least 8 characters long."
                    },
                    confirm_password: {
                        required: "Please confirm your new password.",
                        equalTo: "Password confirmation does not match."
                    }
                },
                errorElement: "span",
                errorClass: "error-message text-danger",
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
