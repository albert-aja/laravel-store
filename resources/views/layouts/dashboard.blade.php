<!DOCTYPE html>
<html lang="en">
  <head>
    @include('template._meta')
    
    <title>@yield('title')</title>

    {{-- css --}}
    @stack('prepend-style')
    @include('template.client.dashboard._style')
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">

        <!-- sidebar -->
        @include('template.client.dashboard._sidebar')
        
        <!-- page content -->
        <div id="page-content-wrapper">
            {{-- nav --}}
            @include('template.client.dashboard._nav')

          <!-- content -->
          @yield('content')

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('template.client.dashboard._script')
    @stack('addon-script')
    
  </body>
</html>
