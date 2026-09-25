<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A four-page CodeIgniter point-of-sale foundation project.">
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
                <a class="<?= $activePage === 'customers' ? 'active' : '' ?>" href="<?= site_url('customers') ?>">Customers</a>
                <a class="<?= $activePage === 'users' ? 'active' : '' ?>" href="<?= site_url('users') ?>">Users</a>
                <a class="<?= $activePage === 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
            </nav>
        </div>
    </header>

    <main class="page-shell">
