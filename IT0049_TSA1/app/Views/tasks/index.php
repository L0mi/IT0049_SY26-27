<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <h1>Task List</h1>
    <p>All tasks are listed below in date order.</p>
</section>

<section class="card">
    <?= $this->include('partials/task_table') ?>
</section>
<?= $this->endSection() ?>
