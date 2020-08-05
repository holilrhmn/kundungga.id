<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top m-auto">
    
        <a class="navbar-brand top-logo" href="#"><img src="{{ asset('assets/images/logo_Kundungga-01.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('landing.page') ? 'active' : '' }}" style="color:#3862ae;" href="{{ route('landing.page') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('kerajaan.index') ? 'active' : '' }}" style="color:#3862ae;" href="{{ route('kerajaan.index') }}">Kerajaan</a>

                </li>

                <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteNamed('linimasa') ? 'active' : '' }}" style="color:#3862ae;" href="{{ route('linimasa') }}">Linimasa</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link  {{ Route::currentRouteNamed('galeri') ? 'active' : '' }}" style="color:#3862ae;" href="{{route('galeri')}}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('artikel') ? 'active' : '' }}" style="color:#3862ae;" href="{{ route('artikel') }} " >Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " style="color:#3862ae;"  href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    @guest
                    <a href="{{ route('login') }}" class="btn button-primer btn-md text-white shadow"  >Login</a>
                    @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            {{ Auth::user()->name }} <span class="caret"></span>

                        </a>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->hasRole('Admin'))
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}" >Dashboard</a>
                            @elseif(auth()->user()->hasRole('Contributors'))
                                <a class="dropdown-item" href="{{ route('contributor.dashboard') }}" >Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"

                               onclick="event.preventDefault();

                                             document.getElementById('logout-form').submit();">

                                {{ __('Logout') }}

                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                @csrf

                            </form>
                        @endguest
                </li>
            </ul>
        </div>
    
</nav>
