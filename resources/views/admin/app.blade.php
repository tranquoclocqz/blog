<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title>{{ config('app.name') }}</title>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="{{ asset('public/admin/js/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('public/admin/js/popper.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('public/admin/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">
  <script src="{{ asset('public/admin/bootstrap-4.3.1/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/fontawesome-free-5.7.2-web/css/all.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('public/admin/css/mdb.min.css') }}"> --}}
  <link rel="stylesheet" type="text/less" href="{{ asset('public/admin/css/style.less') }}?v={{ time() }}">
  <script src="{{ asset('public/admin/js/less.min.js') }}"  data-env="development"></script>
  <script type="text/javascript">//less.watch();</script>
  <script type="text/javascript">
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
@yield('css')
</head>
<body>
  <div id="app">
   <div class="wrapper">
    <nav id="sidebar">
      @include('admin.sidemenu')
    </nav>
    <div id="content">
      @include('admin.navbar')
           <!--  <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                   <button type="button" id="sidebarCollapse" class="btn btn-info">
                       <i class="fas fa-align-left"></i>
                       <span>Toggle Sidebar</span>
                   </button>
               </div>
             </nav> -->
             <div class="container-fluid">
              @yield('content')
            </div>
            @include('admin.footer')
          </div>
        </div>
      </div>
      <script type="text/javascript" src="{{ asset('public/admin/js/myscript.js') }}?v={{ time() }}"></script>
      @yield('script')
    </body>
    </html>