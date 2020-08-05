@extends('frontend.app')

@section('content')
<section class="container-fluid compact-gallery">
    <h2 class="text-center display-4 pb-5">Galeri</h2>
        <div class="row no-gutters">
            @foreach ($galeri as $g)
            <div class="col-sm-12 col-md-6 col-lg-4 item zoom-on-hover rounded shadow">
                <a class="lightbox" href="{{ route('galeri.show', $g->slug) }}">
                    <img class="img-fluid image" src="{{asset('galeri')}}/{{$g->foto}}">
                    <span class="description">
                        <span class="description-heading">{{ $g->title }}</span>
                        <span class="description-body">{!! $g->deskripsi !!}</span>
                    </span>
                </a>
            </div>
            @endforeach
        </div>
</section>
@endsection
