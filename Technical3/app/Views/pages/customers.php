<?= $this->include('layouts/header') ?>

<section class="page-intro compact-intro">
    <div>
        <p class="eyebrow">Customer records</p>
        <h1>Customers</h1>
        <p>View and update customer contact details.</p>
    </div>
    <a class="button primary" href="<?= site_url('customers/new') ?>">New customer</a>
</section>

<?php if ($success): ?>
    <div class="alert alert-success" role="status"><?= esc($success) ?></div>
<?php endif ?>

<section class="table-card">
    <div class="table-title">
        <div>
            <h2>Customer list</h2>
            <p><?= count($customers) ?> records</p>
        </div>
        <span class="status"><span></span> MySQL database</span>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td data-label="Customer"><span class="initial" aria-hidden="true"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></span><strong><?= esc($customer['full_name']) ?></strong></td>
                        <td data-label="Email"><a href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td>
                        <td data-label="Phone"><?= esc($customer['phone'] ?: 'Not provided') ?></td>
                        <td data-label="Action"><a class="edit-link" href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
