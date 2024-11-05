<div class="modal fade" id="pihakTerlibat" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <form action="{{ route('pihak-terlibat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-header p-3 ps-4 bg-danger-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Tambah Pihak Terlibat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-0 d-flex align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="namaTerlibat" class="form-label">Nama (Terlibat) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nama"
                                        placeholder="Masukkan Nama" id="namaTerlibat">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="jabatanTerlibat" class="form-label">Jabatan/Bagian (Terlibat) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="jabatan"
                                        placeholder="Masukkan Jabatan" id="jabatanTerlibat">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="unitTerlibat" class="form-label">Unit Kerja (Terlibat) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="unit"
                                        placeholder="Masukkan Unit Kerja" id="unitTerlibat">
                                    <input type="text" name="pengaduan_id" value="{{ $laporan->id }}" hidden>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success w-xs">Add</button>
                </div>
            </form>
        </div>
        <!-- end modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
