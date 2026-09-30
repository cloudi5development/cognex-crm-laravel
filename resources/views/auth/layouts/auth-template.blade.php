<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/template/images/logo/favicon.png') }}">
    <!-- Bootstrap css -->
    <link href="{{ asset('assets/template/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/auth/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @yield('style')
</head>

<body>
    <section>
        <div class="login-page-section">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </section>
</body>

<!-- App js -->
<script src="{{ asset('assets/auth/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/auth/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/auth/js/jquery.validate.min.js') }}"></script>
@yield('script')

</html>
