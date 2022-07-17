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
                                data-value="24">{{ auth()->user()->customerInventoriesRmas($rma->id)->sum('price') }}</span>
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
                                data-value="24">{{ auth()->user()->customerRefundsRmas($rma->id)->sum('amount') }}</span>
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
                                data-value="24">{{ auth()->user()->customerInventoriesRmas($rma->id)->sum('price') - auth()->user()->customerRefundsRmas($rma->id)->sum('amount') }}</span>
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
            </a>
        </div>
        <div class="col-md-8 mb-3">
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
                            <div class="table-responsive">
                                <table
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Serial</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">Issue</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Sale Price</th>
                                            <th scope="col">Attachment</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($rma->customer->customerInventories as $Inventory)
                                            <tr>
                                                <td>{{ $Inventory->serial }}</td>
                                                <td>{{ $Inventory->model }}</td>
                                                <td>{{ $Inventory->issue }}</td>
                                                <td class="text-uppercase"> <span class="badge badge-primary">{{ $Inventory->status }}</span></td>
                                                <td>{{ number_format($Inventory->price, 2) }}</td>
                                                <td>
                                                    @if ($Inventory->attachment != 'default.jpg')
                                                        <a
                                                            href="{{ asset('attachments/') }}/{{ $Inventory->attachment }}">Download</a>
                                                    @else
                                                        No Attatchment
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($Inventory->created_at))->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No Record Found</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade p-4" id="refundData" role="tabpanel" aria-labelledby="nav-htmlTab1">
                        <div class="">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">TX ID</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">CREDIT NOTE</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($rma->customer->customerRefunds as $refund)
                                            <tr>
                                                <td>{{ $refund->method }}</td>
                                                <td>{{ $refund->txid }}</td>
                                                <td>{{ $refund->note }}</td>
                                                <td>{{ $refund->amount }}</td>
                                                <td>
                                                    @if ($refund->attachment != null)
                                                        <a
                                                            href="{{ asset('attachments/refunds') }}/{{ $refund->attachment }}">Download</a>
                                                    @else
                                                        No Attatchment
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($refund->created_at))->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No Record Found</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
        <x-customer.add-inventory :rma="$rma" :reasons="$reasons" />
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function() {
            $("#addInventory").click(function() {
                $('#customersGuideModal').modal('show')
            });
        });
    </script>
@endsection
