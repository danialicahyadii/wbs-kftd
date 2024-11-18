<div class="modal fade" id="statusAlbert" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <form action="{{ route('pengaduan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header p-3 ps-4 bg-info-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Update Status Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-0 align-items-center">
                        <div class="row">
                            <div class="col-12">
                                @php
                                    $status = app\Models\Status::where('id', '>', $laporan->status)->get();
                                @endphp
                                <div class="mb-3">
                                    <label for="namaFile" class="form-label">Status<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="status">
                                        @foreach ($status as $row)
                                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="file" class="form-label">Deskripsi <span
                                            class="text-danger">*</span></label>
                                    <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
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
