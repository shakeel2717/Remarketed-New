@extends('layouts.dashboard')

@section('title', 'All Warehouses')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <livewire:user.all-warehouse />
            </div>
        </div>
    </div>
</div>
@endsection
