@extends('layouts.dashboard')

@section('title', 'All Customers')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <livewire:user.all-customers />
            </div>
        </div>
    </div>
</div>
@endsection
