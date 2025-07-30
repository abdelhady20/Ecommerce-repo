<!DOCTYPE html>
<html lang="en">
<head>
    @include('website.layouts.header')
    @yield('css')
</head>
<body>
@include('website.layouts.navbar')

<main class="main">
    @yield('content')
</main>

@include('website.layouts.footer')

@include('website.layouts.scripts')
@yield('js')
</body>
</html>
