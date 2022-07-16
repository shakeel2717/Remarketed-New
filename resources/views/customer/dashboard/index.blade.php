@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-box heading="All Customers" value="{{ auth()->user()->customers()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All Supplier" value="{{ auth()->user()->suppliers()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All Warehouses" value="{{ auth()->user()->warehouses()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All RMAs" value="{{ auth()->user()->rmas()->count() }}" />
        </div>
    </div>
@endsection
