@include('layouts/partials/header')

<body>
    <div class="container-scroller">
        @include('layouts/partials/navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts/partials/sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                @include('layouts/partials/footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    @yield('js')

</body>

</html>