@extends('layouts.dashboard')

@section('title', 'Add a new Supplier')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">@yield('title')</h2>
                    <hr>
                    <form action="{{ route('user.supplier.store') }}" method="POST">
                        @csrf
                        <x-input name="name" label="Enter Supplier Name" type="text" />
                        <x-input name="email" label="Enter Supplier Email" type="email" />
                        <x-input name="phone" label="Enter Supplier Phone" type="text" />
                        <x-input name="address" label="Enter Supplier Address" type="text" />
                        <x-input name="country" label="Enter Supplier Country" type="text" />
                        <x-input name="password" label="Type Supplier Password" type="password" />
                        <button type="submit" class="btn btn-primary">Add Supplier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
