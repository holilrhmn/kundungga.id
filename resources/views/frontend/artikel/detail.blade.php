@extends('frontend.app')

@section('content')
<section class="container-fluid">
    <nav aria-label="breadcrumb "  >
        <ol class="breadcrumb shadow" style="background-color:white;">
          <li class="breadcrumb-item"><a href="{{ route('landing.page') }}">Beranda</a></li>
          <li class="breadcrumb-item"><a href="{{ route('artikel') }}">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
        </ol>
      </nav>
    <div class="row">
        <div class="col-md-8">
           <div class="card rounded shadow mb-4">
                <div class="card-body">
                  <h3 class="card-title font-weight-bold">{{ $artikel->judul }}</h3>
                  <hr>
                  <span class="text-black-50 m-auto float-left"> <strong>{{ $artikel->author->name }}</strong></span>
                  <span class="text-black-50 m-auto float-right"> <strong>{{ \Carbon\Carbon::parse($artikel->created_at)->format('j F, Y') }}</strong></span>

                </div>
                <img src="{{asset('artikel')}}/{{$artikel->file}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text text-justify">{!! $artikel->deskripsi !!}</p>
                    <hr>
                    <span class="text-black-50"><strong>Artikel Ini dibaca sebanyak {{ $artikel->count() }} kali</strong></span>
                    <div class="topik">

                                <a href="#" class="badge badge-secondary shadow badge-md">{{ $artikel->kategori->nama }}</a>
                    </div>
                </div>
           </div>
           <div class="card shadow mb-4 rounded">
                <div class="card-body">
                    <h6 class="card-text text-black-50 text-center font-weight-bold">Jika Anda menyukai konten kami, silakan pertimbangkan untuk membeli kopi untuk kami.
                        Terima kasih atas dukungan Anda!</h6>
                        <div class="text-center">
                            <a href="" class="btn btn-outline-primary btn-md"><i class="fas fa-mug-hot"></i> Buy Me a Coffee</a>
                            <a href="" class="btn btn-outline-danger btn-md"><i class="fas fa-mug-hot"></i> Trakteer.id</a>
                        </div>
                </div>
           </div>

           <div class="card shadow mb-3 rounded">
                <div class="card-body">
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="card-body bg-white shadow rounded mb-4">
                <h4 class="font-weight-bold" style="color:#867C68"><i class="fas fa-th-list"></i> Kategori</h4>
                <hr>
                @foreach ($kategori as $k )
                <a href="" class="btn button-primer btn-lg btn-block rounded shadow">{{ $k->nama }}</a>
                @endforeach
            </div>

            <div class="card rounded shadow">
                <div class="card-body mb-4">
                    <h4 class="font-weight-bold" style="color:#867C68"><i class="fas fa-book-open"></i> Artikel Lainnya</h4>
                    <hr>
                    @foreach ($artikel_terkait as $at)
                    <a href="{{ route('artikel.show', $at->slug) }}">
                        <div class="media">
                           
                            <img src="{{asset('artikel')}}/{{$at->file}}" style="height: 50px;width:100px;" class="mr-3" alt="...">
                            <div class="media-body">
                              <h6 class="mt-0" style="color:#3862ae;">{{ Str::limit($at->judul, 25) }} </h6>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
             </div>

        </div>
    </div>
    <!--Column Kategori-->

</div>

</section>
@endsection

<script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://http-localhost-dgbob1mwc7.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
