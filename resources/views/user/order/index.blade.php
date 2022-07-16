@extends('layouts.dashboard')

@section('title', 'All Sale Orders')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <a href="{{ route('user.order.create') }}" class="btn btn-primary">Add new Sales Order</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:user.all-sale-orders/>
                </div>
            </div>
        </div>
    </div>
@endsection
