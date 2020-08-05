<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    @include('frontend.templates.partials.head')
</head>
<body class="d-flex flex-column min-vh-100">
    @include('frontend.templates.partials.navbar')
    <main class="py-4" style="background-color:#F2F2F2;">
        @yield('content')
    </main>
    @include('frontend.templates.partials.footer')
    @include('frontend.templates.partials.scripts')
</body>
</html>
