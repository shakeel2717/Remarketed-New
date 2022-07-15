@extends('layouts.dashboard')

@section('title', 'Add a new Customer')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">@yield('title')</h2>
                    <hr>
                    <form action="{{ route('user.customer.store') }}" method="POST">
                        @csrf
                        <x-input name="name" label="Enter Customer Name" type="text" />
                        <x-input name="email" label="Enter Customer Email" type="email" />
                        <x-input name="password" label="Type Customer Password" type="password" />
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
