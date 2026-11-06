@extends('layouts.app')

@section('title', 'Users | Student POS')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">Accounts</p>
        <h1>User Accounts</h1>
        <p>User account information retrieved from the database.</p>
    </section>

    <section class="table-panel">
        <div class="table-title">
            <h2>User List</h2>
            <span>{{ $users->count() }} records</span>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td><span class="record-id">{{ $user->id }}</span></td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <span class="status {{ strtolower($user->status) }}">
                                    {{ $user->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty-message">No user records available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
