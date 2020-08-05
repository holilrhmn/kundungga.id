
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/stisla-master/assets/js/stisla.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/stisla-master/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/stisla-master/assets/js/page/index-0.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    window.hereApiKey = "{{ env('HERE_API_KEY') }}"
</script>
@stack('scripts')

