@extends('layouts.app')
@section('content')
    <!--================ Banner SM Section start =================-->
    <section class="hero-banner hero-banner-sm text-center"
        style="background-image: url('https://kftd.co.id/assets/img/slider/slider-3.jpg')">
        <div class="container">
            <h1>Faq</h1>
            <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Faq</li>
                </ol>
            </nav>
        </div>
    </section>
    <!--================ Banner SM Section end =================-->


    <!--================ Price Table section start =================-->
    <section class="section-padding">
        <div class="container">
            <div class="pb-85px text-center">
                <h2>Pertanyaan yang sering muncul</h2>
                <div class="section-style"></div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne" style="text-decoration: none; color:black">
                                Apa yang dimaksud Sistem Pelaporan Dugaan Pelanggaran (Whistleblowing System) Kimia Farma?
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            “Sistem Pelaporan Pelanggaran/Whistleblowing System (WBS)” adalah Sistem yang digunakan untuk
                            menampung, mengolah dan menindaklanjuti serta membuat Pelaporan atas informasi yang disampaikan
                            oleh Pelapor mengenai tindakan pelanggaran yang terjadi di lingkungan Perseroan.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                style="text-decoration: none; color:black">
                                Siapa yang dapat menjadi Pelapor pada WBS Kimia Farma?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Insan Kimia Farma, Masyarakat dan stakeholders lainnya
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                                style="text-decoration: none; color:black">
                                Apa saja jenis perbuatan yang dapat dilaporkan pada WBS Kimia Farma?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Pelanggaran yang dapat dilaporkan melalui WBS adalah sebagai berikut:<br>
                            a. Benturan Kepentingan; <br>
                            b. Korupsi; <br>
                            c. Kecurangan; <br>
                            d. Penggelapan; <br>
                            e. Gratifikasi; <br>
                            f. Suap; <br>
                            g. Perselisihan Hubungan Industrial. <br>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"
                                style="text-decoration: none; color:black">
                                Bagaimana cara pelaporan WBS Kimia Farma?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Pelaporan terkait WBS Kimia farma dapat dilakukan melalui: <br>
                            - Email: wbs@kftd.co.id <br>
                            - Surat: Unit Kepatuhan dan Hubungan Industrial PT Kimia Farma (Persero) Tbk Jl.Veteran no. 9
                            Jakarta Pusat
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"
                                style="text-decoration: none; color:black">
                                Bagaimana indikasi awal laporan WBS Kimia Farma yang dapat ditindaklanjuti?
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            • Bila ya, Pelaporan Pengaduan/Pengungkapan yang dapat ditindaklanjuti melalui mekanisme WBS ini
                            adalah Pelaporan dan Pengaduan atas kasus pelanggaran yang berdampak signifikan terhadap
                            Perseroan. Laporan pengaduan/pengungkapan yang diterima akan diteruskan ke Komite Etik. <br>
                            • Bila Tidak, proses Sistem Pelaporan Pelanggaran selesai.

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Price Table section end =================-->


    <!--================ Subscribe section start =================-->
    {{-- <section class="bg-gray section-padding">
    <div class="container">
      <div class="section-intro pb-5 mb-xl-2 text-center">
        <h2 class="mb-4">Subscribe To Get Our Newsletter</h2>
        <p>Man greater image shall land air winged place seas replenish whose winged great fifth fruitful. Set days sea over morning.</p>
      </div>

      <form class="form-subscribe" action="#">
        <div class="input-group align-items-center">
          <input type="text" class="form-control" placeholder="Enter Your email" required>
          <div class="input-group-append">
            <button class="button button-shadow2" type="submit">Subscribe</button>
          </div>
        </div>
      </form>
    </div>
  </section> --}}
    <!--================ Subscribe section end =================-->


    <!--================  Dedicated server section start =================-->
    {{-- <section class="section-margin">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5 mb-5 mb-lg-0">
          <h2 class="mb-4">Dedicated <br class="d-none d-xl-block"> and Secured server <br class="d-none d-xl-block"> for your website</h2>
          <p>There third us one you. Spirit tree. Together have brought bez and to wherein a so above all female likeness open herbed rappear yielding own behold fourth without. You creature kind cree There third us one your</p>
        </div>
        <div class="col-lg-7">
          <div class="text-center">
            <img class="img-fluid" src="img/home/server.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!--================  Dedicated server section end =================-->
@endsection
