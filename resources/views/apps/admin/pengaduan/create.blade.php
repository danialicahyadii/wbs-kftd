@extends('apps.admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Form Pengaduan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a
                                        href="{{ url(request()->segment(1)) }}">{{ ucwords(request()->segment(1)) }}</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Pengaduan</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <p class="text-muted">Data Pelapor</p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <div class="align-items-center d-flex">
                                                <label class="form-label flex-grow-1">Nama Lengkap
                                                    (Pelapor)</label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="anonymousCheckbox">
                                                    <label class="form-check-label" for="anonymousCheckbox">Anonym</label>
                                                </div>
                                            </div>
                                            <input type="text" name="nama_pelapor" class="form-control"
                                                value="{{ Auth::user()->name }}" id="nameInput" placeholder="Masukkan Nama"
                                                id="firstNameinput" style="background-color: var(--vz-tertiary-bg)"
                                                readonly>
                                            @error('nama_pelapor')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="lastNameinput" class="form-label">No.HP (Pelapor) <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="no_hp_pelapor" id="lastNameinput"
                                                class="form-control" placeholder="+(62) 8212 45123">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Alamat/Tempat Tugas
                                                (Pelapor)</label>
                                            <input type="text" name="alamat_pelapor" class="form-control"
                                                placeholder="Masukkan alamat">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label for="emailidInput" class="form-label">Email Address</label>
                                            <input type="email" class="form-control"
                                                value="{{ substr(auth()->user()->email, 0, 3) }}{{ str_repeat('•', strlen(auth()->user()->email) - 6) }}{{ substr(auth()->user()->email, -3) }}"disabled>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="clearfix mt-3">
                                    <p class="text-muted float-start">Data Terlapor</p>
                                    <button type="button" id="removeTerlapor"
                                        class="btn btn-soft-danger btn-sm float-end d-none">
                                        <i class="ri-subtract-fill"></i>
                                    </button>
                                    <button type="button" id="addTerlapor" class="btn btn-info btn-sm float-end me-1">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                                <div class="terlapor-container">
                                    <div class="row data-terlapor">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama (Terlapor) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="terlapor[0][nama]" class="form-control"
                                                    placeholder="Masukkan nama terlapor">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Jabatan/Unit (Terlapor) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="terlapor[0][jabatan]" class="form-control"
                                                    placeholder="Masukkan Bagian/Unit terlapor">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Unit Kerja (Terlapor) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="terlapor[0][unit]"
                                                    placeholder="Masukkan Unit Kerja Terlapor">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                                <p class="text-muted mt-3">Detail Pengaduan</p>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Kronologi <span class="text-danger">*</span></label>
                                            <textarea class="ckeditor-classic" name="kronologi" cols="30" rows="10"></textarea>
                                            {{-- <div class="ckeditor-classic"></div> --}}
                                            {{-- <textarea name="kronologi" class="form-control" id="" cols="30" rows="15"></textarea> --}}
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Jenis Pelanggaran <span
                                                            class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="benturanKepentingan" value="Benturan Kepentingan"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="benturanKepentingan">
                                                                    Benturan Kepentingan
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="indispliner" value="Indispliner"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="indispliner">
                                                                    Indispliner
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="penyuapanKecurangan"
                                                                    value="Penyuapan dan Kecurangan"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="penyuapanKecurangan">
                                                                    Penyuapan dan Kecurangan
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="etikaMoral" value="Pelanggaran Etika dan Moral"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="etikaMoral">
                                                                    Pelanggaran Etika dan Moral
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="gratifikasi" value="Gratifikasi"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="gratifikasi">
                                                                    Gratifikasi
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-check form-check form-check-primary mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="pelanggaranProsedur" value="Pelanggaran Prosedur"
                                                                    name="jenis_pelanggaran[]">
                                                                <label class="form-check-label" for="pelanggaranProsedur">
                                                                    Pelanggaran Prosedur
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Perkiraan Waktu
                                                        Pelanggaran <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control date"
                                                        name="waktu_pelanggaran" placeholder="Pilih Tanggal Kejadian">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Tempat Pelanggaran
                                                        <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="tempat_pelanggaran"
                                                        placeholder="Masukkan Tempat Pelanggaran">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Perkiraan jumlah/
                                                        nilai kerugian perusahaan/
                                                        konsekuensi yang diterima perusahaan</label>
                                                    <input type="text" class="form-control" name="konsekuensi"
                                                        placeholder="Masukkan Perkiraan Kerugian/Konsekuensi yang diterima Perusahaan">
                                                </div>
                                            </div><!--end col-->
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="clearfix mt-3">
                                    <p class="text-muted float-start">Pihak Terlibat</p>
                                    <button type="button" id="removeTerlibat"
                                        class="btn btn-soft-danger btn-sm float-end d-none">
                                        <i class="ri-subtract-fill"></i>
                                    </button>
                                    <button type="button" id="addTerlibat" class="btn btn-info btn-sm float-end me-1">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                                <div class="terlibat-container">
                                    <div class="row data-terlibat">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama (Terlibat) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="terlibat[0][nama]" class="form-control"
                                                    placeholder="Masukkan Nama Terlibat">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Jabatan/Unit (Terlibat) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="terlibat[0][jabatan]" class="form-control"
                                                    placeholder="Masukkan Bagian/Unit Terlibat">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Unit Kerja (Terlibat) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="terlibat[0][unit]"
                                                    placeholder="Masukkan Unit Kerja Terlibat">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                                <div class="clearfix mt-3">
                                    <p class="text-muted float-start">Saksi - saksi</p>
                                    <button type="button" id="removeSaksi"
                                        class="btn btn-soft-danger btn-sm float-end d-none">
                                        <i class="ri-subtract-fill"></i>
                                    </button>
                                    <button type="button" id="addSaksi" class="btn btn-info btn-sm float-end me-1">
                                        <i class="ri-add-fill"></i>
                                    </button>
                                </div>
                                <div class="saksi-container">
                                    <div class="row data-saksi">
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama (Saksi) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="saksi[0][nama]" class="form-control"
                                                    placeholder="Masukkan Nama Saksi">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Jabatan/Unit (Saksi) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="saksi[0][jabatan]" class="form-control"
                                                    placeholder="Masukkan Bagian/Unit Saksi">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-4 col-sm-12">
                                            <div class="mb-3">
                                                <label class="form-label">Unit Kerja (Saksi) <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="saksi[0][unit]"
                                                    placeholder="Masukkan Unit Kerja Saksi">
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                                <p class="text-muted">File Bukti</p>
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label for="">Nama File</label>
                                            <input type="text" name="bukti[0][nama_file]" class="form-control"
                                                placeholder="Masukkan Nama File yang Ingin Dimasukkan">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label class="form-label">File</label>
                                            <input type="file" name="bukti[0][file]" class="form-control"
                                                placeholder="Enter your firstname" id="firstNameinput">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-2">
                                        <button type="button" class="btn btn-info btn-icon" id="addAttachment"
                                            style="margin-top: 13px;"><i class="ri-add-fill"></i></button>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off">
                            <div class="modal-body">
                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID"
                                        readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Customer Name</label>
                                    <input type="text" id="customername-field" class="form-control"
                                        placeholder="Enter Name" required />
                                    <div class="invalid-feedback">Please enter a customer name.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" id="email-field" class="form-control"
                                        placeholder="Enter Email" required />
                                    <div class="invalid-feedback">Please enter an email.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Phone</label>
                                    <input type="text" id="phone-field" class="form-control"
                                        placeholder="Enter Phone no." required />
                                    <div class="invalid-feedback">Please enter a phone.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="date-field" class="form-label">Joining Date</label>
                                    <input type="text" id="date-field" class="form-control" placeholder="Select Date"
                                        required />
                                    <div class="invalid-feedback">Please select a date.</div>
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Status</label>
                                    <select class="form-control" data-trigger name="status-field" id="status-field"
                                        required>
                                        <option value="">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Block">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548"
                                    style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you Sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete
                                    It!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('interactive/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/js/pages/listjs.init.js') }}"></script>
    <script src="{{ asset('interactive/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('interactive/assets/js/pages/form-validation.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- ckeditor -->
    <script src="{{ asset('interactive/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script>
        var ckClassicEditor = document.querySelectorAll(".ckeditor-classic")
        ckClassicEditor.forEach(function() {
            ClassicEditor
                .create(document.querySelector('.ckeditor-classic'))
                .then(function(editor) {
                    editor.ui.view.editable.element.style.height = '300px';
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>
    <script>
        let indexTerlapor = 0;
        $("#addTerlapor").click(function() {
            indexTerlapor++;
            if (indexTerlapor > 0) {
                $('#removeTerlapor').removeClass('d-none');
            }

            var newInput = `
                <div class="row data-terlapor mt-sm-3">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Nama (Terlapor) <span class="text-danger">*</span></label>
                            <input type="text" name="terlapor[${indexTerlapor}][nama]" class="form-control" placeholder="Masukkan nama terlapor">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Jabatan/Bagian (Terlapor) <span class="text-danger">*</span></label>
                            <input type="text" name="terlapor[${indexTerlapor}][jabatan]" class="form-control" placeholder="Masukkan Jabatan/Bagian terlapor">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Unit Kerja (Terlapor) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="terlapor[${indexTerlapor}][unit]" placeholder="Masukkan Unit Kerja Terlapor">
                        </div>
                    </div><!--end col-->
                </div>
            `;
            $('.terlapor-container').append(newInput);
        });
        $(document).on("click", "#removeTerlapor", function() {
            if ($('.data-terlapor').length > 1) {
                $('.data-terlapor').last().remove();
            }

            if ($('.data-terlapor').length <= 1) {
                $('#removeTerlapor').addClass('d-none');
            }
        });
        let indexTerlibat = 0;
        $("#addTerlibat").click(function() {
            indexTerlibat++;
            if (indexTerlibat > 0) {
                $('#removeTerlibat').removeClass('d-none');
            }

            var newInput = `
                <div class="row data-terlibat mt-sm-3">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Nama (Terlibat) <span class="text-danger">*</span></label>
                            <input type="text" name="terlibat[${indexTerlibat}][nama]" class="form-control" placeholder="Masukkan Nama Terlibat">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Jabatan/Bagian (Terlibat) <span class="text-danger">*</span></label>
                            <input type="text" name="terlibat[${indexTerlibat}][jabatan]" class="form-control" placeholder="Masukkan Jabatan/Bagian Terlibat">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Unit Kerja (Terlibat) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="terlibat[${indexTerlibat}][unit]" placeholder="Masukkan Unit Kerja Terlibat">
                        </div>
                    </div><!--end col-->
                </div>
            `;
            $('.terlibat-container').append(newInput);
        });
        $(document).on("click", "#removeTerlibat", function() {
            if ($('.data-terlibat').length > 1) {
                $('.data-terlibat').last().remove();
            }

            if ($('.data-terlibat').length <= 1) {
                $('#removeTerlibat').addClass('d-none');
            }
        });
        let indexSaksi = 0;
        $("#addSaksi").click(function() {
            indexSaksi++;
            if (indexSaksi > 0) {
                $('#removeSaksi').removeClass('d-none');
            }

            var newInput = `
                <div class="row data-saksi mt-sm-3">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Nama (Saksi) <span class="text-danger">*</span></label>
                            <input type="text" name="saksi[${indexSaksi}][nama]" class="form-control" placeholder="Masukkan Nama Saksi">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Jabatan/Bagian (Saksi) <span class="text-danger">*</span></label>
                            <input type="text" name="saksi[${indexSaksi}][jabatan]" class="form-control" placeholder="Masukkan Jabatan/Bagian Saksi">
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Unit Kerja (Saksi) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="saksi[${indexSaksi}][unit]" placeholder="Masukkan Unit Kerja Saksi">
                        </div>
                    </div><!--end col-->
                </div>
            `;
            $('.saksi-container').append(newInput);
        });
        $(document).on("click", "#removeSaksi", function() {
            if ($('.data-saksi').length > 1) {
                $('.data-saksi').last().remove();
            }

            if ($('.data-saksi').length <= 1) {
                $('#removeSaksi').addClass('d-none');
            }
        });
        let indexBukti = 0;
        $("#addAttachment").click(function() {
            indexBukti++;
            var parentDiv = $(this).closest('.row');
            var newInput = $(
                '<div class="row align-items-center mb-3">' +
                '<div class="col-5">' +
                `<input type="text" name="bukti[${indexBukti}][nama_file]" class="form-control" placeholder="Masukkan Nama File yang Ingin Dimasukkan">` +
                '</div>' +
                '<div class="col-5">' +
                `<input type="file" name="bukti[${indexBukti}][file]" class="form-control">` +
                '</div>' +
                '<div class="col-2">' +
                '<button type="button" class="btn btn-danger btn-icon removeAttachment" id="addAttachment"><i class="ri-delete-bin-fill"></i></button>' +
                '</div>' +
                '</div>'
            );
            parentDiv.after(newInput);
        })
        $(document).on("click", ".removeAttachment", function() {
            $(this).closest('.row').remove();
        });
    </script>
    <script>
        $(".date").flatpickr({
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
            // mode: "range",
        });
    </script>
    <script>
        $(document).ready(function() {
            var nameInput = $('#nameInput');
            var originalValue = nameInput.val();
            $('#anonymousCheckbox').click(function() {
                var nameInput = $('#nameInput');
                if ($(this).is(':checked')) {
                    nameInput.val('Anonym'); // Change to "anonymous" if checked
                } else {
                    nameInput.val(originalValue); // Revert to original value if unchecked
                }
            })

        })
    </script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush
