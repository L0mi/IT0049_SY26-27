<?= $this->include('layouts/header') ?>

<section class="page-intro compact-intro">
    <div>
        <p class="eyebrow">Team directory</p>
        <h1>User Accounts</h1>
        <p>Staff account records retrieved from MySQL through the CodeIgniter UserModel.</p>
    </div>
    <span class="count-badge"><?= count($users) ?> records</span>
</section>

<?php if ($success): ?>
    <div class="alert alert-success" role="status">
        <strong>User registered.</strong>
        <span><?= esc($success) ?></span>
    </div>
<?php endif ?>

<section class="registration-card" id="register-user">
    <div class="registration-copy">
        <p class="eyebrow">New staff account</p>
        <h2>Register a user account</h2>
        <p>Create a permanent staff record using the username and full-name fields defined by the Technical 2 database schema.</p>
    </div>

    <form action="<?= site_url('users') ?>" method="post" class="registration-form">
        <?= csrf_field() ?>
        <div class="form-grid compact-form">
            <div class="form-field">
                <label for="staff-username">Username</label>
                <input id="staff-username" name="username" type="text" value="<?= esc(old('username')) ?>" autocomplete="username" maxlength="50" placeholder="e.g. cashier.sam" required aria-describedby="staff-username-error">
                <?php if (isset($errors['username'])): ?><small class="field-error" id="staff-username-error"><?= esc($errors['username']) ?></small><?php endif ?>
            </div>
            <div class="form-field">
                <label for="staff-name">Full name</label>
                <input id="staff-name" name="fullName" type="text" value="<?= esc(old('fullName')) ?>" autocomplete="name" maxlength="100" required aria-describedby="staff-name-error">
                <?php if (isset($errors['fullName'])): ?><small class="field-error" id="staff-name-error"><?= esc($errors['fullName']) ?></small><?php endif ?>
            </div>
            <div class="form-submit">
                <button type="submit">Register user</button>
                <small>Saved permanently to MySQL</small>
            </div>
        </div>
    </form>
</section>

<section class="table-card">
    <div class="table-title">
        <div>
            <h2>Database users</h2>
            <p>Usernames, full names, and creation dates</p>
        </div>
        <span class="status"><span></span> MySQL database</span>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="Username"><code><?= esc($user['username']) ?></code></td>
                        <td data-label="Full name"><strong><?= esc($user['full_name']) ?></strong></td>
                        <td data-label="Created"><span class="date-badge"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
