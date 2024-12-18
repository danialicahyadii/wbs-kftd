<!-- Modal -->
<div class="modal fade flip" id="deletePengaduan{{ $row->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('pengaduan.destroy', $row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>Kamu ingin Menghapus Pengaduan ?</h4>
                        <p class="text-muted fs-14 mb-4">Pengaduan akan dihapus beserta dengan detail detailnya</p>
                        <div class="form-check form-check-danger hstack gap-2 justify-content-center mt-1 mb-4">
                            <input class="form-check-input" type="checkbox" name="trash" id="formCheck10">
                            <label class="form-check-label text-muted" for="formCheck10">
                                Don't Move To Bin
                            </label>
                        </div>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button type="button" class="btn btn-link link-info fw-medium text-decoration-none"
                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                            <button class="btn btn-primary" type="submit">Yes, Delete It</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!--end modal -->
