@extends('apps.admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden shadow-none">
                        <div class="card-body bg-success-subtle text-success fw-semibold d-flex">
                            <marquee class="fs-14">
                                Platform yang memungkinkan individu atau pegawai untuk melaporkan dugaan pelanggaran atau
                                tindakan tidak etis secara anonim atau teridentifikasi.
                            </marquee>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ request()->segment(1) }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a
                                        href="javascript: void(0);">{{ ucwords(request()->segment(1)) }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ ucwords(request()->segment(1)) }} List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            @role('Admin')
                <div class="row">
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-semibold text-muted mb-0">Pengaduan Total</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="">0</span></h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                                    class="ri-arrow-up-line align-middle"></i> 17.32 % </span> vs. previous
                                            month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-4">
                                                <i class="ri-ticket-2-line"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-semibold text-muted mb-0">Pengaduan Pending</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="">0</span></h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                                    class="ri-arrow-down-line align-middle"></i> 0.96 % </span> vs. previous
                                            month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-4">
                                                <i class="mdi mdi-timer-sand"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-semibold text-muted mb-0">Pengaduan Selesai</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="">0</span></h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                                    class="ri-arrow-down-line align-middle"></i> 3.87 % </span> vs. previous
                                            month</p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-4">
                                                <i class="ri-shopping-bag-line"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xxl-3 col-sm-6">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="fw-semibold text-muted mb-0">Pengaduan Dihapus</p>
                                        <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                data-target="">0</span></h2>
                                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                                    class="ri-arrow-up-line align-middle"></i> 1.09 % </span> vs. previous
                                            month
                                        </p>
                                    </div>
                                    <div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-4">
                                                <i class="ri-delete-bin-line"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="ticketsList">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0 flex-grow-1">Pengaduan</h5>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button class="btn btn-primary" onclick="createPengaduan()"><i
                                                    class="ri-add-line align-bottom me-1"></i> Buat
                                                {{ ucwords(request()->segment(1)) }}</button>
                                            <button class="btn btn-soft-danger" id="remove-actions"
                                                onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border border-dashed border-end-0 border-start-0">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-xxl-5 col-sm-12">
                                            <div class="search-box">
                                                <input type="text" class="form-control search bg-light border-light"
                                                    placeholder="Search for ticket details or something...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <input type="text" class="form-control bg-light border-light"
                                                data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true"
                                                id="demo-datepicker" placeholder="Select date range">
                                        </div>
                                        <!--end col-->

                                        <div class="col-xxl-3 col-sm-4">
                                            <div class="input-light">
                                                <select class="form-control" data-choices data-choices-search-false
                                                    name="choices-single-default" id="idStatus">
                                                    <option value="">Status</option>
                                                    <option value="all" selected>All</option>
                                                    <option value="Open">Open</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                    <option value="Closed">Closed</option>
                                                    <option value="New">New</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-1 col-sm-4">
                                            <button type="button" class="btn btn-info w-100" onclick="SearchData();"> <i
                                                    class="ri-equalizer-fill me-1 align-bottom"></i>
                                                Filters
                                            </button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end card-body-->
                            <div class="card-body">
                                <div class="table-responsive table-card mb-4">
                                    <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 40px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </th>
                                                <th class="sort">ID</th>
                                                <th class="sort">Jenis Pelanggaran</th>
                                                <th class="sort">Waktu Pelanggaran</th>
                                                <th class="sort">Tempat Pelanggaran</th>
                                                <th class="sort">Konsekuensi</th>
                                                <th class="sort">Status</th>
                                                <th class="sort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all" id="ticket-list-data">
                                            @if ($pengaduan)
                                                @foreach ($pengaduan as $row)
                                                    <tr>
                                                        <th scope="row">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="checkAll" value="option1">
                                                            </div>
                                                        </th>
                                                        <td class="id"><a
                                                                href="{{ route('pengaduan.show', Crypt::encrypt($row->id)) }}"
                                                                onclick="ViewTickets(this)"
                                                                class="fw-medium link-primary">#{{ $row->tiket }}</a></td>
                                                        <td>
                                                            @foreach (json_decode($row->jenis_pelanggaran) as $item)
                                                                <ul>
                                                                    <li>{{ $item }}</li>
                                                                </ul>
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $row->waktu_pelanggaran }}</td>
                                                        <td>{{ $row->tempat_pelanggaran }}</td>
                                                        <td>{{ $row->konsekuensi }}</td>
                                                        <td class="status"><span
                                                                class="badge bg-{{ $row->statusPengaduan->warna }}-subtle text-{{ $row->statusPengaduan->warna }} text-uppercase">{{ $row->statusPengaduan->nama }}</span>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><button class="dropdown-item showPengaduan"
                                                                            data-id="{{ Crypt::encrypt($row->id) }}"><i
                                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                            View</button></li>
                                                                    <li><a class="dropdown-item edit-item-btn"
                                                                            href="#showModal" data-bs-toggle="modal"><i
                                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit</a></li>
                                                                    <li>
                                                                        @if ($row->status !== 1)
                                                                            <button class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deletePengaduan{{ $row->id }}"><i
                                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                Delete</button>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('apps.admin.pengaduan.components.modal-delete')
                                                @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a"
                                                style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ Tickets We did not find
                                                any Tickets for you search.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!-- container-fluid -->
        </div>
    @endsection
    @push('js')
        <script src="{{ asset('interactive/assets/libs/list.js/list.min.js') }}"></script>
        <script src="{{ asset('interactive/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
        <script src="{{ asset('interactive/assets/js/pages/ticketlist.init.js') }}"></script>
        <script src="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            function createPengaduan() {
                window.location.href = "{{ route('pengaduan.create') }}";
            }
        </script>
        <script>
            $('#demo-datepicker').flatpickr({
                dateFormat: "Y-m-d",
                altInput: true,
                altFormat: "F j, Y",
            })
            $('.showPengaduan').click(function() {
                const id = $(this).data('id');
                window.location.href = `/pengaduan/${id}`;
            })
        </script>
    @endpush
