@extends('layouts.dashboard')
@section('title', 'Customer')
@section('content')
    <div class="row gx-2 gx-lg-3">
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total RMAs</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $customer->customerRmas->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Refund</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $customer->customerRefunds->sum('amount') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Inventories</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $customer->customerInventories->sum('price') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Refund Due</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark"
                                data-value="24">{{ $customer->customerInventories->sum('price') - $customer->customerRefunds->sum('amount') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <x-profile-box-card :user="$customer" />
        </div>
        <div class="col-lg-8 mb-3 mb-lg-5">
            <div class="card h-100">
                {{-- <div class="card-header">
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
                </div> --}}
                <div class="tab-content" id="navTabContent1">
                    <div class="tab-pane fade p-4 active show" id="lnventoryData" role="tabpanel"
                        aria-labelledby="nav-resultTab1">
                        <div class="">
                            <div class="table-responsive">
                                <table
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Total Refund</th>
                                            <th scope="col">Refunded</th>
                                            <th scope="col">Refund Due</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($customer->customerRmas as $rma)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ number_format($rma->customer->customerInventoriesRmas($rma->id)->sum('price'), 2) }}
                                                </td>
                                                <td>{{ number_format($rma->customer->customerRefundsRmas($rma->id)->sum('amount'), 2) }}
                                                </td>
                                                <td>{{ number_format($rma->customer->customerInventoriesRmas($rma->id)->sum('price') - $rma->customer->customerRefundsRmas($rma->id)->sum('amount'), 2) }}
                                                </td>
                                                <td class="text-uppercase"> <span
                                                        class="badge badge-primary">{{ $rma->status }}</span></td>
                                                <td>{{ $rma->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @empty
                                            <p class="text-center">No Record Found</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>

    </div>
    </div>
@endsection
