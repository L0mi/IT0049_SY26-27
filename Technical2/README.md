# Tindahan POS Technical 2

This CodeIgniter 4 project completes IT0049 Technical Formative Assessment 2 by replacing the temporary PHP arrays from Technical 1 with a real MySQL or MariaDB database. Customer and user records are retrieved through CodeIgniter Models using Query Builder's `findAll()` method and displayed in the existing views.

## Required pages

- `/` - Technical 2 landing page
- `/about` - MVC, Model, Query Builder, and database overview
- `/customers` - database-backed customer directory
- `/users` - database-backed user directory

The customer and user pages also include validated registration forms. New records are inserted into MySQL and remain available after the browser or server restarts.

## Requirements

- PHP 8.2 or newer
- `intl`, `mbstring`, and `mysqli` PHP extensions
- XAMPP MySQL or MariaDB running on port 3306

## Database configuration

The included `.env` connects to:

```ini
database.default.hostname = '127.0.0.1'
database.default.database = 'technical2_pos'
database.default.username = 'root'
database.default.password = ''
database.default.DBDriver = 'MySQLi'
database.default.port = 3306
```

These are XAMPP's default local development credentials. Use a protected database account for any public deployment.

## Create and populate the database

Start XAMPP MySQL, then run:

```bash
/Applications/XAMPP/xamppfiles/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS technical2_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
php spark migrate
php spark db:seed PosSeeder
```

The migration creates the assignment schema:

- `customers`: `id`, `full_name`, `email`, nullable `phone`, and `created_at`
- `users`: `id`, unique `username`, `full_name`, and `created_at`

The seeder inserts six sample records into each table.

## Run the application

From the project directory:

```bash
cd /Applications/XAMPP/xamppfiles/htdocs/Technical2
php spark serve --port 8082
```

Open `http://localhost:8082/`.

## Project structure

```text
app/Config/Routes.php          GET and POST route definitions
app/Controllers/Customers.php CustomerModel retrieval and registration
app/Controllers/Users.php     UserModel retrieval and registration
app/Models/CustomerModel.php  Customers table model
app/Models/UserModel.php      Users table model
app/Database/Migrations/      Assignment database schema
app/Database/Seeds/           Six sample records per table
app/Views/                    Shared layout and four page views
public/assets/css/style.css    Responsive interface styles
database/technical2_pos.sql   Ready-to-import database export
```

## Access or export the database

With XAMPP Apache and MySQL running, open `http://localhost/phpmyadmin/` and select `technical2_pos`.

To create a new SQL export:

```bash
/Applications/XAMPP/xamppfiles/bin/mysqldump -u root technical2_pos > database/technical2_pos.sql
```
