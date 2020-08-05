@extends('frontend.app')

@section('content')
    <section class="container-fluid">
    {{-- <h2 class="text-center display-5 pb-5"></h2> --}}
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Linimasa</h3>
            <ul class="timeline">

                @foreach ($timeline as $t )
                <li>
                      <div class="card mb-3 bg-white shadow rounded" style="width: auto;">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img style="height: 200px;width:100%;" src="{{asset('timeline')}}/{{$t->foto}}"class="card-img bg-white" alt="...">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title">{{ $t->title }}</h5>
                              <p class="card-text">{!! $t->deskripsi !!}</p>
                              <h4 class="card-text"><small class="font-weight-bold">{{ $t->tahun }}</small></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>
@endsection
