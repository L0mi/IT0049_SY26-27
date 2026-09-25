<?= $this->include('layouts/header') ?>

<section class="page-intro compact-intro">
    <div>
        <p class="eyebrow">Account directory</p>
        <h1>Customer Accounts</h1>
        <p>Contact details for customers stored permanently in the point-of-sale database.</p>
    </div>
    <span class="count-badge"><?= count($customers) ?> records</span>
</section>

<?php if ($success): ?>
    <div class="alert alert-success" role="status">
        <strong>Customer registered.</strong>
        <span><?= esc($success) ?></span>
    </div>
<?php endif ?>

<section class="registration-card" id="register-customer">
    <div class="registration-copy">
        <p class="eyebrow">New customer</p>
        <h2>Register a customer</h2>
        <p>Add a shopper to the MySQL database. Their record will appear in the customer list immediately after registration.</p>
    </div>

    <form action="<?= site_url('customers') ?>" method="post" class="registration-form">
        <?= csrf_field() ?>
        <div class="form-grid">
            <div class="form-field">
                <label for="customer-name">Full name</label>
                <input id="customer-name" name="fullName" type="text" value="<?= esc(old('fullName')) ?>" autocomplete="name" maxlength="100" required aria-describedby="customer-name-error">
                <?php if (isset($errors['fullName'])): ?><small class="field-error" id="customer-name-error"><?= esc($errors['fullName']) ?></small><?php endif ?>
            </div>
            <div class="form-field">
                <label for="customer-email">Email address</label>
                <input id="customer-email" name="email" type="email" value="<?= esc(old('email')) ?>" autocomplete="email" maxlength="100" required aria-describedby="customer-email-error">
                <?php if (isset($errors['email'])): ?><small class="field-error" id="customer-email-error"><?= esc($errors['email']) ?></small><?php endif ?>
            </div>
            <div class="form-field">
                <label for="customer-phone">Phone number <span class="optional-label">Optional</span></label>
                <input id="customer-phone" name="phone" type="tel" value="<?= esc(old('phone')) ?>" autocomplete="tel" maxlength="20" placeholder="09XX XXX XXXX" aria-describedby="customer-phone-error">
                <?php if (isset($errors['phone'])): ?><small class="field-error" id="customer-phone-error"><?= esc($errors['phone']) ?></small><?php endif ?>
            </div>
            <div class="form-submit">
                <button type="submit">Register customer</button>
                <small>Saved permanently to MySQL</small>
            </div>
        </div>
    </form>
</section>

<section class="table-card">
    <div class="table-title">
        <div>
            <h2>Customer list</h2>
            <p>Names and contact information</p>
        </div>
        <span class="status"><span></span> MySQL database</span>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Email address</th>
                    <th scope="col">Phone number</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td data-label="Customer"><span class="avatar" aria-hidden="true"><?= esc(strtoupper(substr($customer['full_name'], 0, 1))) ?></span><strong><?= esc($customer['full_name']) ?></strong></td>
                        <td data-label="Email address"><a href="mailto:<?= esc($customer['email']) ?>"><?= esc($customer['email']) ?></a></td>
                        <td data-label="Phone number"><?= esc($customer['phone'] ?: 'Not provided') ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
