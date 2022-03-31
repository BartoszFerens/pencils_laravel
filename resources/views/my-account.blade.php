@extends('layouts.app')

@include('layouts.header')

@section('content')
    @auth
        <section class="p-2">
            <div class="row">
                <div class="col-1">Name: </div>
                <div class="col-11">{{ Auth()->user()->first_name . ' ' . Auth()->user()->last_name }}</div>
            </div>

            <div class="row">
                <div class="col-1">Email: </div>
                <div class="col-11">{{ Auth()->user()->email }}</div>
            </div>

            <a href="{{ route('orders.index') }}">
                <button class="btn btn-primary">My orders</button>
            </a>
        </section>
    @endauth
@endsection
