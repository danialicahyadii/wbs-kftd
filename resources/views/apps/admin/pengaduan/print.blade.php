@extends('apps.admin.layouts.app')
@push('css')
    <link href="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" />
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ ucwords(request()->segment(1)) }} Print</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a
                                        href="{{ url(request()->segment(1)) }}">{{ ucwords(request()->segment(1)) }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ ucwords(request()->segment(1)) }} Print</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="card" id="demo">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header border-bottom-dashed p-4">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <img src="{{ asset('interactive/assets/images/logo_kftd.png') }}"
                                                class="card-logo card-logo-dark" alt="logo dark" height="80">
                                            <img src="assets/images/logo-light.png" class="card-logo card-logo-light"
                                                alt="logo light" height="17">
                                            <div class="mt-sm-5 mt-4">
                                                <h6 class="text-muted text-uppercase fw-semibold">Address</h6>
                                                <p class="text-muted mb-1" id="address-details">Budi Utomo 1, Jakarta</p>
                                                <p class="text-muted mb-0" id="zip-code">
                                                    10710</p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 mt-sm-0 mt-3">
                                            <h6><span class="text-muted fw-normal">Email:</span><span
                                                    id="email">wbs@kftd.co.id</span></h6>
                                            <h6><span class="text-muted fw-normal">Website:</span> <a
                                                    href="https://wbs.kftd.co.id/" class="link-primary" target="_blank"
                                                    id="website">wbs.kftd.co.id</a></h6>
                                            <h6 class="mb-0"><span class="text-muted fw-normal">Contact No:
                                                </span><span id="contact-no"> 081313138812</span></h6>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-header-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Tiket</p>
                                            <h5 class="fs-15 mb-0">#<span id="invoice-no">{{ $pengaduan->tiket }}</span>
                                            </h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                            <h5 class="fs-15 mb-0"><span
                                                    id="invoice-date">{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d M, Y') }}</span>
                                                <small class="text-muted"
                                                    id="invoice-time">{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('h:i A') }}</small>
                                            </h5>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Status Pengaduan</p>
                                            <span
                                                class="badge bg-{{ $pengaduan->statusPengaduan->warna }}-subtle text-{{ $pengaduan->statusPengaduan->warna }} fs-11"
                                                id="payment-status">{{ $pengaduan->statusPengaduan->nama }}</span>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-3 col-6">
                                            <p class="text-muted mb-2 text-uppercase fw-semibold">Tempat Pelanggaran</p>
                                            <h5 class="fs-15 mb-0"><span
                                                    id="total-amount">{{ $pengaduan->tempat_pelanggaran }}</span></h5>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4 border-top border-top-dashed">
                                    <div class="row text-muted">
                                        <div class="col-12">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Kronologi
                                            </h6>
                                            <p>{!! $pengaduan->kronologi !!}</p>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="card-body p-4 border-top border-top-dashed">
                                    <div class="row g-3 text-muted">
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Jenis Pelanggaran
                                            </h6>
                                            <p class="text-muted mb-1">
                                            <ul>
                                                @foreach (json_decode($pengaduan->jenis_pelanggaran) as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                            </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold mb-3">Konsekuensi
                                            </h6>
                                            <p class="text-muted mb-1">{{ $pengaduan->konsekuensi }}</p>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                            @if ($pengaduan->terlapor->isNotEmpty())
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <h6 class="text-muted text-uppercase text-center fw-semibold mb-3">Terlapor
                                        </h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    @foreach ($pengaduan->terlapor as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td class="text-start">
                                                                <span class="fw-semibold">{{ $item->nama }}</span>
                                                                <p class="text-muted mb-0">{{ $item->jabatan }}</p>
                                                            </td>
                                                            <td>{{ $item->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table><!--end table-->
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div><!--end col-->
                            @endif
                            @if ($pengaduan->pihakTerlibat->isNotEmpty())
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <h6 class="text-muted text-uppercase text-center fw-semibold mb-3">Pihak pihak
                                            Terlibat
                                        </h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    @foreach ($pengaduan->pihakTerlibat as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td class="text-start">
                                                                <span class="fw-semibold">{{ $item->nama }}</span>
                                                                <p class="text-muted mb-0">{{ $item->jabatan }}</p>
                                                            </td>
                                                            <td>{{ $item->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table><!--end table-->
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div><!--end col-->
                            @endif
                            <div class="col-lg-12">
                                <div class="card-body p-4">
                                    @if ($pengaduan->saksiSaksi->isNotEmpty())
                                        <h6 class="text-muted text-uppercase text-center fw-semibold mb-3">Saksi -
                                            Saksi
                                        </h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">#</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Unit</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    @foreach ($pengaduan->saksiSaksi as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td class="text-start">
                                                                <span class="fw-semibold">{{ $item->nama }}</span>
                                                                <p class="text-muted mb-0">{{ $item->jabatan }}</p>
                                                            </td>
                                                            <td>{{ $item->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table><!--end table-->
                                        </div>
                                    @endif
                                    <div class="mt-4">
                                        <div class="alert alert-info">
                                            <p class="mb-0">
                                                <span id="note"><span class="fw-semibold">NOTES:</span>
                                                    Kami menjamin kerahasiaan identitas Pelapor dan saksi dan memberikan
                                                    perlindungan terhadap perlakuan yang merugikan Pelapor, seperti:
                                                    <ul>
                                                        <li>Pemecatan yang tidak adil</li>
                                                        <li>Penurunan jabatan atau grade</li>
                                                        <li>Pelecehan atau diskriminasi dalam segala bentuknya</li>
                                                        <li>Catatan yang merugikan dalam file data pribadinya</li>
                                                        <li>Perlidungan dan tuntutan pidana dan/atau perdata</li>
                                                        <li>Perlindungan atas keamanan pribadi dan/atau keluarga Pelapor dan
                                                            ancaman fisik dan/atau mental</li>
                                                        <li>Perlindungan terhadap harta Pelapor</li>
                                                        <li>Kerahasiaan identitas Pelapor</li>
                                                        <li>Pemberian keterangan tanpa bertatap muka dengan Terlapor</li>
                                                    </ul>
                                                    Terimakasih telah melaporkan Pelanggaran via Whistleblowing System Kimia
                                                    Farma Trading & Distribution.
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                        <a href="javascript:window.print()" class="btn btn-info"><i
                                                class="ri-printer-line align-bottom me-1"></i> Print</a>
                                        {{-- <a href="javascript:downloadPDF()" class="btn btn-primary"><i
                                                class="ri-download-2-line align-bottom me-1"></i> Download</a> --}}
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div><!-- container-fluid -->
    </div><!-- End Page-content -->
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        window.onload = function() {
            window.print();
        };

        function downloadPDF() {
            var element = document.getElementById('demo'); // Target element to convert to PDF
            html2pdf()
                .from(element)
                .save('pengaduan.pdf'); // The file name for download
        }
    </script>
@endpush
