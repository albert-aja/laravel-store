<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template._meta')

    <title>@yield('title')</title>

    <!-- css -->
    @stack('prepend-style')
    @include('template.client.marketplace._style')
    @stack('addon-style')
  </head>

  <body>
    <!-- navbar -->
    @include('template.client.marketplace._navbar-auth')

    <!-- Page Content -->
    @yield('content')

    <!-- footer -->
    @include('template.client.marketplace._footer')

    <!-- script -->
    @stack('prepend-script')
    @include('template.client.marketplace._script')
    @stack('addon-script')
  </body>
</html>
