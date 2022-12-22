<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layout.header')
</head>

<body>
    <div class="container-scroller">
        @include('dashboard.layout.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.layout.sidebar')
            <div class="main-panel">
                @yield('content')
                @include('dashboard.layout.footer')
            </div>
        </div>
    </div>
    @include('dashboard.layout.js_library')
</body>

</html>
