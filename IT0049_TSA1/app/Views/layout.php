<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
            <nav>
                <a href="<?= site_url('/') ?>">Welcome</a>
                <a href="<?= site_url('tasks') ?>">Task List</a>
                <a href="<?= site_url('profile') ?>">Profile</a>
                <a href="<?= site_url('about') ?>">About</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <div class="container">Tasks for Today Management System</div>
    </footer>
</body>
</html>
