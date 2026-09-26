<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <h1>Profile</h1>
    <p>Demo user information.</p>
</section>

<section class="card profile-card">
    <?php if ($user): ?>
        <dl>
            <div><dt>Full Name</dt><dd><?= esc($user['full_name']) ?></dd></div>
            <div><dt>Username</dt><dd><?= esc($user['username']) ?></dd></div>
            <div><dt>Email</dt><dd><?= esc($user['email']) ?></dd></div>
            <div><dt>Member Since</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div>
        </dl>
    <?php else: ?>
        <p class="empty">No user record found.</p>
    <?php endif; ?>
</section>
<?= $this->endSection() ?>
