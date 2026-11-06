# IT0049 TFA6 - Student POS

This is a simple Laravel POS activity that displays customer and user records from a database. It uses migrations, seeders, Eloquent models, controllers, and Blade views.

## Requirements

- PHP 8.3 or newer
- Composer
- SQLite PHP extension

## Setup

1. Open a terminal in the project folder.
2. Install the PHP packages:

```bash
composer install
```

3. Create the environment file and application key:

```bash
cp .env.example .env
php artisan key:generate
```

4. Create the SQLite database file if it does not exist:

```bash
touch database/database.sqlite
```

5. Run the migrations and seeders:

```bash
php artisan migrate --seed
```

6. Start the Laravel server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in a browser.

## Database Configuration

The project uses SQLite. The `.env` file should contain:

```env
DB_CONNECTION=sqlite
```

The database is stored in `database/database.sqlite`. Do not upload the real `.env` file to GitHub.

## Database Tables

The `customers` table contains:

- `id`
- `full_name`
- `email`
- `phone`
- `address`
- `created_at`
- `updated_at`

The `users` table contains:

- `id`
- `username`
- `full_name`
- `email`
- `role`
- `status`
- `created_at`
- `updated_at`

## Available Pages

- `/` - Home page
- `/about` - Information about the POS project
- `/customers` - Customer records
- `/users` - User records

## Useful Commands

```bash
php artisan migrate:fresh --seed
php artisan db:seed
php artisan test
php artisan serve
```
