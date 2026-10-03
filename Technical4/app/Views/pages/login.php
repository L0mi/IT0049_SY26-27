<?= $this->include('layouts/header') ?>

<section class="form-page auth-page">
    <div class="form-card auth-card">
        <div class="form-heading">
            <p class="eyebrow">Staff access</p>
            <h1>Log in</h1>
            <p>Use an authorized POS account to manage customers and users.</p>
        </div>

        <form action="<?= site_url('login') ?>" method="post" class="record-form">
            <?= csrf_field() ?>

            <?php if ($success): ?>
                <div class="alert alert-success" role="status"><?= esc($success) ?></div>
            <?php endif ?>

            <?php if ($error): ?>
                <div class="alert alert-error" role="alert"><?= esc($error) ?></div>
            <?php endif ?>

            <div class="form-field light-field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" maxlength="50" autocomplete="username" required value="<?= esc($username) ?>">
            </div>

            <div class="form-field light-field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required>
            </div>

            <div class="form-actions">
                <button type="submit">Log in</button>
            </div>

            <p class="auth-switch">Need an account? <a href="<?= site_url('register') ?>">Create one</a></p>
        </form>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
