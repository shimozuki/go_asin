<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- CSS --}}
      @include('layouts.frontend.css')
    {{-- END CSS --}}
  </head>
  <body>

    {{-- Header --}}
      @include('frontend.partials.header')
      @yield('header')
    {{-- END Header --}}

    {{-- Navbar --}}
      @include('frontend.partials.navbar')
      @yield('nav')
    {{-- END Navbar --}}

    {{-- Hero --}}
      @yield('hero')
    {{-- END Hero --}}

    {{-- Item Hero --}}
      @yield('item_hero')
    {{-- END Item Hero --}}

    {{-- Card --}}
      @yield('card')
    {{-- END Card --}}

    {{-- Faq --}}
      @yield('faq')
    {{-- END Faq --}}

    {{-- Testimoni --}}
      @yield('testimoni')
    {{-- END Testimoni --}}

    {{-- Footer --}}
      @include('frontend.partials.footer')
    {{-- END Footer --}}

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  {{-- Scripts --}}
    @include('layouts.frontend.script')
  {{-- End Scripts  --}}
  </body>
</html>