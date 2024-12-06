@extends('layouts.app')
@push('css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush
@section('content')
    <!--================ Banner SM Section start =================-->
    <section data-aos="fade-up" data-aos-duration="1000" class="hero-banner hero-banner-sm text-center"
        style="background-image: url({{ asset('lorahost/img/banner/5.png') }})">
        <div class="container">
            <h1 data-aos="fade-up" data-aos="fade-up" data-aos-duration="1000">Kontak Kami</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                </ol>
            </nav>
        </div>
    </section>
    <!--================ Banner SM Section end =================-->



    <!-- ================ contact section start ================= -->
    <section class="section-margin" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="d-none d-sm-block mb-5 border shadow">
                <div id="map" style="width:100%; min-height:80vh; position:relative; z-index:1;"></div>

                <!-- Leaflet Maps -->
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                <script>
                    var map = L.map('map', {
                        center: [-6.161853, 106.835590],
                        zoom: 15,
                        scrollWheelZoom: false,
                        zoomControl: false
                    });
                    var marker = L.marker([-6.167460, 106.835789]).addTo(map);
                    L.tileLayer(
                        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 20,
                        }).addTo(map);

                    var popup = L.popup()
                        .setLatLng([-6.165902, 106.835875])
                        .setContent(
                            "<center><img src='https://kftd.co.id/assets/img/content/map-popup.jpg' width='100px' class='shadow border rounded'/><hr class='hr m-1' /> <b>PT Kimia Farma Trading & Distribution</b> <br /> Jl. Budi Utomo No.1, Ps. Baru, Kecamatan Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10710 <hr class='hr m-1' /> <a href='https://www.google.com/maps/dir//PT+Kimia+Farma+Trading+Dan+Distribution+(Kantor+Pusat)+Jl.+Budi+Utomo+No.1+Ps.+Baru+Kecamatan+Sawah+Besar,+Kota+Jakarta+Pusat,+Daerah+Khusus+Ibukota+Jakarta+10710/@-6.1674199,106.8360857,20z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e69f5d6f4d9dd95:0xdc6180f07e9c9130!2m2!1d106.8360857!2d-6.1674199?entry=ttu' class='genric-btn primary small' target='_blank'><i class='fas fa-map-marked-alt'></i> Rute</a> </center>"
                        )
                        .openOn(map);
                </script>

            </div>


            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-lg-3">
                            <button type="submit" class="button button-contactForm">Send Message</button>
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
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
