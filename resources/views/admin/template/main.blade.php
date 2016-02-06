<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BaseApp | Blank Page</title>
    <!-- bower::css-->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- endbower::css-->    
  </head>
  <body class="hold-transition skin-red sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.template.header')
        @include('admin.template.sidebar')

        @yield('content')

        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">Base Application</a>.</strong> All rights reserved.
        </footer>
        
        @include('admin.template.control-sidebar')

    </div><!-- ./wrapper -->

    <!-- bower:js-->
    <script type="text/javascript" src="{{asset('js/all.js')}}"></script>
    <!-- endbower:js-->
  </body>
</html>
