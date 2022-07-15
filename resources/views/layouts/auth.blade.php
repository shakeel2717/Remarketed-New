<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Asan Webs Development">
    <meta name="description" content="{{ env('APP_DESC') }}">
    <title>{{ env('APP_NAME') }} | {{ env('APP_DESC') }}</title>
    <link rel="shortcut icon" href="/favi.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body class="d-flex align-items-center min-h-100">
    <header class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
        <div class="d-flex d-lg-none justify-content-between">
            <a href="index.html">
                <img class="w-100" src="{{ asset('assets/svg/logos/logo.svg') }}" alt="Image Description"
                    style="min-width: 7rem; max-width: 7rem;">
            </a>
        </div>
    </header>
    <main id="content" role="main" class="main pt-0">
        <div class="container-fluid px-3">
            <div class="row">
                <div
                    class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center min-vh-lg-100 position-relative bg-light px-0">
                    <div class="position-absolute top-0 left-0 right-0 mt-3 mx-3">
                        <div class="d-none d-lg-flex justify-content-between">
                            <a href="index.html">
                                <img class="w-100" src="{{ asset('assets/svg/logos/logo.svg') }}"
                                    alt="Image Description" style="min-width: 7rem; max-width: 12rem;">
                            </a>
                        </div>
                    </div>
                    <div style="max-width: 23rem;">
                        <div class="text-center mb-5">
                            <img class="img-fluid" src="{{ asset('assets/svg/illustrations/chat.svg') }}"
                                alt="Image Description" style="width: 12rem;">
                        </div>

                        <div class="mb-5">
                            <h2 class="display-4">{{ env('APP_DESC') }}</h2>
                        </div>
                        <ul class="list-checked list-checked-lg list-checked-primary list-unstyled-py-4">
                            <li class="list-checked-item">
                                <span class="d-block font-weight-bold mb-1 text-uppercase">PO & Order Analytics</span>
                            </li>
                            <li class="list-checked-item">
                                <span class="d-block font-weight-bold mb-1 text-uppercase">Vendor & Customer Analytics</span>
                            </li>
                            <li class="list-checked-item">
                                <span class="d-block font-weight-bold mb-1 text-uppercase">Product Analytics</span>
                            </li>
                            <li class="list-checked-item">
                                <span class="d-block font-weight-bold mb-1 text-uppercase">You own the device</span>
                            </li>
                        </ul>
                        <hr>
                        <p>Customize your statuses for inventory, POs, Orders, Invoices and RMAs in WholeCell to match the way your team already works.</p>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center min-vh-lg-100">
                    <div class="w-100 pt-10 pt-lg-7 pb-7" style="max-width: 25rem;">
                        <x-alert />
                        @yield('form')
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <x-alert />
</body>

</html>
