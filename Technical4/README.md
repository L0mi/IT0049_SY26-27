# Tindahan POS Technical 4

This CodeIgniter 4 project extends Technical 3 with login sessions and protected customer and user routes. Passwords are stored as hashes and checked with `password_verify()`.

## Features

- Username and password login
- Public account registration with password confirmation
- Passwords created with `password_hash()`
- Session regeneration after successful login
- Authentication filter for all customer and user routes
- Logout that destroys the current session
- TFA3 customer forms, user forms, validation, and avatar uploads
- Password field for new users and optional password changes when editing

## Requirements

- PHP 8.2 or newer
- PHP `intl`, `mbstring`, `mysqli`, and `gd` extensions
- MySQL or MariaDB

## Setup

Start MySQL, then import the database:

```bash
/Applications/XAMPP/xamppfiles/bin/mysql -u root < /Applications/XAMPP/xamppfiles/htdocs/Technical4/database/technical4_pos.sql
```

You can also create the database and run the migrations and seeder:

```bash
/Applications/XAMPP/xamppfiles/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS technical4_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
php spark migrate
php spark db:seed PosSeeder
```

Run the project:

```bash
cd /Applications/XAMPP/xamppfiles/htdocs/Technical4
php spark serve
```

Open `http://localhost:8080/`.

New users can create an account at `http://localhost:8080/register` and then log in with their username and password.

## Demo account

```text
Username: admin.mara
Password: pos12345
```

All seeded users use `pos12345` for local demonstration. Change these passwords before publishing a real deployment.

## Main authentication files

```text
app/Controllers/Auth.php
app/Filters/AuthFilter.php
app/Config/Filters.php
app/Config/Routes.php
app/Database/Migrations/2026-10-03-120000_AddPasswordToUsers.php
app/Views/pages/login.php
app/Views/pages/register.php
database/technical4_pos.sql
```

The local `.env` uses database `technical4_pos`, user `root`, a blank password, and port `3306`. It is excluded from Git.
