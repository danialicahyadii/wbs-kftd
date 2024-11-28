<div class="modal fade" id="konsekuensi" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <form action="{{ route('pengaduan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header p-3 ps-4 bg-info-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Update Konsekuensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label"><i class="ri-alert-line fs-16 text-warning"></i>
                                        Konsekuensi
                                        akan jadi sebagai tambahan tidak akan menghapus konsekuensi
                                        awal!</label>
                                    <textarea class="form-control" name="konsekuensi" cols="40" rows="10"></textarea>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success w-xs">Update</button>
                </div>
            </form>
        </div>
        <!-- end modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
