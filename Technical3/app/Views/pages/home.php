<?= $this->include('layouts/header') ?>

<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow">Forms and file upload</p>
        <h1>Manage customer and user records.</h1>
        <p class="hero-text">Add and edit accounts with server-side validation. User profile pictures are checked, resized, and stored for display.</p>
        <div class="hero-actions">
            <a class="button primary" href="<?= site_url('customers') ?>">View customers</a>
            <a class="button secondary" href="<?= site_url('users') ?>">View staff users</a>
        </div>
    </div>

    <div class="hero-panel" aria-label="Application overview">
        <p class="panel-label">System overview</p>
        <div class="metric-grid">
            <div><strong>CRUD</strong><span>Create and update</span></div>
            <div><strong>12</strong><span>Sample accounts</span></div>
            <div><strong>MVC</strong><span>App structure</span></div>
            <div><strong>2MB</strong><span>Avatar limit</span></div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Quick access</p>
            <h2>Open an account directory</h2>
        </div>
        <p>Create new records or edit existing ones stored in MySQL.</p>
    </div>

    <div class="feature-grid">
        <article class="feature-card">
            <span class="card-number">01</span>
            <h3>Customer accounts</h3>
            <p>Add customers and update their contact details.</p>
            <a href="<?= site_url('customers') ?>">Open customer list <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card accent-card">
            <span class="card-number">02</span>
            <h3>User accounts</h3>
            <p>Add users, edit account details, and upload profile pictures.</p>
            <a href="<?= site_url('users') ?>">Open user list <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card">
            <span class="card-number">03</span>
            <h3>Project overview</h3>
            <p>Review the validation, update, and file upload workflow.</p>
            <a href="<?= site_url('about') ?>">Read about the project <span aria-hidden="true">&rarr;</span></a>
        </article>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
