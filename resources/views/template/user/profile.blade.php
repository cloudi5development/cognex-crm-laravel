@extends('template.layouts.template-base')
@section('title', 'Profile')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Profile</h4>
                    </div><!-- end card header -->
                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('backend.profile.update', $user->id) }}" method="POST" id="form-validate"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="placeholderInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="basiInput"
                                            placeholder="Enter the Name" value="{{ old('name', $user->name) }}">
                                    </div>
                                </div>


                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="formFile" class="form-label">Profile Image</label>
                                        <div class="col-xxl-3 col-md-6">
                                            @if ($user->image)
                                                <img src="{{ asset($user->image) }}" alt="Current Profile Image"
                                                    class="mt-2 img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            @else
                                                <p>No profile image</p>
                                            @endif
                                        </div>
                                        <input class="form-control" name="image" type="file" id="formFile"
                                            placeholder="Enter the Profile Image" accept="image/*">


                                    </div>
                                </div>


                                <!--end col-->

                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="placeholderInput" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="basiInput2"
                                            placeholder="Enter the Email" value="{{ old('email', $user->email) }}">
                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->
                                <div class="col-xxl-3 col-md-6">
                                    <div>
                                        <label for="placeholderInput" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control"name="mobile" id="placeholderInput"
                                            placeholder="Phone Number" value="{{ old('mobile', $user->mobile) }}">
                                    </div>
                                </div>
                                <!--end col-->


                            </div>
                            <!--end col-->

                            <div class="row">
                                <div class="col-xxl-3 mt-3 col-md-6">
                                    <div class="col-xxl-3 col-md-6">
                                        <button type="submit" class="btn btn-success btn-label right ms-auto"><i
                                                class="bx bx-right-arrow-alt label-icon align-middle fs-16 ms-2"></i>Submit</button>
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
            $("#form-validate").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        digit: true,
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
