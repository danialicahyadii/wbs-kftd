<div class="modal fade" id="createFaq" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0">
            <form action="{{ route('faq-admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-header p-3 ps-4 bg-info-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Tambah FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-0 align-items-center">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="namaFile" class="form-label">FAQ<span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control" cols="15" rows="5" name="faq"
                                        placeholder="Masukkan Pertanyaan" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Answer<span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control answerCk" name="answer" placeholder="Masukkan Jawaban"></textarea>
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
