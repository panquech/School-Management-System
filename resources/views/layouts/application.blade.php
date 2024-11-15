<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>{{ isset($title) ? $title.' - ' : '' }} {{__('SADCE') }}</title>

  <!-- Main font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/paper-dashboard.css?v=2.0.0') }}">
  <link rel="stylesheet" href="{{ asset('assets/demo/demo.css') }}">

  @yield('styles')

  <!-- Application stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/wizard/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/wizard/material-bootstrap-wizard.css') }}">

</head>

<body>

  <!-- PACE.js loader -->
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  @yield('layout-content')

  <!-- Libs -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>

  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.0') }}"></script>

  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  <script src="{{ asset('assets/js/wizard/jquery.validate.min.js') }}"></script>
  <script>
    var APP_URL = '{{ url('/') }}';
  </script>

  <script type="text/javascript">
    $("#guardar").on("click", function() {
      swal("¡Guardado!",
        "Información guardada con éxito.",
        "success");
    });

    $(".documento").click(function() {
      $("input[type='file']").trigger('click');
    });

    $('input[type="file"]').on('change', function() {
      var val = $(this).val();
      $(this).siblings('span').text(val);
    })

    $(".borrar").on("click", function() {
      swal({
          title: "¿Seguro que deseas continuar?",
          text: "Estas a punto de borrar tu registro de la plataforma SADCE",
          type: "warning",
          showCancelButton: true,
          cancelButtonText: "Mmm... mejor no",
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "¡Adelante!",
          closeOnConfirm: false
        },

        function() {
          swal("Borrado!",
            "El registro ha sido borrado con éxito.",
            "success");

          $('#form_pagos').submit();
        });
    });
  </script>

  @yield('scripts')


</body>

</html>