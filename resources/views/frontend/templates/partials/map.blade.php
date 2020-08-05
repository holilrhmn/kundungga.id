
<section  class="container-fluid  mt-5">
    <h3 class="text-center mb-3">Wilayah Kerajaan Kalimantan Timur</h3>
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card bg-white shadow rounded mb-5">
                <img src="{{ asset('assets/images/Peta Sebaran_Kundungga.id_2.png') }}" class="card-img" alt="...">
              </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card-body  shadow rounded mb-4" style="background-color:#F2F2F2;">
                <h4 class="font-weight-bold" style="color:#867C68"><i class="fab fa-empire"></i> Daftar Kerajaan</h4>
                <hr>
                @foreach ($kerajaan as $k )
                <a href="{{ route('kerajaan.show', $k->slug) }}" class="btn button-primer btn-lg btn-block rounded shadow">{{ $k->nama_kerajaan }}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>

