<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard') }}">Welcome {{ Auth::user()->name }}</a>
        {{-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="user"></span>
                                Users
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @include('flash-message')
                <div class="row g-3 mt-3">
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-3">User Detail</h4>
                        <form class="needs-validation" action="{{ route('admin.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Valid name is required.
                                    </div>
                                </div>
            
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid password.
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
            
                            <button class="btn btn-primary" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>

</body>

</html>