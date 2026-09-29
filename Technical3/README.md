# Tindahan POS Technical 3

This CodeIgniter 4 project extends Technical 2 with validated create and edit forms for customer and user accounts. User profile pictures are checked, cropped to 320 by 320 pixels, and saved in `public/uploads/users`. Only the generated filename is stored in the database.

## Features

- Customer and user lists from MySQL
- New customer form at `/customers/new`
- New user form at `/users/new`
- Edit pages for customer and user records
- Validation errors with previous values restored
- Unique username checking
- JPG and PNG avatar uploads up to 2MB
- Prepared avatar thumbnails and a placeholder image

## Requirements

- PHP 8.2 or newer
- PHP `intl`, `mbstring`, `mysqli`, and `gd` extensions
- MySQL or MariaDB

## Setup

Create the database:

```bash
/Applications/XAMPP/xamppfiles/bin/mysql -u root -e "CREATE DATABASE IF NOT EXISTS technical3_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
php spark migrate
php spark db:seed PosSeeder
```

You can also import `database/technical3_pos.sql` through phpMyAdmin.

Run the project:

```bash
cd /Applications/XAMPP/xamppfiles/htdocs/Technical3
php spark serve
```

Open `http://localhost:8080/`.

## Main files

```text
app/Config/Routes.php
app/Controllers/Customers.php
app/Controllers/Users.php
app/Models/CustomerModel.php
app/Models/UserModel.php
app/Database/Migrations/
app/Database/Seeds/PosSeeder.php
app/Views/pages/
public/uploads/users/
database/technical3_pos.sql
```

The local `.env` uses the XAMPP defaults: database `technical3_pos`, user `root`, blank password, and port `3306`. The file is excluded from Git because database credentials should not be committed.
