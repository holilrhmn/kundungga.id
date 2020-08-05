@extends('frontend.app')

@section('content')
<section class="container-fluid">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb shadow " style="background-color:white;">
          <li class="breadcrumb-item"><a href="{{ route('landing.page') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('kerajaan.index') }}">Kerajaan</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $kerajaan->nama_kerajaan }}</li>
        </ol>
      </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-white text-white rounded shadow">
                <img src="{{asset('kerajaan')}}/{{$kerajaan->foto}}" style="width:100%;height:500px" class="card-img" alt="...">
                <div class="card-img-overlay rounded">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="card mb-3 mt-3 rounded shadow">
                <div class="card-body">
                  <h5 class="card-title text">{{ $kerajaan->nama_kerajaan }}</h5>
                  <p  id="deskripsi" class="card-text">{!! $kerajaan->deskripsi !!}</p>
                  <hr>
                  <p id="pemerintahan" class="card-text">{!! $kerajaan->pemerintahan !!}</p>
                  <hr>
                  <p id="tradisi_lisan" class="card-text">{!! $kerajaan->tradisi_lisan !!}</p>
                  <hr>
                  <p id="adat-istiadat" class="card-text">{!! $kerajaan->adat_istiadat !!}</p>
                  <hr>
                  <p id="ritus" class="card-text">{!! $kerajaan->ritus !!}</p>
                  <hr>
                  <p id="seni" class="card-text">{!! $kerajaan->seni !!}</p>
                  <hr>
                  <p id="bahasa" class="card-text">{!! $kerajaan->bahasa !!}</p>
                </div>
              </div>
            <div class="card mb-3 mt-3 rounded shadow">
                <div class="card-body text-center">
                    {!! $kerajaan->cagar_budaya !!}
                </div>
            </div>
            <div class="card mb-3 mt-3 rounded shadow">
                <div class="card-body">
                    @foreach ($manuskrip as $m)
                    <h5 class="card-title text-center">Manuskrip</h5>
                        {{ $m->title }}
                    <hr>
                    <p id="#manuskrip" class="card-text">{!! $m->deskripsi !!}</p>
                    <hr>
                    <p id="#sumber" class="card-text">{!! $m->sumber !!}</p>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-lg-3">
            <div class="card bg-white shadow rounded mt-3 mb-3">
                <div class="card-body">
                    <h4 class="font-weight-bold" style="color:#867C68"><i class="fas fa-list-ul"></i> Daftar Isi</h4>
                    <ul class="list-group list-group-flush">
                        <a href="#deskripsi" class="list-group-item">Deskripsi</a>
                        <a href="#pemerintahan" class="list-group-item">Pemerintahan</a>
                        <a href="#tradisi_lisan" class="list-group-item">Tradisi Lisan</a>
                        <a href="#adat-istiadat" class="list-group-item">Adat Istiadat</a>
                        <a href="#ritus" class="list-group-item">Ritus</a>
                        <a href="#seni" class="list-group-item">Seni</a>
                        <a href="#bahasa" class="list-group-item">Bahasa</a>
                        <a href="#manuskrip" class="list-group-item">Manuskrip</a>
                        <a href="#sumber" class="list-group-item">Sumber</a>
                    </ul>
                </div>
            </div>
            <div class="card mb-3  rounded">
                <div class="card-body bg-white shadow rounded">
                    <h4 class="font-weight-bold"  style="color:#867C68"><i class="fas fa-crown"></i> Silsilah Raja</h4>
                    <hr>
                    <ul class="list-group">
                        @foreach ($raja as $r )
                        <div class="media">
                            <img src="{{asset('Foto_Raja')}}/{{$r->Foto_Raja}}" style="width: 64px; height:64px;" class="mr-3 rounded" alt="...">
                            <div class="media-body">
                              <h5 class="mt-0"> {{ $r->Nama_Raja }}</h5>
                                <p>{{ $r->masa_jabatan }}</p>
                            </div>
                          </div>
                        @endforeach
                      </ul>
                </div>
            </div>

        </div>
    </div>

</section>
@endsection

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f2a039efcaef705"></script>
<script>
    var platform = new H.service.Platform({
  'apikey': ''
});

    var defaultLayers = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
    document.getElementById('mapContainer'),
    defaultLayers.vector.normal.map,
    {
      zoom: 10,
      center: { lat: 52.5, lng: 13.4 }
    });
</script>
