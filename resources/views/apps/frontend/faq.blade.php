@extends('layouts.app')
@push('css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush
@section('content')
    <!--================ Banner SM Section start =================-->
    <section data-aos="fade-up" data-aos-duration="1000" class="hero-banner hero-banner-sm text-center"
        style="background-image: url({{ asset('lorahost/img/banner/6.png') }})">
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
    <section class="section-padding" data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="pb-85px text-center">
                <h2>Pertanyaan yang sering muncul</h2>
                <div class="section-style"></div>
            </div>
            <div class="accordion" id="accordionExample">
                @php
                    $faq = App\Models\Faq::get();
                @endphp
                @foreach ($faq as $index => $item)
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    style="text-decoration: none; color: #2826ac;"
                                    data-target="#collapse{{ $index }}" aria-expanded="true"
                                    aria-controls="{{ $index }}">
                                    {!! $item->faq !!}
                                </button>
                            </h5>
                        </div>

                        <div id="collapse{{ $index }}" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                {!! $item->answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
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
@push('js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endpush
