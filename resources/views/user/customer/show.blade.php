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
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
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
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-3 mb-lg-5">
            <div class="card h-100">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2">Total Refunded</h6>

                    <div class="row align-items-center gx-2">
                        <div class="col">
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
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
                            <span class="js-counter display-4 text-dark" data-value="24">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-title">Profile</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-py-3 text-dark mb-3">
                        <li class="py-0">
                            <small class="card-subtitle">About</small>
                        </li>
                        <li>
                            <i class="tio-user-outlined nav-icon"></i>
                            {{ $customer->name }}
                        </li>
                        <li class="pt-2 pb-0">
                            <small class="card-subtitle">Contacts</small>
                        </li>
                        <li>
                            <i class="tio-online nav-icon"></i>
                            {{ $customer->email }}
                        </li>
                        <li>
                            <i class="tio-android-phone-vs nav-icon"></i>
                            {{ $customer->phone }}
                        </li>

                        <li class="pt-2 pb-0">
                            <small class="card-subtitle">Address</small>
                        </li>

                        <li>
                            <i class="tio-briefcase-outlined nav-icon"></i>
                            {{ $customer->address }}
                        </li>
                        <li class="pt-2 pb-0">
                            <small class="card-subtitle">Country</small>
                        </li>

                        <li>
                            <i class="tio-briefcase-outlined nav-icon"></i>
                            {{ strtoupper($customer->country) }}
                        </li>
                        <hr>
                        <li class="pt-2 pb-0">
                            <small class="card-subtitle">Gross Total Refund</small>
                        </li>

                        <li>
                            <i class="tio-money nav-icon"></i>
                            0
                        </li>
                        <li class="pt-2 pb-0">
                            <small class="card-subtitle">Total Refund DUE</small>
                        </li>

                        <li>
                            <i class="tio-money nav-icon"></i>
                            0
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-12 col-md">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-header-title">All RMAs List</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
