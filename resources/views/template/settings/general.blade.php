@extends('template.layouts.template-base')

@section('title')
    General Settings | {{ config('app.name') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('template.settings.sidebar')
        </div>
        <div class="col-lg-9">
            <form id="general" action="{{ route('backend.settings.update', 'general') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">General Settings</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="website_name">Website Name</label>
                                    <input id="website_name" name="website_name" type="text"
                                        value="{{ Arr::has($settings, 'website_name') ? $settings['website_name'] : null }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_number">Contact Number</label>
                                    <input id="contact_number" name="contact_number" type="text"
                                        value="{{ Arr::has($settings, 'contact_number') ? $settings['contact_number'] : null }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_email">Contact Email</label>
                                    <input id="contact_email" name="contact_email" type="text"
                                        value="{{ Arr::has($settings, 'contact_email') ? $settings['contact_email'] : null }}"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_email">WhatsApp Number</label>
                                    <input id="contact_email" name="contact_email" type="text"
                                        value="{{ Arr::has($settings, 'contact_email') ? $settings['contact_email'] : null }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="website_logo" class="form-label">Choose Website Logo</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxl-3 mt-3 col-md-6">
                                <button type="submit" class="btn btn-success btn-label right ms-auto"><i
                                    class="bx bx-right-arrow-alt label-icon align-middle fs-16 ms-2"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("#general").validate({
                rules: {
                    website_name: {
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
