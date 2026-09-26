<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <p class="eyebrow"><?= esc(date('l, F j, Y')) ?></p>
    <h1>Welcome</h1>
    <p>Here are the tasks scheduled for today.</p>
</section>

<section class="card">
    <h2>Today's Tasks</h2>
    <?= $this->include('partials/task_table') ?>
</section>
<?= $this->endSection() ?>
