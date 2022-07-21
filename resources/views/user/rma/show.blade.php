@extends('layouts.dashboard')
@section('title', 'RMA Detail')
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">TOTAL TO REFUND</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $rma->customer->customerInventoriesRmas($rma->id)->sum('price') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">REFUNDED</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $rma->customer->customerRefundsRmas($rma->id)->sum('amount') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">REFUND DUE</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $rma->customer->customerInventoriesRmas($rma->id)->sum('price') - $rma->customer->customerRefundsRmas($rma->id)->sum('amount') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">INVENTORY DUE</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 mb-3 mb-lg-5">
            <a class="card card-hover-shadow mb-4" id="addInventory" href="javascript:;">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/create.svg') }}"
                            alt="Image Description">
                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Inventory</h3>
                            <span class="text-body">Add a new Inventory</span>
                        </div>
                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a class="card card-hover-shadow mb-4" id="addRefund" href="javascript:;">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/choice.svg') }}"
                            alt="Image Description">
                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Refund</h3>
                            <span class="text-body">Add Refund</span>
                        </div>
                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a class="card card-hover-shadow" id="importRma" href="#">
                <div class="card-body">
                    <div class="media align-items-center">
                        <img class="avatar avatar-xl mr-4" src="{{ asset('assets/svg/illustrations/sending.svg') }}"
                            alt="Image Description">
                        <div class="media-body">
                            <h3 class="text-hover-primary mb-1">Import RMA</h3>
                            <span class="text-body">Import RMA from Excel File</span>
                        </div>
                        <div class="ml-2 text-right">
                            <i class="tio-chevron-right tio-lg text-body text-hover-primary"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-8 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <ul class="nav nav-segment" id="navTab1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-resultTab1" data-toggle="pill" href="#lnventoryData"
                                role="tab" aria-controls="lnventoryData" aria-selected="true">lnventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-htmlTab1" data-toggle="pill" href="#refundData" role="tab"
                                aria-controls="refundData" aria-selected="false">Refund</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="navTabContent1">
                    <div class="tab-pane fade p-4 active show" id="lnventoryData" role="tabpanel"
                        aria-labelledby="nav-resultTab1">
                        <div class="">
                            <livewire:user.all-inventory />
                        </div>
                    </div>

                    <div class="tab-pane fade p-4" id="refundData" role="tabpanel" aria-labelledby="nav-htmlTab1">
                        <div class="">
                            <livewire:user.all-refunds/>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
    </div>
    <x-add-inventory :rma="$rma" :reasons="$reasons" />
    <x-add-refund :rma="$rma" />
    <x-user.import-inventory :rma="$rma" />
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $("#addInventory").click(function() {
                $('#customersGuideModal').modal('show')
            });
            $("#addRefund").click(function() {
                $('#addRefundModal').modal('show')
            });
            $("#importRma").click(function() {
                $('#importRmaModal').modal('show')
            });
            $("#showStatusModal").click(function() {
                $('#changeStatusModal').modal('show')
            });

        });
    </script>
@endsection
