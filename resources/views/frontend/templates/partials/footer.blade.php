<div class="footer-top mt-auto" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                    <img src="{{ asset('assets/images/Kundungga.id-01.png') }}" class="img-fluid" style="width:300px;" alt="Responsive image">
                <p class="text-dark text-justify" style="line-height: 25px">Kundungga.id yaitu Situs Web yang memuat kumpulan informasi dan data seputar kerajaan-kerajaan lokal di Kalimantan Timur.
                    kundungga.id diproyeksikan menjadi pusat informasi dan data kerajaan-kerajaan lokal di Kalimantan Timur
                    </p>
                <div class="social" style="margin-bottom: 20px">
                    <a  href=""><i style="color:#4267B2;" class="fab fa-facebook fa-2x mr-1"></i></a>
                    <a href=""><i  class="fab fa-instagram fa-2x ml-1 mr-1"></i></a>
                    <a  href=""><i style="color:#1DA1F2;" class="fab fa-twitter fa-2x ml-1 mr-1"></i></a>
                    <a  href=""><i style="color:#FF0000;" class="fab fa-youtube fa-2x ml-1"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-dark font-weight-bold">Partner Kami</h4>
                <ul class="list-group list-group-flush">
                    
                  </ul>
            </div>
            {{-- <div class="col-md-2">
                <h4 class="text-dark font-weight-bold">RESOURCE</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                </ul>
            </div> --}}
            <div class="col-md-4">
                <h4 class="text-dark font-weight-bold">Berlangganan</h4>
                Untuk Mendapatkan Pemberitahuan Terkait Informasi Kerajaan dan Artikel Baru Silahkan Berlangganan dibawah ini.
                <div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                        @endif
                        @if (\Session::has('failure'))
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('failure') }}</p>
                        </div><br />
                        @endif
                </div>
                <form method="post" action="{{route('newsletter')}}">
                    <div class="input-group mb-3 mt-2">
                        <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button class="btn button-primer" type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom text-center text-white">
    © <strong>Kundungga.id</strong> 2020 •
    <br>
    <span>Dibuat dengan sepenuh ♥ oleh anak muda Kalimantan Timur, Balikpapan.</span>
</div>
