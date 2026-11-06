@extends('layouts.app')

@section('title', 'Home | Student POS')

@section('content')
    <section class="hero">
        <p class="eyebrow">IT0049 TFA6</p>
        <h1>Welcome to Student POS</h1>
        <p class="hero-text">
            A simple point-of-sale website that displays customer and user records from the database.
        </p>
        <a class="button" href="{{ route('customers') }}">View Customer Accounts</a>
    </section>

    <section class="overview">
        <h2>System Overview</h2>
        <div class="card-grid">
            <article class="card">
                <div class="card-number">01</div>
                <h3>Customer Accounts</h3>
                <p>View the contact details of registered customers.</p>
                <a href="{{ route('customers') }}">Open Customers &rarr;</a>
            </article>

            <article class="card">
                <div class="card-number">02</div>
                <h3>User Accounts</h3>
                <p>Check the usernames, roles, and current status of POS users.</p>
                <a href="{{ route('users') }}">Open Users &rarr;</a>
            </article>

            <article class="card">
                <div class="card-number">03</div>
                <h3>About the System</h3>
                <p>Learn about the purpose and basic features of this project.</p>
                <a href="{{ route('about') }}">Read About &rarr;</a>
            </article>
        </div>
    </section>
@endsection
