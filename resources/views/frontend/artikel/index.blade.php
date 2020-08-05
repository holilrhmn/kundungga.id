@extends('frontend.app')

@section('content')
<section class="container-fluid">
    <h2 class="text-center display-4 pb-5">Artikel</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($artikel as $a)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="card shadow p-3 rounded mb-5 " style="height: auto">
                        <img class="card-img-top" src="{{asset('artikel')}}/{{$a->file}}" alt="Card image cap" style="width:100%;height:200px;">
                        <div class="card-body mb-2">
                            <div class="tag mb-2">

                                <a href="#" class="badge badge-secondary shadwo">{{ $a->kategori->nama }}</a>
                            </div>
                          <a href="{{ route('artikel.show', $a->slug) }}" class="link-artikel" style="color:#3862ae;">
                              <h5 class="card-title font-weight-bold">{{ $a->judul }}</h5>
                          </a>
                        </div>
                        <div class="card-footer" style="background-color: white;">
                                <div class="pull-left">
                                    {{-- <img style=" width: 35px;
                                    height: 35px;" src="{{ Avatar::create($artikel->author->name)->toBase64() }}"> --}}
                                     <span class="text-black-50 m-auto float-left"> <strong>{{ $a->author->name }}</strong></span>
                                     <span class="text-black-50 m-auto float-right"> <strong>{{ \Carbon\Carbon::parse($a->created_at)->format('j F, Y') }}</strong></span>
                                </div>
                        </div>
                    </div>
                </div>
                {{ $artikel->links() }}
                @endforeach
                
        </div>
    </div>
    <!--Column Kategori-->
    <div class="col-md-4">
        <div class="card-body bg-white shadow rounded mb-5" style="width: auto;">
            <h4 class="font-weight-bold" style="color:#867C68"><i class="fas fa-newspaper"></i> Artikel Sering Dikunjungi</h4>
            <hr>
            @foreach ($artikel_terlaris as $a )
            <a href="{{ route('artikel.show', $a->slug) }}">
            <div class="media">
                <img src="{{asset('artikel')}}/{{$a->file}}" style="height: 50px;width:100px;" class="mr-3" alt="...">
                <div class="media-body">
                  <h6 class="mt-0" style="color:#3862ae;">{{ Str::limit($a->judul, 25) }} </h6>
                </div>
              </div>
            </a>
            @endforeach

        </div>

        <div class="card-body bg-white shadow rounded">
            <h4 class="font-weight-bold" style="color:#867C68"><i class="fas fa-th-list"></i> Kategori</h4>
            <hr>
            @foreach ($kategori as $k )
            <a href="" class="btn button-primer btn-lg btn-block rounded shadow">{{ $k->nama }}</a>
            @endforeach
        </div>

    </div>
</div>

</section>
@endsection
