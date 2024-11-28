<div class="modal fade" id="jenis-pelanggaran" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <form action="{{ route('pengaduan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header p-3 ps-4 bg-info-subtle">
                    <h5 class="modal-title" id="inviteMembersModalLabel">Jenis Pelanggaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        {{-- <label class="form-label">Jenis Pelanggaran <span
                                                class="text-danger">*</span></label> --}}
                                        <div class="row">
                                            @foreach ($jenisPelanggaran as $item)
                                                <div class="col-6">
                                                    <div class="form-check form-check form-check-primary mb-3">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="{{ $item->nama }}" value="{{ $item->nama }}"
                                                            name="jenis_pelanggaran[]"
                                                            @if (in_array($item->nama, json_decode($laporan->jenis_pelanggaran))) checked @endif>
                                                        <label class="form-check-label" for="{{ $item->nama }}">
                                                            {{ $item->nama }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
