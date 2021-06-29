
@php
$items = \App\Models\Company::select('image','title','thumbnail')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href ="{{ Storage::url($items->thumbnail ?? '') }}" type="image/x-icon">
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $items->title ?? '' }}</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  @include('includes.landingpage.style')
  @stack('after-style')
</head>

<body>

    @include('includes.landingpage.nav')
    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @include('includes.landingpage.footer')

    @stack('before-script')
    @include('includes.landingpage.script')
    @stack('after-script')
</body>

</html>