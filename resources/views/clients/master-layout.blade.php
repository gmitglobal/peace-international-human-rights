<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peace International Human Rights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('clients/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('clients/css/style-fb-card.css') }}" rel="stylesheet" />
    <link href="{{ asset('clients/css/activities.css') }}" rel="stylesheet" />
    <link href="{{ asset('clients/css/problems.css') }}" rel="stylesheet" />
    <link href="{{ asset('clients/css/footer.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @yield('style')
</head>

<body>
    <!-- Navbar -->
    @include('clients.components.navbar')

    @yield('content')

    <!-- Footer -->
    @include('clients.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>

</html>
