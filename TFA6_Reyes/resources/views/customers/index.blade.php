@extends('layouts.app')

@section('title', 'Customers | Student POS')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">Accounts</p>
        <h1>Customer Accounts</h1>
        <p>Customer contact information retrieved from the database.</p>
    </section>

    <section class="table-panel">
        <div class="table-title">
            <h2>Customer List</h2>
            <span>{{ $customers->count() }} records</span>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <td><span class="record-id">{{ $customer->id }}</span></td>
                            <td>{{ $customer->full_name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-message">No customer records available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
