@extends('layouts.app')
@push('css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .header_area .navbar {
            background: #1f185944;
            border: 0px;
            border-radius: 0px;
            width: 100%;
            padding-top: 0;
            padding-bottom: 0
        }
    </style>
@endpush
@section('content')
    <!--================ Banner Section start =================-->
    <section class="hero-banner" {{-- style="background-image: url('https://kftd.co.id/assets/img/slider/slider-1.jpg')" --}}>
        <div class="container" style="margin-top: 100px">
            {{-- <p class="text-uppercase">Smart Company With perfect space</p> --}}
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Silahkan Cek Email</strong> untuk verifikasi, dan ajukan pengaduan sekarang!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- <h1 data-aos="fade-up" data-aos-duration="1000">Whistleblowing System</h1> --}}
            {{-- <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1500">Platform yang memungkinkan individu atau
                pegawai untuk melaporkan dugaan pelanggaran
                atau tindakan tidak etis secara anonim atau teridentifikasi.</p> --}}
            {{-- <p class="hero-subtitle">Form male saying she'd so every fifth winged after spirit male land moving won't seasons fish In shall given fifth edition</p> --}}
            {{-- <a class="button button-outline" href="#">Get Started</a> --}}
            {{-- <a class="button button-outline" href="{{ url('pengaduan') }}">Laporkan Sekarang</a> --}}
            <a class="button button-outline" data-aos="fade-right" data-aos-duration="2500"
                href="{{ auth()->user() && !auth()->user()->hasVerifiedEmail() ? '#' : url('pengaduan') }}"
                onclick="{{ auth()->user() && !auth()->user()->hasVerifiedEmail() ? 'event.preventDefault(); showVerificationModal();' : '' }}">
                Laporkan Sekarang
            </a>

        </div>
    </section>
    <!--================ Banner Section end =================-->


    <!--================ Domain Search section start =================-->
    <section class="bg-white domain-search" data-aos="fade-up" data-aos-duration="2500">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3 col-lg-2 text-center text-md-left mb-3 mb-md-0">
                    <h3>Cek Status Pengaduanmu!</h3>
                </div>
                <div class="col-md-9 col-lg-10 pl-2 pl-xl-5">
                    <form class="form-inline flex-nowrap form-domainSearch" id="searchForm" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="cariPengaduan" class="sr-only">Cari Pengaduanmu</label>
                            <input type="text" name="tiket" class="form-control" id="cariPengaduan"
                                placeholder="Masukkan Nomer Tiket">
                        </div>
                        <button type="submit" class="button button-outline rounded-0">Cek</button>
                    </form>
                    <div id="result" class="mt-3">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Domain Search section end =================-->


    <!--================ Feature section start =================-->
    {{-- <section class="section-margin">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="card-feature card-feature-content">
            <h2>How To Report</h2>
            <p>Form male saying shed so every fifth winged and after spirit male land moving won seasons fish shall given fifth form male saying she'd soev bundantly green unes </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card-feature text-center">
            <div class="feature-icon">
              <img src="{{ asset('lorahost/img/home/png/001-unlock.png') }}" alt="">
            </div>
            <h3>Secured Server</h3>
            <p>Let place fly together third creature night at called fowl fill upon the grass </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card-feature text-center">
            <div class="feature-icon">
              <img src="img/home/png/002-shield.png" alt="">
            </div>
            <h3>Backup Facility</h3>
            <p>Let place fly together third creature night at called fowl fill upon the grass </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card-feature text-center">
            <div class="feature-icon">
              <img src="img/home/png/003-pencil.png" alt="">
            </div>
            <h3>Easy To Customize</h3>
            <p>Let place fly together third creature night at called fowl fill upon the grass </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card-feature text-center">
            <div class="feature-icon">
              <img src="img/home/png/004-home-page.png" alt="">
            </div>
            <h3>Free Domain Transfer</h3>
            <p>Let place fly together third creature night at called fowl fill upon the grass </p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="card-feature text-center">
            <div class="feature-icon">
              <img src="img/home/png/005-headset.png" alt="">
            </div>
            <h3>Live Chat Support</h3>
            <p>Let place fly together third creature night at called fowl fill upon the grass </p>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!--================ Feature section end =================-->


    <!--================ Price Table section start =================-->
    {{-- <section class="section-padding priceTable-bg">
    <div class="container">
      <div class="section-intro-white pb-85px text-center">
        <h2>Popular Pricing Package</h2>
        <div class="section-style"></div>
      </div>

      <div class="priceTable-relative">
        <div class="priceTable-wrapper">
          <div class="row">
            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card text-center card-pricing">
                <div class="card-pricing__header">
                  <h4>Normal</h4>
                  <p>Attend only first day</p>
                  <h1 class="card-pricing__price"><span>$</span>45.80</h1>
                </div>
                <ul class="card-pricing__list">
                  <li>Unlimited of Website</li>
                  <li>Unlimited Disk Space</li>
                  <li>Unlimited Bandwidth</li>
                  <li>24/7/365 Support</li>
                  <li>Unlimited Email Accounts</li>
                  <li>99.9% Service Uptime</li>
                </ul>
                <div class="card-pricing__footer">
                  <button class="button">Select Plan</button>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card text-center card-pricing">
                <div class="card-pricing__header">
                  <h4>Premium</h4>
                  <p>Attend only first day</p>
                  <h1 class="card-pricing__price"><span>$</span>65.80</h1>
                </div>
                <ul class="card-pricing__list">
                  <li>Unlimited of Website</li>
                  <li>Unlimited Disk Space</li>
                  <li>Unlimited Bandwidth</li>
                  <li>24/7/365 Support</li>
                  <li>Unlimited Email Accounts</li>
                  <li>99.9% Service Uptime</li>
                </ul>
                <div class="card-pricing__footer">
                  <button class="button">Select Plan</button>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card text-center card-pricing">
                <div class="card-pricing__header">
                  <h4>Ultimate</h4>
                  <p>Attend only first day</p>
                  <h1 class="card-pricing__price"><span>$</span>75.80</h1>
                </div>
                <ul class="card-pricing__list">
                  <li>Unlimited of Website</li>
                  <li>Unlimited Disk Space</li>
                  <li>Unlimited Bandwidth</li>
                  <li>24/7/365 Support</li>
                  <li>Unlimited Email Accounts</li>
                  <li>99.9% Service Uptime</li>
                </ul>
                <div class="card-pricing__footer">
                  <button class="button">Select Plan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!--================ Price Table section end =================-->


    <!--================ Service section start =================-->
    {{-- <section class="section-margin mb-5 pt-xl-50">
    <div class="container">
      <div class="section-intro pb-85px text-center">
        <h2>Cara Melapor</h2>
        <div class="section-style"></div>
      </div>

      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="{{ asset('lorahost/img/home/png/006-server.png') }}" alt="">
              <h1>1</h1>
            </div>
            <h3>Login/Register ke Akun Anda</h3>
            <p>Sebelum melaporkan pengaduan Anda di Whistleblower System KBUMN, terlebih dahulu lakukan login/register  </p>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="{{ asset('lorahost/img/home/png/004-home-page.png') }}" alt="">
              <h1>2</h1>
            </div>
            <h3>Isi Form dan Ceritakan Kasusnya</h3>
            <p>Klik Menu "Pengaduan" dan lanjutkan dengan klik tombol tambah/"+" untuk mengisi formulir pengaduan yang telah disediakan </p>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="{{ asset('lorahost/img/home/png/007-server-1.png') }}" alt="">
              <h1>3</h1>
            </div>
            <h3>Kirimkan Form Yang sudah terisi</h3>
            <p>Klik tombol "Simpan" untuk mengirim pengaduan anda, anda dapat memantau pengaduan yang dikirim dan melakukan komunikasi secara pribadi dengan administrator WBS  </p>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="img/home/png/002-shield.png" alt="">
            </div>
            <h3>Strong Backup</h3>
            <p>Man greater image shall land air winged replenish whose winged great fifth fruitful Set days sealand over great  </p>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="img/home/png/008-mail.png" alt="">
            </div>
            <h3>Email Service</h3>
            <p>Man greater image shall land air winged replenish whose winged great fifth fruitful Set days sealand over great  </p>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="card-service text-center">
            <div class="service-icon">
              <img src="img/home/png/009-art.png" alt="">
            </div>
            <h3>Data Analysis</h3>
            <p>Man greater image shall land air winged replenish whose winged great fifth fruitful Set days sealand over great  </p>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
    <!--================ Service section end =================-->


    <!--================ Subscribe section start =================-->
    <section class="bg-gray section-padding" style="padding: 40px">
        <div class="container">
            <div class="section-intro pb-85px text-center">
                <h2 data-aos="fade-up" data-aos-duration="2500">Cara Melapor</h2>
                <div class="section-style"></div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card-service text-center rounded" style="background-color: #eb5f013d">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/home/png/006-server.png') }}" alt="">
                            <h1>1</h1>
                        </div>
                        <h3>Login/Register ke Akun Anda</h3>
                        <p class="text-dark">Sebelum melaporkan pengaduan Anda di Whistleblower System KBUMN, terlebih
                            dahulu lakukan
                            login/register </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card-service text-center rounded" style="background-color: #eb5f013d">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/home/png/004-home-page.png') }}" alt="">
                            <h1>2</h1>
                        </div>
                        <h3>Isi Form dan Ceritakan Kasusnya</h3>
                        <p class="text-dark">Klik Menu "Pengaduan" dan lanjutkan dengan klik tombol tambah/"+" untuk
                            mengisi formulir
                            pengaduan yang telah disediakan </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card-service text-center rounded" style="background-color: #eb5f013d">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/home/png/007-server-1.png') }}" alt="">
                            <h1>3</h1>
                        </div>
                        <h3>Kirimkan Form Yang sudah terisi</h3>
                        <p class="text-dark">Klik tombol "Simpan" untuk mengirim pengaduan anda, anda dapat memantau
                            pengaduan yang dikirim
                            dan melakukan komunikasi secara pribadi dengan administrator WBS </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-service text-center rounded" style="background-color: #eb5f013d">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/home/png/009-art.png') }}" alt="">
                            <h1>4</h1>
                        </div>
                        <h3>Kirimkan Form Yang sudah terisi</h3>
                        <p class="text-dark">Klik tombol "Simpan" untuk mengirim pengaduan anda, anda dapat memantau
                            pengaduan yang dikirim
                            dan melakukan komunikasi secara pribadi dengan administrator WBS </p>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card-service text-center rounded">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/icon/Icon White.png') }}" alt="" class="p-2 rounded"
                                width="50">
                            <h1 class="text-white">1</h1>
                        </div>
                        <h3 class="text-white">Login/Registrasi</h3>
                        <p class="text-white">Pelapor Login/Registrasi terlebih dahulu untuk dapat mengisi form pelaporan
                            pelanggaran. Kami menjamin kerahasiaan identitas dan Pelapor dapat melaporkan secara anonim</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-duration="1500">
                    <div class="card-service text-center rounded">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/icon/Icon 2 White.png') }}" alt="" class="p-2 rounded"
                                width="50">
                            <h1 class="text-white">2</h1>
                        </div>
                        <h3 class="text-white">Mengisi form pelaporan</h3>
                        <p class="text-white">Pelapor Mengisi form pelaporan Pelanggaran kemudian mengupload bukti pendukung
                            kronologi kejadian secara lengkap guna mempermudah Admin untuk memverifikasi laporan.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-duration="2000">
                    <div class="card-service text-center rounded">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/icon/Icon 3 White.png') }}" alt="" class="p-2 rounded"
                                width="50">
                            <h1 class="text-white">3</h1>
                        </div>
                        <h3 class="text-white">Submit Form pelaporan</h3>
                        <p class="text-white"> Submit Form pelaporan , dan selanjutnya akan mendapatkan Nomor Tiket
                            Pelaporan
                            dan notifikasi pelaporan yang dikirim lewat email pelapor. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-3" data-aos="fade-up" data-aos-duration="2500">
                    <div class="card-service text-center rounded">
                        <div class="service-icon">
                            <img src="{{ asset('lorahost/img/icon/Icon 4 White.png') }}" alt=""
                                class="p-2 rounded rounded-2" width="50">
                            <h1 class="text-white">4</h1>
                        </div>
                        <h3 class="text-white">Monitoring</h3>
                        <p class="text-white">Nomer tiket pelaporan digunakan untuk monitoring tindak lanjut pelaporan jika
                            sewaktu-waktu Admin membutuhkan data tambahan yang diperlukan untuk verifikasi pelaporan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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


    <!--================ Testimonial section start =================-->
    {{-- <section class="bg-gray section-padding">
    <div class="container">
      <div class="section-intro pb-85px text-center">
        <h2>Happy Customer Says</h2>
        <div class="section-style"></div>
      </div>

      <div class="owl-carousel owl-theme testimonial">
        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial1.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Forden miliard</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial2.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial3.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial2.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial3.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial2.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>

        <div class="testimonial-item">
          <div class="media">
            <img class="testimonial-img" src="img/testimonial/testimonial3.png" alt="">
            <div class="media-body">
              <p>Give dry stars form. Us called an won't winged had land cru abundantly land Midst</p>
              <h4>Manel Djuice</h4>
              <p class="testi-intro">CEO & Founder</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section> --}}
    <!--================ Testimonial section end =================-->

    {{-- <!--================ Feature section start =================-->
    <section class="section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card-feature card-feature-content">
                        <h2>Whistleblowing System</h2>
                        <p>Jika anda melihat atau mengetahui dugaan pelanggaran atau penyalahgunaan wewenang yang dilakukan
                            pegawai di lingkungan Kementerian BUMN.Silahkan adukan dengan mengklik tombol Adukan Sekarang.
                            jika aduan anda memenuhi syarat/kriteria WBS, maka akan diproses lebih lanjut. </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="{{ asset('lorahost/img/home/png/001-unlock.png') }}" alt="">
                        </div>
                        <h3>Secured Server</h3>
                        <p>Let place fly together third creature night at called fowl fill upon the grass </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="{{ asset('lorahost/img/home/png/002-shield.png') }}" alt="">
                        </div>
                        <h3>Backup Facility</h3>
                        <p>Let place fly together third creature night at called fowl fill upon the grass </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="{{ asset('lorahost/img/home/png/003-pencil.png') }}" alt="">
                        </div>
                        <h3>Easy To Customize</h3>
                        <p>Let place fly together third creature night at called fowl fill upon the grass </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="{{ asset('lorahost/img/home/png/004-home-page.png') }}" alt="">
                        </div>
                        <h3>Free Domain Transfer</h3>
                        <p>Let place fly together third creature night at called fowl fill upon the grass </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card-feature text-center">
                        <div class="feature-icon">
                            <img src="{{ asset('lorahost/img/home/png/005-headset.png') }}" alt="">
                        </div>
                        <h3>Live Chat Support</h3>
                        <p>Let place fly together third creature night at called fowl fill upon the grass </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Feature section end =================--> --}}
    <!--================  Dedicated server section start =================-->
    <section class="section-margin">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-duration="1000">Whistleblowing System</h2>
                    <p data-aos="fade-up" data-aos-duration="1500">

                        Sistem yang digunakan untuk menampung, mengolah, dan menindaklanjuti serta membuat pelaporan atas
                        informasi yang disampaikan oleh pelapor mengenai tindakan pelanggaran yang terjadi di lingkungan
                        perusahaan, termasuk pelanggaran terhadap Sistem Manajemen Anti Penyuapan.</p>
                </div>
                <div class="col-lg-7">
                    <div class="text-center" data-aos="fade-up" data-aos-duration="3000">
                        {{-- <img class="img-fluid" src="{{ asset('lorahost/img/home/server.png') }}" alt=""> --}}
                        <div class="row p-2">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/p8JoPHk3pOw?si=74POHjPrdvuOgMVR"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================  Dedicated server section end =================-->
    <!-- Modal -->
    <div class="modal fade" id="verificationModal" tabindex="-1" role="dialog"
        aria-labelledby="verificationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('verification.send') }}" method="post">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verificationModalLabel">Verifikasi Email Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda belum memverifikasi email Anda. Apakah Anda ingin mengirim email verifikasi sekarang?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim
                            Verifikasi Email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-warning" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection
@push('js')
    <script>
        function showVerificationModal() {
            $('#verificationModal').modal('show');
        }
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault(); // Mencegah form dari pengiriman default

                $.ajax({
                    url: '{{ route('search-pengaduan') }}', // Rute ke controller
                    method: 'POST',
                    data: $(this).serialize(), // Mengambil data dari form
                    success: function(response) {
                        $('#result').empty(); // Bersihkan hasil sebelumnya

                        if (response.found) {
                            $('#result').append(
                                '<h5>Status Pengaduan: <span class="badge badge-warning">' +
                                response.status +
                                '</span></h5>');

                        } else {
                            $('#result').append('<div class="alert alert-warning">' + response
                                .message +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                            );
                        }
                    },
                    error: function(xhr) {
                        $('#result').empty();
                        $('#result').append(
                            '<div class="alert alert-danger">Terjadi kesalahan, silakan coba lagi.</div>'
                        );
                    }
                });
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: '{{ route('search-pengaduan') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data.data);
                        displayResult(data);
                    },
                    error: function() {
                        $('#result').html(
                            '<p class="text-danger">Pengaduan tidak ditemukan.</p>');
                    }
                });
            });

            function displayResult(data) {
                $('#result').html(`
                <h5>Status Pengaduan: <span class="badge badge-${data.status.warna}">${data.status.nama}</span></h5>
                <p>Tiket: ${data.data.tiket}</p>
                <a href="/pengaduan/${data.id}" class="btn btn-primary">Lihat Detail</a>
            `);
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endpush
