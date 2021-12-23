<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template._meta')

    <title>@yield('title')</title>

    <!-- css -->
    @stack('prepend-style')
    @include('template.client._style')
    @stack('addon-style')
  </head>

  <body>
    <!-- Page Content -->
    @yield('content')

    <!-- footer -->
    @include('template.client._footer')

    <!-- script -->
    @stack('prepend-script')
    @include('template.client._script')
    @stack('addon-script')
  </body>
</html>
