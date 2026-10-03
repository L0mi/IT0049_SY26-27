<?= $this->include('layouts/header') ?>

<section class="form-page auth-page">
    <div class="form-card auth-card">
        <div class="form-heading">
            <p class="eyebrow">New staff account</p>
            <h1>Create account</h1>
            <p>Register a username and password to access the POS.</p>
        </div>

        <form action="<?= site_url('register') ?>" method="post" class="record-form">
            <?= csrf_field() ?>

            <div class="form-field light-field">
                <label for="fullName">Full name</label>
                <input id="fullName" name="fullName" type="text" maxlength="100" autocomplete="name" required value="<?= esc($values['fullName'] ?? '') ?>">
                <?php if (isset($errors['fullName'])): ?><small class="field-error dark-error"><?= esc($errors['fullName']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" minlength="4" maxlength="50" autocomplete="username" required value="<?= esc($values['username'] ?? '') ?>">
                <small class="help-text">Use lowercase letters, numbers, dots, underscores, or dashes.</small>
                <?php if (isset($errors['username'])): ?><small class="field-error dark-error"><?= esc($errors['username']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" minlength="8" maxlength="72" autocomplete="new-password" required>
                <small class="help-text">Use at least 8 characters.</small>
                <?php if (isset($errors['password'])): ?><small class="field-error dark-error"><?= esc($errors['password']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="passwordConfirm">Confirm password</label>
                <input id="passwordConfirm" name="passwordConfirm" type="password" minlength="8" maxlength="72" autocomplete="new-password" required>
                <?php if (isset($errors['passwordConfirm'])): ?><small class="field-error dark-error"><?= esc($errors['passwordConfirm']) ?></small><?php endif ?>
            </div>

            <div class="form-actions">
                <button type="submit">Create account</button>
            </div>

            <p class="auth-switch">Already have an account? <a href="<?= site_url('login') ?>">Log in</a></p>
        </form>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
