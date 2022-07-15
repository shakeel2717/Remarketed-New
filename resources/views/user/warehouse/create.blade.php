@extends('layouts.dashboard')

@section('title', 'Add a new Warehouse')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">@yield('title')</h2>
                    <hr>
                    <form action="{{ route('user.warehouse.store') }}" method="POST">
                        @csrf
                        <x-input name="name" label="Enter Warehouse Name" type="text" />
                        <x-input name="location" label="Type Warehouse Location" type="text" />
                        <button type="submit" class="btn btn-primary">Add Warehouse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
