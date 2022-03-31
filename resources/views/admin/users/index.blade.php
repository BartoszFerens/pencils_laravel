@extends('admin.layouts.app')

@section('content')
    <section class="data-list">
        <table>
            <tr>
                <td width="80"><strong>Id</strong></td>
                <td width="300">Name</td>
                <td>Email</td>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->first_name . ' ' . $user->last_name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </table>
    </section>
@endsection
