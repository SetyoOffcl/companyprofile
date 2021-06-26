<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FlexStart Bootstrap Template - Index</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  @include('includes.landingpage.style')
  @stack('after-script')
</head>

<body>

    @include('includes.landingpage.nav')
    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes.landingpage.footer')

    @include('includes.landingpage.script')
</body>

</html>