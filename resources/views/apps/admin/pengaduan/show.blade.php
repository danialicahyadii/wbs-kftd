@extends('apps.admin.layouts.app')
@push('css')
    <link href="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" />
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-info-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ asset('interactive/assets/images/companies/img-4.png') }}"
                                                            alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">#{{ $laporan->tiket }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-building-line align-bottom me-1"></i>
                                                            Tempat Pelanggaran : {{ $laporan->tempat_pelanggaran }}
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Waktu Pelanggaran : <span
                                                                class="fw-semibold">{{ \Carbon\Carbon::parse($laporan->waktu_pelanggaran)->format('d M, Y') }}</span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Waktu Pelaporan : <span
                                                                class="fw-semibold">{{ \Carbon\Carbon::parse($laporan->created_at)->format('d M, Y') }}</span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Selesai Pelaporan : <span class="fw-semibold">
                                                                @if ($laporan->finish_date)
                                                                    {{ \Carbon\Carbon::parse($laporan->finish_date)->format('d M, Y') }}
                                                                @else
                                                                    -
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div
                                                            class="badge rounded-pill bg-{{ $laporan->statusPengaduan->warna }} fs-12">
                                                            {{ $laporan->statusPengaduan->nama }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="hstack gap-1 flex-wrap">
                                            <button type="button" class="btn py-0 fs-16 text-body"
                                                onclick="window.print()">
                                                <i class="ri-printer-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist" id="myTab">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                            role="tab">
                                            Overview
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents"
                                            role="tab">
                                            Documents
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-activities"
                                            role="tab">
                                            Activities
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted border-bottom border-bottom-dashed">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Kronologi</h6>
                                                {{-- <p>{!! $laporan->kronologi !!}</p> --}}
                                                {!! $laporan->kronologi !!}
                                            </div>
                                            <div class="text-muted mt-4 border-bottom border-bottom-dashed">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Jenis Pelanggaran</h6>
                                                <ul class="ps-4 vstack gap-2">
                                                    @foreach (json_decode($laporan->jenis_pelanggaran) as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="text-muted mt-4">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Konsekuensi</h6>
                                                <p>{{ $laporan->konsekuensi }}</p>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Komentar</h4>
                                            {{-- <div class="flex-shrink-0">
                                                <div class="dropdown card-header-dropdown">
                                                    <a class="text-reset dropdown-btn" href="#"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <span class="text-muted">Recent<i
                                                                class="mdi mdi-chevron-down ms-1"></i></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Recent</a>
                                                        <a class="dropdown-item" href="#">Top Rated</a>
                                                        <a class="dropdown-item" href="#">Previous</a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            {{-- <div data-simplebar style="height: 300px;" class="px-3 mx-n3 mb-2"> jika sudah ada datanya buatkan style height nya 300px --}}
                                            <div data-simplebar
                                                @if ($laporan->komentar->count() > 5) style="height: 300px;" @endif
                                                class="px-3 mx-n3 mb-2">
                                                @if ($laporan->komentar->count() == 0)
                                                    <div>
                                                        <div class="text-center">
                                                            <h5 class="mt-2 text-muted">Belum ada komentar</h5>
                                                        </div>
                                                    </div>
                                                @else
                                                    @foreach ($laporan->komentar as $item)
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="{{ $item->user->avatar ? Storage::url($item->user->avatar) : asset('interactive/assets/images/avatar.png') }}"
                                                                    alt="" class="avatar-xs rounded-circle" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-14">
                                                                    @if ($item->user_id == $laporan->user_id)
                                                                        {{ $laporan->nama_pelapor }}
                                                                    @else
                                                                        {{ $item->user->name }}
                                                                    @endif
                                                                    <small
                                                                        class="text-muted ms-2">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y - H:m') }}</small>
                                                                </h5>
                                                                <p class="text-muted">{{ $item->komentar }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                {{-- <div class="d-flex mb-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-6.jpg" alt=""
                                                            class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-14">Donald Palmer <small class="text-muted ms-2">24
                                                                Dec 2021 - 05:20PM</small></h5>
                                                        <p class="text-muted">If you have further questions, please contact
                                                            Customer Support from the “Action Menu” on your <a
                                                                href="javascript:void(0);"
                                                                class="text-decoration-underline">Online Order Support</a>.
                                                        </p>
                                                        <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                                                class="mdi mdi-reply"></i> Reply</a>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-10.jpg" alt=""
                                                            class="avatar-xs rounded-circle" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h5 class="fs-14">Alexis Clarke <small class="text-muted ms-2">26
                                                                min ago</small></h5>
                                                        <p class="text-muted">Your <a href="javascript:void(0)"
                                                                class="text-decoration-underline">Online Order Support</a>
                                                            provides you with the most current status of your order. To help
                                                            manage your order refer to the “Action Menu” to initiate return,
                                                            contact Customer Support and more.</p>
                                                        <div class="row g-2 mb-3">
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="assets/images/small/img-4.jpg" alt=""
                                                                    class="img-fluid rounded">
                                                            </div>
                                                            <div class="col-lg-1 col-sm-2 col-6">
                                                                <img src="assets/images/small/img-5.jpg" alt=""
                                                                    class="img-fluid rounded">
                                                            </div>
                                                        </div>
                                                        <a href="javascript: void(0);"
                                                            class="badge text-muted bg-light"><i
                                                                class="mdi mdi-reply"></i> Reply</a>
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0">
                                                                <img src="assets/images/users/avatar-6.jpg" alt=""
                                                                    class="avatar-xs rounded-circle" />
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-14">Donald Palmer <small
                                                                        class="text-muted ms-2">8 sec ago</small></h5>
                                                                <p class="text-muted">Other shipping methods are available
                                                                    at checkout if you want your purchase delivered faster.
                                                                </p>
                                                                <a href="javascript: void(0);"
                                                                    class="badge text-muted bg-light"><i
                                                                        class="mdi mdi-reply"></i> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <form class="mt-2" action="{{ route('pengaduan.update', $laporan->id) }}"
                                                id="komentar" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="exampleFormControlTextarea1"
                                                            class="form-label text-body">Tinggalkan Komentar</label>
                                                        <textarea class="form-control bg-light border-light" name="komentar" rows="3"
                                                            placeholder="Tinggalkan Komentarmu..." onkeypress="submitOnEnter(event)"></textarea>
                                                    </div>
                                                    <div class="col-12 text-end">
                                                        {{-- <button type="button"
                                                            class="btn btn-ghost-secondary btn-icon waves-effect me-1"><i
                                                                class="ri-attachment-line fs-16"></i></button> --}}
                                                        {{-- <a href="#" onclick="comment()"
                                                            class="btn btn-success">Post
                                                            Komentar</a> --}}
                                                        <button onclick="comment()" class="btn btn-info">Post</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">
                                    @role('Admin')
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Update Status</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="clearfix">
                                                        <p class="fw-semibold float-start">Status:</p>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#statusAlbert"
                                                            class="btn btn-secondary float-end">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    @endrole
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Terlapor
                                            </h4>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-soft-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    @if ($laporan->status !== 1) onclick="lock({{ json_encode($laporan->statusPengaduan->nama) }})" @else data-bs-target="#terlapor" @endif><i
                                                        class="ri-add-line me-1 align-bottom"></i> Add</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($laporan->terlapor as $item)
                                                <div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="{{ asset('interactive/assets/images/avatar.png') }}"
                                                                alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-15 mb-1">{{ $item->nama }}</h5>
                                                                <p class="fs-13 text-muted mb-0">{{ $item->jabatan }} -
                                                                    Unit {{ $item->unit }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" onclick="comment()"
                                                                class="btn btn-sm btn-outline-danger"><i
                                                                    class="ri-delete-bin-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!-- end card body -->
                                    </div>
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Pihak-pihak terlibat
                                            </h4>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-soft-danger btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#pihakTerlibat"><i
                                                        class="ri-add-line me-1 align-bottom"></i> Add</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($laporan->pihakTerlibat as $item)
                                                <div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="{{ asset('interactive/assets/images/avatar.png') }}"
                                                                alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-15 mb-1">{{ $item->nama }}</h5>
                                                                <p class="fs-13 text-muted mb-0">{{ $item->jabatan }} -
                                                                    Unit {{ $item->unit }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" onclick="comment()"
                                                                class="btn btn-sm btn-outline-danger"><i
                                                                    class="ri-delete-bin-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!-- end card body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">Saksi-saksi
                                            </h4>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-soft-warning btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#saksiSaksi"><i
                                                        class="ri-add-line me-1 align-bottom"></i> Add</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($laporan->saksiSaksi as $item)
                                                <div>
                                                    <div class="d-flex align-items-center py-3">
                                                        <div class="avatar-xs flex-shrink-0 me-3">
                                                            <img src="{{ asset('interactive/assets/images/avatar.png') }}"
                                                                alt="" class="img-fluid rounded-circle">
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="fs-15 mb-1">{{ $item->nama }}</h5>
                                                                <p class="fs-13 text-muted mb-0">{{ $item->jabatan }} -
                                                                    Unit {{ $item->unit }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0 ms-2">
                                                            <button type="button" onclick="comment()"
                                                                class="btn btn-sm btn-outline-danger"><i
                                                                    class="ri-delete-bin-line align-middle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!-- end card body -->
                                    </div>

                                    <div class="card">
                                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                                            <h4 class="card-title mb-0 flex-grow-1">File Bukti
                                            </h4>
                                            <div class="flex-shrink-0">
                                                <button type="button" class="btn btn-soft-info btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#buktiFile"><i
                                                        class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="vstack gap-2">
                                                @forelse ($laporan->fileBukti->take(3) as $item)
                                                    <div class="border rounded border-dashed p-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm">
                                                                    @if ($item->tipe == 'xlsx')
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-file-excel-fill"></i>
                                                                        </div>
                                                                    @elseif ($item->tipe == 'jpeg')
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-image-2-fill"></i>
                                                                        </div>
                                                                    @elseif ($item->tipe == 'png')
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-image-2-fill"></i>
                                                                        </div>
                                                                    @elseif ($item->tipe == 'pdf')
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-file-pdf-fill"></i>
                                                                        </div>
                                                                    @elseif ($item->tipe == 'docx')
                                                                        <div
                                                                            class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-file-word-fill"></i>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="fs-15 mb-1"><a
                                                                        href="{{ asset('storage/' . $item->path) }}"
                                                                        target="_blank"
                                                                        class="text-body text-truncate d-block">{{ $item->nama }}</a>
                                                                </h5>
                                                                <div>
                                                                    {{ $item->ukuran }}
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <div class="d-flex gap-1">
                                                                    <button type="button"
                                                                        onclick="download('{{ route('file.download', ['filePath' => $item->path, 'fileExtension' => $item->tipe]) }}')"
                                                                        class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                            class="ri-download-2-line"></i></button>
                                                                    <button
                                                                        onclick="event.preventDefault(); document.getElementById('remove-bukti').submit();"
                                                                        class="btn btn-icon text-muted btn-sm fs-18"
                                                                        type="button" aria-expanded="false">
                                                                        <i class="ri-delete-bin-fill"></i>
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('file-bukti.destroy', $item->id) }}"
                                                                        id="remove-bukti" style="display: none;"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="border rounded border-dashed p-2">
                                                        <!-- Vertical alignment (align-items-center) -->
                                                        <div class="row align-items-center text-center">
                                                            <div class="col-12">
                                                                <p class="text-muted">Belum Ada File Bukti</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
                                                <div class="mt-2 text-center">
                                                    <button type="button" class="btn btn-success document-all"
                                                        href="#project-documents">Lihat Semua</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                    {{-- @endif --}}
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-documents" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1">Documents</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive table-card"
                                                @if ($laporan->fileBukti->count() == 1) style="height: 250px" @endif>
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">File Name</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Upload Date</th>
                                                            <th scope="col" style="width: 120px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($laporan->fileBukti as $item)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="avatar-sm">
                                                                            @if ($item->tipe == 'xlsx')
                                                                                <div
                                                                                    class="avatar-title bg-light text-success rounded fs-24">
                                                                                    <i class="ri-file-excel-fill"></i>
                                                                                </div>
                                                                            @elseif ($item->tipe == 'jpeg')
                                                                                <div
                                                                                    class="avatar-title bg-light text-danger rounded fs-24">
                                                                                    <i class="ri-image-2-fill"></i>
                                                                                </div>
                                                                            @elseif ($item->tipe == 'png')
                                                                                <div
                                                                                    class="avatar-title bg-light text-danger rounded fs-24">
                                                                                    <i class="ri-image-2-fill"></i>
                                                                                </div>
                                                                            @elseif ($item->tipe == 'pdf')
                                                                                <div
                                                                                    class="avatar-title bg-light text-danger rounded fs-24">
                                                                                    <i class="ri-file-pdf-fill"></i>
                                                                                </div>
                                                                            @elseif ($item->tipe == 'docx')
                                                                                <div
                                                                                    class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                    <i class="ri-file-word-fill"></i>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="ms-3 flex-grow-1">
                                                                            <h5 class="fs-14 mb-0"><a
                                                                                    href="javascript:void(0)"
                                                                                    class="text-body">{{ $item->nama }}</a>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ strtoupper($item->tipe) }} File</td>
                                                                <td>{{ $item->ukuran }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                                                </td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            class="btn btn-soft-secondary btn-sm btn-icon"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="true">
                                                                            <i class="ri-more-fill"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a>
                                                                            </li>
                                                                            <li class="dropdown-divider"></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- <div class="text-center mt-3">
                                                <a href="javascript:void(0);" class="text-success "><i
                                                        class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load
                                                    more </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->
                        <div class="tab-pane fade" id="project-activities" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Activities</h5>
                                    <div class="acitivity-timeline py-3">
                                        <div class="acitivity-item d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('interactive/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Anonymous <span
                                                        class="badge bg-primary-subtle text-primary align-middle">Created</span>
                                                </h6>
                                                <p class="text-muted mb-2"> <i
                                                        class="ri-file-text-line align-middle ms-2"></i> Pengaduan telah
                                                    dibuat dengan nomer tiket
                                                    #24110492132.</p>
                                                <small class="mb-0 text-muted">Today</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    A
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Admin <span
                                                        class="badge bg-warning-subtle text-warning align-middle">Verifikasi</span>
                                                </h6>
                                                <p class="text-muted mb-2"><i
                                                        class="ri-file-text-line align-middle ms-2"></i> Pengaduan sedang
                                                    di Verifikasi</p>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    A
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Admin <span
                                                        class="badge bg-info-subtle text-info align-middle">Monitoring
                                                        & Evaluasi</span>
                                                </h6>
                                                <p class="text-muted mb-2"><i
                                                        class="ri-file-text-line align-middle ms-2"></i> Pengaduan sedang
                                                    dilakukan monitoring dan Evaluasi</p>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    A
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Admin <span
                                                        class="badge bg-secondary-subtle text-secondary align-middle">Investigasi</span>
                                                </h6>
                                                <p class="text-muted mb-2"><i
                                                        class="ri-file-text-line align-middle ms-2"></i> Pengaduan sedang
                                                    dilakukan investigasi</p>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    A
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Admin <span
                                                        class="badge bg-danger-subtle text-danger align-middle">Sanksi</span>
                                                </h6>
                                                <p class="text-muted mb-2"><i
                                                        class="ri-file-text-line align-middle ms-2"></i> Terlapor sedang
                                                    diberikan sanksi</p>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                        <div class="acitivity-item py-3 d-flex">
                                            <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                    A
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Admin <span
                                                        class="badge bg-success-subtle text-success align-middle">Selesai</span>
                                                </h6>
                                                <p class="text-muted mb-2"><i
                                                        class="ri-file-text-line align-middle ms-2"></i> Pengaduan telah di
                                                    selesaikan.</p>
                                                <small class="mb-0 text-muted">Yesterday</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end tab pane -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('apps.admin.pengaduan.components.modal-add-terlapor')
    @include('apps.admin.pengaduan.components.modal-add-terlibat')
    @include('apps.admin.pengaduan.components.modal-add-saksi')
    @include('apps.admin.pengaduan.components.modal-add-bukti')
    @include('apps.admin.pengaduan.components.modal-status')
@endsection
@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
    {{-- <script src="{{ asset('interactive/assets/js/pages/ticketdetail.init.js') }}"></script> --}}
    <!-- choices.js -->
    <!-- Sweet Alert css-->
    <!-- Sweet Alerts js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        function submitOnEnter(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault(); // Prevent newline
                document.getElementById('komentar').submit();
                // comment(); //
            }
        }

        function comment() {
            Swal.fire({
                html: '<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Oops...! Masih Tahap Pengembangan !</h4></div></div>',
                showCancelButton: !0,
                showConfirmButton: !1,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Oke",
                buttonsStyling: !1,
                showCloseButton: !0,
            });
        }

        function lock(nama) {
            Swal.fire({
                html: `<div class="mt-3"><lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15"><h4>Status Pengaduan Telah di ${nama}</h4><p class="fw-12">Pengaduan anda telah dikunci !</p></div></div>`,
                showCancelButton: !0,
                showConfirmButton: !1,
                cancelButtonClass: "btn btn-primary w-xs mb-1",
                cancelButtonText: "Oke",
                buttonsStyling: !1,
                showCloseButton: !0,
            });
        }

        function printPdf() {
            window.print()
        }

        function downloadFile(url) {
            window.location.href = url;
        }

        function download(url) {
            window.location.href = url;
        }

        function remove(url) {
            window.location.href = url;
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }

            $('#myTab a').on('click', function(e) {
                localStorage.setItem('activeTab', $(this).attr('href'));
            });
        });

        $('.document-all').on('click', function() {
            var tabId = $(this).attr('href');
            console.log(tabId);
            localStorage.setItem('activeTab', tabId);

            $('#myTab a[href="' + tabId + '"]').tab('show');

            $('#myTab a').on('click', function(e) {
                localStorage.setItem('activeTab', $(this).attr('href'));
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.tes').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
@endpush
