@extends('layouts.dashboard')

@section('title', 'Add new Sales Order')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">@yield('title')</h2>
                    <hr>
                    <form action="{{ route('user.order.store') }}" method="POST">
                        @csrf
                        <div class="row form-group" id="customerSection">
                            <label for="customer" class="col-12 col-form-label input-label">Select Customer
                                <a href="{{ route('user.customer.create') }}">Add New Customer?</a>
                            </label>
                            <div class="col-12">
                                <select class="js-select2-custom custom-select" name="customer_id" size="1"
                                    style="opacity: 0;">
                                    @foreach (auth()->user()->customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group" id="customerSection">
                            <label for="customer" class="col-12 col-form-label input-label">Select Warehouse
                                <a href="{{ route('user.warehouse.create') }}">Add New Warehouse?</a>
                            </label>
                            <div class="col-12">
                                <select class="js-select2-custom custom-select" name="warehouse_id" size="1"
                                    style="opacity: 0;">
                                    @foreach (auth()->user()->warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-input name="txid" label="Transaction Number" type="text" />
                        <button type="submit" class="btn btn-primary">Add Sale Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
