@extends('frontend.app')

@section('content')
<section class="container-fluid">
    <h2 class="text-center display-4 pb-5">Kerajaan</h2>
<div class="row">
    @foreach ($kerajaan as $k )
    <div class="col-lg-4 col-sm-12">
          <div class="card shadow rounded mb-3">
            <img src="{{asset('kerajaan')}}/{{$k->foto}}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="{{ route('kerajaan.show', $k->slug) }}" class="link-artikel" style="color:#3862ae;">
                    <h5 class="card-title">{{ $k->nama_kerajaan }}</h5>
                </a>
              <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($k->created_at)->format('j F, Y') }}</small></p>
            </div>
          </div>
    </div>
    @endforeach

</div>

</section>
@endsection
