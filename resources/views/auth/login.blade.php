@extends('frontend.app')

@section('content')
<style>
    body{
        font-family: 'Quicksand', sans-serif;
    }
    .btn-google {
color: #545454;
background-color: #ffffff;
box-shadow: 0 1px 2px 1px #ddd
}

.or-container {
align-items: center;
color: #ccc;
display: flex;
margin: 25px 0
}

.line-separator {
background-color: #ccc;
flex-grow: 5;
height: 1px
}
.or-label {
flex-grow: 1;
margin: 0 15px;
text-align: center
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded-lg ">
                <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email Address">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12"> <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" style="font-size: 15px"> <!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"><i class="fa fa-lock"></i> Signup Now </button> -->
                                Masuk</div>
                            </div>
                            {{-- <button type="submit" class="btn btn-primary">LOGIN</button> --}}
                            <div class="text-center">
                                @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                            </a>
                            @endif
                            </div>

                    </form>
                    <div class="or-container">
                        <div class="line-separator"></div>
                        <div class="or-label" style="font-weight:bold;">Atau</div>
                        <div class="line-separator"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"> <a class="btn btn-lg btn-google btn-block waves-effect btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Masuk Dengan Google</a> </div>
                    </div> <br>
                    <p class="text-inverse text-center">Belum Memiliki Akun? <a href="{{ route('register') }}" data-abc="true">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
