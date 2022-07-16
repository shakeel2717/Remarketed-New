<!-- Customers Guide Modal -->
<div class="modal fade" id="addRefundModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Header -->
            <div class="modal-close">
                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary" data-dismiss="modal"
                    aria-label="Close">
                    <i class="tio-clear tio-lg"></i>
                </button>
            </div>
            <!-- End Header -->

            <!-- Body -->
            <div class="modal-body p-sm-5">
                <div class="text-center mb-5">
                    <h4 class="h1">Add Refund in RMA</h4>
                </div>
                <form action="{{ route('user.refund.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control"
                                    placeholder="Amount">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="method">Payment Method</label>
                                <input type="text" name="method" id="method" class="form-control" placeholder="Payment Method">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="txid">Transaction ID</label>
                                <input type="text" name="txid" id="txid" class="form-control" placeholder="Transaction ID">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="custom-file-boxed" for="attachment">
                                    <span id="customFileBoxedEg">Upload Images JPG, PNG.</span>
                                    <small class="d-block text-muted">Maximum file size 10MB</small>
                                    <input id="attachment" name="attachment" type="file"
                                        class="js-file-attach "
                                        data-hs-file-attach-options='{
                                               "textTarget": "#customFileBoxedEg"
                                             }'>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="note">Note</label>
                                <input type="text" name="note" id="note" class="form-control"
                                    placeholder="Note">
                                <input type="hidden" name="rma_id" value="{{ $rma->id }}">
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
            <!-- End Body -->

            <!-- Footer -->
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close This</button>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</div>
<!-- End Customers Guide Modal -->
