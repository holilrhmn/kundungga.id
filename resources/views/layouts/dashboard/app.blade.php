@include('layouts.dashboard.partials.head')
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.dashboard.partials.nav')
      <div class="main-sidebar">
        @include('layouts.dashboard.partials.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            @yield('content')
          <div class="section-body">
          </div>
        </section>
      </div>
      @include('layouts.dashboard.partials.footer')
    </div>
  </div>
  @include('layouts.dashboard.partials.scripts')
  <!-- Page Specific JS File -->
</body>
</html>
