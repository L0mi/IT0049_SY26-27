# Tasks for Today Management System

A simple CodeIgniter 4 application for viewing today's tasks, all tasks, a demo user profile, and project information.

## Pages

- `/` - tasks scheduled for today
- `/tasks` - all tasks ordered by date
- `/profile` - demo user information
- `/about` - developer information

## Local Setup with XAMPP

1. Place the project in `/Applications/XAMPP/xamppfiles/htdocs/IT0049_TSA1`.
2. Start Apache and MySQL in XAMPP. Make sure PHP has the `intl` and `mysqli` extensions enabled.
3. Create and populate the database using either option:
   - Import `database.sql` in phpMyAdmin.
   - Run `php spark migrate` followed by `php spark db:seed AppSeeder`.
4. Confirm the database settings in `app/Config/Database.php`. The default values use the standard XAMPP MySQL account: database `it0049_tsa1`, username `root`, and a blank password.
5. In the project folder, run `php spark serve`.
6. Open `http://localhost:8080/`.

For a hosted version, update the base URL and database values through the hosting environment.
