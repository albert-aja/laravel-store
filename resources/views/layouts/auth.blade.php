<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <!-- css -->
    @stack('prepend-style')
    @include('template.client._style')
    @stack('addon-style')
  </head>

  <body>
    <!-- navbar -->
    @include('template.client._navbar-auth')

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
