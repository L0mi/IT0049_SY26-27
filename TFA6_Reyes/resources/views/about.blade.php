@extends('layouts.app')

@section('title', 'About | Student POS')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">About</p>
        <h1>About the POS System</h1>
        <p>This project demonstrates Laravel's basic MVC structure and Eloquent database records.</p>
    </section>

    <section class="about-grid">
        <article class="content-panel">
            <h2>What is a POS?</h2>
            <p>
                A point-of-sale system helps a business manage information used during daily sales.
                This beginner project focuses on organizing customer and user account records.
            </p>
        </article>

        <article class="content-panel">
            <h2>Basic Features</h2>
            <ul class="feature-list">
                <li>Simple navigation between four pages</li>
                <li>Database-backed customer account table</li>
                <li>Database-backed user role and status table</li>
                <li>Responsive layout for smaller screens</li>
            </ul>
        </article>
    </section>
@endsection
