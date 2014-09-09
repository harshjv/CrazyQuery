<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrazyQuery</title>

    <link href="/assets/css/style.min.css" rel="stylesheet">
    @yield('css')

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @yield('body')
    <script src="/assets/js/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/js/vendor/bootstrap/bootstrap.min.js"></script>
    @yield('js')
  </body>
</html>