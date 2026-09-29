<?= $this->include('layouts/header') ?>

<section class="page-intro compact-intro">
    <div>
        <p class="eyebrow">Staff records</p>
        <h1>Users</h1>
        <p>Manage usernames, names, and profile pictures.</p>
    </div>
    <a class="button primary" href="<?= site_url('users/new') ?>">New user</a>
</section>

<?php if ($success): ?>
    <div class="alert alert-success" role="status"><?= esc($success) ?></div>
<?php endif ?>

<section class="table-card">
    <div class="table-title">
        <div>
            <h2>User list</h2>
            <p><?= count($users) ?> records</p>
        </div>
        <span class="status"><span></span> MySQL database</span>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">User</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td data-label="User">
                            <img class="account-avatar" src="<?= base_url($user['avatar'] ? 'uploads/users/' . $user['avatar'] : 'assets/images/avatar-placeholder.svg') ?>" alt="">
                            <code><?= esc($user['username']) ?></code>
                        </td>
                        <td data-label="Full name"><strong><?= esc($user['full_name']) ?></strong></td>
                        <td data-label="Created"><span class="date-badge"><?= esc(date('M j, Y', strtotime($user['created_at']))) ?></span></td>
                        <td data-label="Action"><a class="edit-link" href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
