@extends('layouts.app')
@section('content')
    <!--================ Banner SM Section start =================-->
    <section class="hero-banner hero-banner-sm text-center"
        style="background-image: url('https://kftd.co.id/assets/img/slider/slider-1.jpg')">
        <div class="container">
            <h1>Daftar</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                {{-- <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login</li>
        </ol> --}}
            </nav>
        </div>
    </section>
    <!--================ Banner SM Section end =================-->



    <!-- ================ contact section start ================= -->
    <section class="section-margin">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-warning" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h5 class="contact-title">Daftar.</h5>
                    <p>Daftar sebagai Pelapor, data anda dirahasiakan.</p>
                </div>
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email" placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password Confirmation</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block mt-2">Daftar</button>
                                <button type="button" class="btn google-btn btn-block mt-3" onclick="loginWithGoogle()">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1200px-Google_%22G%22_logo.svg.png"
                                        alt="Google Logo" width="25">
                                    Login dengan Google
                                </button>
                                <div class="text-center mt-3">
                                    <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

                @include('components.contact')
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
@push('js')
    <script>
        function loginWithGoogle() {
            // Logika untuk login dengan Google
            window.location.href = `/auth/google`;
        }
    </script>
@endpush
