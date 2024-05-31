<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sahabat Kemasan</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css"> -->

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" href="bootstrap/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="bootstrap/bootstrap.min.css"> -->


</head>

<body>
  
  @include('frontend.partials.navbar')

  @yield('konten')

  @include('frontend.partials.footer')
  <!-- Feather Icons -->
  <script>
    feather.replace()
    
  </script>

  <!-- My Javascript -->
  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>