@extends('layouts.app')
@section('content')
    <!--================ Banner SM Section start =================-->
    <section class="hero-banner hero-banner-sm text-center"
        style="background-image: url({{ asset('lorahost/img/banner/1.png') }})">
        <div class="container">
            <h1>Masuk</h1>
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
        <!-- Modal Register -->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Daftar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="register-form">
                            <div class="form-group">
                                <label for="register-email">Email</label>
                                <input type="email" class="form-control" id="register-email" placeholder="Masukkan email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="register-password">Password</label>
                                <input type="password" class="form-control" id="register-password"
                                    placeholder="Masukkan password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="register()">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="contact-title">Masuk.</h5>
                    <p>Masuk sebagai Pelapor, data anda dirahasiakan.</p>
                </div>
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
                                <button type="button" class="btn google-btn btn-block mt-3" onclick="loginWithGoogle()">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1200px-Google_%22G%22_logo.svg.png"
                                        alt="Google Logo" width="25">
                                    Login dengan Google
                                </button>
                                <div class="text-center mt-3">
                                    <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar</a></p>
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
