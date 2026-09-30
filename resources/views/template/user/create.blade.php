@extends('template.layouts.template-base')
@section('title', 'Create User')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Create User</h4>
                        <div class="flex-shrink-0">
                            <a href="{{ route('backend.users.index') }}"
                                class="btn btn-sm btn-outline-secondary waves-effect waves-light"><i
                                    class="bx bx-arrow-back label-icon align-middle fs-16"></i> Back</a>
                        </div>
                    </div><!-- end card header -->
                    <form action="{{ route('backend.users.store') }}" method="POST" id="form-validate"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Name<span class="error">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter the Name" value="{{ old('name') }}">

                                        @error('name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">Profile Image</label>

                                        <input class="form-control" name="image" type="file" id="formFile"
                                            placeholder="Enter the Profile Image" accept="image/*">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="email" class="form-label">Email<span class="error">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter the Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="mobile" class="form-label">Phone Number<span
                                                class="error">*</span></label>
                                        <input type="number" class="form-control"name="mobile" id="mobile"
                                            placeholder="Phone Number" value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="password" class="form-label">Password<span
                                                class="error">*</span></label>
                                        <input type="text" class="form-control"name="password" id="password"
                                            placeholder="Password" value="{{ old('password') }}">
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label class="form-label"> Status</label>
                                        <div>
                                            <div class="form-check form-radio-success form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="status" id="active"
                                                    value="1"
                                                    {{ old('status', $user->status ?? 1) == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check form-radio-danger form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="status" id="inactive"
                                                    value="0"
                                                    {{ old('status', $user->status ?? 1) == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                            </div>
                            <!--end row-->

                            <div class="row mt-4">
                                <div class="col-xxl-3 col-md-6">
                                    <button type="submit" class="btn btn-success btn-label right ms-auto"><i
                                            class="bx bx-right-arrow-alt label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                </div>
                            </div>
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
            $("#form-validate").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true,
                    },
                    password: {
                        required: true,
                    },

                },

                messages: {},
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                }
            });
        });
    </script>
@endsection
