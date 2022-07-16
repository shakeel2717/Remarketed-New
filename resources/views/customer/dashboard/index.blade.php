@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <x-box heading="My Sales Order" value="{{ auth()->user()->customerorders()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All Refunds" value="{{ auth()->user()->customerRefunds()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All Inventories" value="{{ auth()->user()->customerInventories()->count() }}" />
        </div>
        <div class="col-md-3">
            <x-box heading="All RMAs" value="{{ auth()->user()->customerRmas()->count() }}" />
        </div>
    </div>
@endsection
