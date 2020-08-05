@extends('frontend.app')

@section('content')
<section class="container-fluid">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb shadow">
          <li class="breadcrumb-item"><a href="{{ route('landing.page') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('galeri') }}">Galeri</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $galeri->title }}</li>
        </ol>
      </nav>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3 mt-3 rounded shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold ">{{ $galeri->title }}</h3>
                        <div class="">
                            <h6 class="text-black-50"> <strong><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($galeri->created_at)->format('j F, Y') }}</strong></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <img src="{{ Avatar::create($galeri->author->name)->toBase64() }}" class="rounded" style="width: 64px;height:64px" alt="...">
                            <div class="text-center">
                                <p class="text-black-50">{{ $galeri->author->name }} / Pembuat Konten Kundungga.id</p>
                            </div>
                          </div>
                    </div>
                        <img src="{{asset('galeri')}}/{{$galeri->foto}}" style="width:100%;height:700px" class="card-img" alt="...">
                    <p class="card-text">{!! $galeri->deskripsi !!}</p>
                    <p class="card-text">{!! $galeri->dimensi !!}</p>
                    <div class="addthis_inline_share_toolbox mt-5"></div>
                </div>
            </div>
            <div class="card mb-3 mt-3 rounded shadow">
                <div class="card-body">
                    <h3 class="card-title font-weight-bold">Lokasi</h3>
                <div class="card-body text-center">
                    {!! $galeri->lokasi !!}
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h5 class="card-title font-weight-bold "><i class="fab fa-empire"></i> {{ $galeri->kerajaan->nama_kerajaan }}</h3>


                </div>
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
