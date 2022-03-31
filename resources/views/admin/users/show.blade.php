@extends('admin.layouts.app')

@section('content')
    <section class="data-show">
        <h3>{{ $user->first_name . ' ' . $user->last_name }}</h3>

        <div class="row">
            <div class="col-2">E-mail</div> 
            <div class="col-10">{{ $user->email }}</div>
        </div>

        <a href="{{ route('admin.users.edit', $user->id) }}">
            <button>Edit</button>
        </a>
    </section>
@endsection
