@extends('template.layouts.template-base')
@section('title')
    Email Settings | {{ config('app.name') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3">
            @include('template.settings.sidebar')
        </div>
        <div class="col-lg-9">
            <form id="mail" action="{{ route('backend.settings.update', 'mail') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Mail SMTP Configuration</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mailer" class="form-label">SMTP Malier<span
                                            class="error">*</span></label>
                                    <select class="form-select" id="mailer" name="smtp_mailer">
                                        <option value="" readonly>Select</option>
                                        <option value="smtp" @selected(Arr::has($settings, 'smtp_mailer') == 'smtp')>SMTP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mail_host">Mail Host<span class="error">*</span></label>
                                    <input id="mail_host" name="mail_host" type="text"
                                        value="{{ Arr::has($settings, 'mail_host') ? $settings['mail_host'] : null }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mail_port">Mail Port<span class="error">*</span></label>
                                    <input id="mail_port" name="mail_port" type="text"
                                        value="{{ Arr::has($settings, 'mail_port') ? $settings['mail_port'] : null }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mail_user">Mail Username<span class="error">*</span></label>
                                    <input id="mail_user" name="mail_username" type="text"
                                        value="{{ Arr::has($settings, 'mail_username') ? $settings['mail_username'] : null }}"
                                        class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mail_password">Mail Password<span class="error">*</span></label>
                                    <input id="mail_password" name="mail_password" type="text"
                                        value="{{ Arr::has($settings, 'mail_password') ? $settings['mail_password'] : null }}"
                                        class="form-control">
                                </div>
                            </div>
                            @php
                                $mail_encryption = Arr::has($settings, 'mail_encryption')
                                    ? $settings['mail_encryption']
                                    : null;
                            @endphp
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mail_encryption">Mail Encryption<span class="error">*</span></label>
                                    <select class="form-select" id="mail_encryption" name="mail_encryption">
                                        <option value="">Select</option>
                                        <option value="tls" @selected($mail_encryption == 'tls')>TLS</option>
                                        <option value="ssl" @selected($mail_encryption == 'ssl')>SSL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="from_address">Mail From Address<span class="error">*</span></label>
                                    <input id="from_address" name="mail_from_address" type="text"
                                        value="{{ Arr::has($settings, 'mail_from_address') ? $settings['mail_from_address'] : null }}"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="from_name">Mail From Name<span class="error">*</span></label>
                                    <input id="from_name" name="mail_from_name" type="text"
                                        value="{{ Arr::has($settings, 'mail_from_name') ? $settings['mail_from_name'] : null }}"
                                        class="form-control">
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
            $("#mail").validate({
                rules: {
                    smtp_mailer: {
                        required: true,
                    },
                    mail_host: {
                        required: true,
                    },
                    mail_port: {
                        required: true,
                    },
                    mail_username: {
                        required: true,
                    },
                    mail_password: {
                        required: true,
                    },
                    mail_encryption: {
                        required: true,
                    },
                    mail_from_address: {
                        required: true,
                    },
                    mail_from_name: {
                        required: true,
                    }
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
