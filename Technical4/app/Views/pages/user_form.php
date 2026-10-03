<?= $this->include('layouts/header') ?>

<section class="form-page">
    <a class="back-link" href="<?= site_url('users') ?>">&larr; Back to users</a>
    <div class="form-card">
        <div class="form-heading">
            <p class="eyebrow">User account</p>
            <h1><?= esc($heading) ?></h1>
            <p>Username, full name, and a secure password are used for staff access.</p>
        </div>

        <form action="<?= esc($action) ?>" method="post" enctype="multipart/form-data" class="record-form">
            <?= csrf_field() ?>

            <div class="form-field light-field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" maxlength="50" required value="<?= esc($values['username'] ?? $user['username'] ?? '') ?>">
                <?php if (isset($errors['username'])): ?><small class="field-error dark-error"><?= esc($errors['username']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="fullName">Full name</label>
                <input id="fullName" name="fullName" type="text" maxlength="100" required value="<?= esc($values['fullName'] ?? $user['full_name'] ?? '') ?>">
                <?php if (isset($errors['fullName'])): ?><small class="field-error dark-error"><?= esc($errors['fullName']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="password"><?= $editing ? 'New password' : 'Password' ?> <?= $editing ? '<span class="optional-label">Optional</span>' : '' ?></label>
                <input id="password" name="password" type="password" minlength="8" maxlength="72" autocomplete="new-password" <?= $editing ? '' : 'required' ?>>
                <small class="help-text"><?= $editing ? 'Leave blank to keep the current password.' : 'Use at least 8 characters.' ?></small>
                <?php if (isset($errors['password'])): ?><small class="field-error dark-error"><?= esc($errors['password']) ?></small><?php endif ?>
            </div>

            <?php if ($user !== null): ?>
                <div class="avatar-field">
                    <img src="<?= base_url($user['avatar'] ? 'uploads/users/' . $user['avatar'] : 'assets/images/avatar-placeholder.svg') ?>" alt="Current profile picture">
                    <div class="form-field light-field">
                        <label for="avatar">Profile picture <span class="optional-label">Optional</span></label>
                        <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
                        <small class="help-text">JPG or PNG, up to 2MB. The image will be cropped to 320 by 320 pixels.</small>
                        <?php if (isset($errors['avatar'])): ?><small class="field-error dark-error"><?= esc($errors['avatar']) ?></small><?php endif ?>
                    </div>
                </div>
            <?php endif ?>

            <div class="form-actions">
                <button type="submit"><?= esc($submitLabel) ?></button>
                <a href="<?= site_url('users') ?>">Cancel</a>
            </div>
        </form>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
