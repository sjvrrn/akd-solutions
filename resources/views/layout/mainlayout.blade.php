<!doctype html>
<html lang="en">
    <head>
        @include('layout.partials.head')
    </head>

    <body>
        <!-- Side Menu -->
        @include('layout.partials.sidebar-manu')

        <!-- Main Content Wrapper -->
        <div class="main-content d-flex flex-column">
         
            @yield('content-wrapper')

            <!-- Footer -->
            @include('layout.partials.footer')
        </div>
         
        @include('layout.partials.footer-scripts')
    </body>
</html>
