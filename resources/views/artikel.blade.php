<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.templates.partials.head')

</head>
<body>
    @include('frontend.templates.partials.navbar')
    <section class="container-fluid mt-5">
        <h2 class="text-center display-4 pb-5">Artikel</h2>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Poto_Prancheta 1.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Poto_Prancheta 1.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Poto_Prancheta 1.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 ">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Poto_Prancheta 1.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Video-01.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Video-01.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Video-01.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-6 col-lg-3 ">
                <div class="card shadow p-3 mb-5 bg-white rounded" style="width: auto;">
                    <img class="card-img-top" src="{{ asset('assets/images/Video-01.png') }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn button-primer">Cek Selengkapnya</a>
                    </div>
                  </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
    </section>
    @include('frontend.templates.partials.footer')
    @include('frontend.templates.partials.scripts')
</body>
</html>
