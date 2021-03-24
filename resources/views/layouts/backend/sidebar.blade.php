<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/home')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">KNDJH</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        {{-- Dashboard --}}
        <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}">
          <a href="/home"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
          </a>
        </li>

        {{-- Kamar --}}
        <li class="nav-item {{ Request::is('pemilik') ? 'has-sub sidebar-group-active open' : ''}}">
          <a href="#"><i class="feather icon-heart"></i><span class="menu-title" data-i18n="Campaign">Kamar</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('pemilik/kamar') ? 'active' : ''}}">
              <a href="{{route('kamar.index')}}"><i></i><span class="menu-item" data-i18n="Aktif">Data Kamar</span></a>
            </li>
            <li class="{{Request::is('pemilik/kamar/create') ? 'active' : ''}}">
              <a href="{{route('kamar.create')}}"><i></i><span class="menu-item" data-i18n="Selesai">Tambah Kamar</span></a>
            </li>
          </ul>
        </li>





        {{-- Setting --}}
        {{-- <li class="nav-item {{ Request::is('backend') ? 'has-sub sidebar-group-active open' : ''}}">
          <a href="#"><i class="feather icon-settings"></i><span class="menu-title" data-i18n="Settings">Settings</span></a>
          <ul class="menu-content">
            <li class="{{Request::is('backend/listaccount') ? 'active' : ''}}">
              <a href="{{route('dashboard-settings-listaccount')}}"><i></i><span class="menu-item" data-i18n="Manage User">Manage User</span></a>
            </li>
            <li class="{{Request::is('backend/site') ? 'active' : ''}}">
              <a href="{{route('dashboard-settings-site')}}"><i></i><span class="menu-item" data-i18n="Manage Site">Manage Site</span></a>
            </li>
          </ul>
        </li> --}}
      </ul>
    </div>
</div>