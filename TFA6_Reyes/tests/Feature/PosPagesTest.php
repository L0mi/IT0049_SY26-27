<?php

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('the required POS pages load successfully', function (string $url) {
    $this->get($url)->assertOk();
})->with(['/', '/about', '/customers', '/users']);

test('the customer page displays database records', function () {
    $this->get('/customers')
        ->assertOk()
        ->assertSee('5 records')
        ->assertSee('Lamuel Christopher Reyes')
        ->assertSee('loreyes@feudiliman.edu.ph')
        ->assertSee('09211234567')
        ->assertSee('Taguig City');
});

test('the user page displays database records', function () {
    $this->get('/users')
        ->assertOk()
        ->assertSee('5 records')
        ->assertSee('admin01')
        ->assertSee('Lamuel Christopher Reyes')
        ->assertSee('cashier02')
        ->assertSee('Administrator')
        ->assertSee('Inactive');
});

test('the seeders can be run again without duplicate records', function () {
    $this->seed();

    expect(Customer::count())->toBe(5)
        ->and(User::count())->toBe(5);
});

test('every page contains the required navigation links', function (string $url) {
    $this->get($url)
        ->assertSee('href="'.route('home').'"', false)
        ->assertSee('href="'.route('about').'"', false)
        ->assertSee('href="'.route('customers').'"', false)
        ->assertSee('href="'.route('users').'"', false);
})->with(['/', '/about', '/customers', '/users']);
