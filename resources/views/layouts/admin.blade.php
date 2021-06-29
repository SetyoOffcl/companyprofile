@php
  $image_title = \App\Models\Company::firstOrCreate();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <link rel = "icon" href ="{{ Storage::url($image_title->thumbnail ?? '') }}"
              type = "image/x-icon">  
  @stack('before-style')
  @include('includes.admin.style')
  @stack('after-style')
</head>

<body>
  
  <div id="loading">
    <img id="loading-image" src="{{ url('img/spinner.gif') }}" alt="Loading..." />
  </div>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('includes.admin.nav')
      @include('includes.admin.side')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
    </div>
  </div>

  @stack('before-script')
  @include('includes.admin.script')
  @stack('after-script')
</body>
</html>
