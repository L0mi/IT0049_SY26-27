<?php $loggedIn = session()->get('user_id'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A CodeIgniter POS project with session authentication and protected account routes.">
    <title><?= esc($title) ?> | Tindahan POS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="nav-shell">
            <a class="brand" href="<?= site_url('/') ?>" aria-label="Tindahan POS home">
                <span class="brand-mark" aria-hidden="true">TP</span>
                <span>
                    <strong>Tindahan POS</strong>
                    <small>Simple store operations</small>
                </span>
            </a>

            <nav aria-label="Main navigation">
                <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
                <?php if ($loggedIn): ?>
                    <a class="<?= $activePage === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                    <a class="<?= $activePage === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                <?php endif ?>
                <a class="<?= $activePage === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
                <?php if ($loggedIn): ?>
                    <span class="nav-user"><?= esc(session()->get('full_name')) ?></span>
                    <form action="<?= site_url('logout') ?>" method="post" class="logout-form">
                        <?= csrf_field() ?>
                        <button type="submit">Log out</button>
                    </form>
                <?php else: ?>
                    <a class="<?= $activePage === 'register' ? 'active' : '' ?>" href="<?= site_url('register') ?>">Register</a>
                    <a class="<?= $activePage === 'login' ? 'active' : '' ?>" href="<?= site_url('login') ?>">Log in</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main class="page-shell">
