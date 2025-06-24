<!DOCTYPE html>
<html lang="en">
<head>
    @stack('style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
    @yield('main-Content')
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>