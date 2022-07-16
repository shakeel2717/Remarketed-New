@extends('layouts.dashboard')

@section('title', 'All RMA')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="mb-4">
                <a href="{{ route('user.rma.create') }}" class="btn btn-primary">Add Incoming RMA</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <livewire:user.customer-rma />
                </div>
            </div>
        </div>
    </div>
@endsection
