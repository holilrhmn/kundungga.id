<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('landing.page') }}">Kundungga.id</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('landing.page') }}">K.id</a>
    </div>
    <ul class="sidebar-menu">

        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">Authentication</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a class="nav-link {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">Roles</a></li>
          </ul>
        </li>
        <li class="menu-header">Kerajaan</li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.kerajaan.index') ? 'active' : '' }}" href="{{ route('admin.kerajaan.index') }}"><i class="fab fa-empire"></i> <span>Profil Kerajaan</span></a></li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.raja.index') ? 'active' : '' }}" href="{{ route('admin.raja.index') }}"><i class="fas fa-crown"></i><span>Profil Raja</span></a></li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.manuskrip.index') ? 'active' : '' }}" href="{{ route('admin.manuskrip.index') }}"><i class="fas fa-journal-whills"></i> <span>Manuskrip</span></a></li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.galeri.index') ? 'active' : '' }}" href="{{ route('admin.galeri.index') }}"><i class="fas fa-images"></i> <span>Galeri</span></a></li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.timeline.index') ? 'active' : '' }}" href="{{route('admin.timeline.index')}}"><i class="fas fa-history"></i> <span>Timeline</span></a></li>
        <li class="menu-header">Artikel</li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.artikel.index') ? 'active' : '' }}" href="{{ route('admin.artikel.index') }}"><i class="far fa-newspaper"></i> <span>Artikel</span></a></li>
        <li><a class="nav-link {{ Route::currentRouteNamed('admin.kategori.index') ? 'active' : '' }}" href="{{ route('admin.kategori.index') }}"><i class="far fa-list-alt"></i> <span>Kategori</span></a></li>
        {{-- <li><a class="nav-link {{ Route::currentRouteNamed('admin.tag.index') ? 'active' : '' }}" href="{{ route('admin.tag.index') }}"><i class="far fa-list-alt"></i> <span>Tag</span></a></li> --}}
      </ul>
      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Halaman Utama
        </a>
      </div>
  </aside>
