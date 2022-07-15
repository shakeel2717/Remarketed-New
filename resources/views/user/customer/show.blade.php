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
            <x-profile-box-card :user="$customer" />
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
