@extends('layouts.dashboard')
@section('title', 'All RMAs')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <livewire:customer.all-rmas/>
        </div>
    </div>
@endsection
