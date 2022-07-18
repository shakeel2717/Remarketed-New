<div class="modal fade" id="importRmaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-close">
                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal"
                    aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <div class="modal-body p-sm-5">
                <div class="text-center mb-5">
                    <h4 class="h1">Import Inventory in this RMA</h4>
                </div>
                <form action="{{ route('user.import.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="custom-file-boxed" for="attachment">
                                    <span id="customFileBoxedEg">Upload Images CSV, EXCEL.</span>
                                    <small class="d-block text-muted">Maximum file size 10MB</small>
                                    <input id="attachment" name="attachment" type="file"
                                        >
                                        <input type="hidden" name="rma_id" value="{{ $rma->id }}">
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="submit" value="Submit" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close
                    This</button>
            </div>
        </div>
    </div>
</div>
