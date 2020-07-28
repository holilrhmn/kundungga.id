<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand top-logo" href="#"><img src="{{ asset('assets/images/logo_Kundungga-01.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" style="color:#3862ae;" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#3862ae;" href="{{ url('/artikel') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#3862ae;" href="{{ url('/kerajaan') }}">Kerajaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#3862ae;" href="#">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:#3862ae;"  href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="btn button-primer btn-md text-white"  >Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
