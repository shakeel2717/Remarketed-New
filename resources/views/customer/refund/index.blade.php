@extends('layouts.dashboard')
@section('title', 'All Refund Transactions')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <livewire:customer.all-refunds/>
        </div>
    </div>
@endsection
