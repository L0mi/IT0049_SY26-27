<?= $this->include('layouts/header') ?>

<section class="form-page">
    <a class="back-link" href="<?= site_url('customers') ?>">&larr; Back to customers</a>
    <div class="form-card">
        <div class="form-heading">
            <p class="eyebrow">Customer account</p>
            <h1><?= esc($heading) ?></h1>
            <p>Fields marked required must be completed before the record can be saved.</p>
        </div>

        <form action="<?= esc($action) ?>" method="post" class="record-form">
            <?= csrf_field() ?>

            <div class="form-field light-field">
                <label for="fullName">Full name</label>
                <input id="fullName" name="fullName" type="text" maxlength="100" required value="<?= esc(old('fullName', $customer['full_name'] ?? '')) ?>">
                <?php if (isset($errors['fullName'])): ?><small class="field-error dark-error"><?= esc($errors['fullName']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" maxlength="100" required value="<?= esc(old('email', $customer['email'] ?? '')) ?>">
                <?php if (isset($errors['email'])): ?><small class="field-error dark-error"><?= esc($errors['email']) ?></small><?php endif ?>
            </div>

            <div class="form-field light-field">
                <label for="phone">Phone <span class="optional-label">Optional</span></label>
                <input id="phone" name="phone" type="tel" maxlength="20" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>">
                <?php if (isset($errors['phone'])): ?><small class="field-error dark-error"><?= esc($errors['phone']) ?></small><?php endif ?>
            </div>

            <div class="form-actions">
                <button type="submit"><?= esc($submitLabel) ?></button>
                <a href="<?= site_url('customers') ?>">Cancel</a>
            </div>
        </form>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
