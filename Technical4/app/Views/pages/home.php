<?= $this->include('layouts/header') ?>

<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow">Sessions and authentication</p>
        <h1>Account management for authorized staff.</h1>
        <p class="hero-text">Customer and user records are protected by a login session and a CodeIgniter authentication filter.</p>
        <div class="hero-actions">
            <?php if (session()->get('user_id')): ?>
                <a class="button primary" href="<?= site_url('customers') ?>">View customers</a>
                <a class="button secondary" href="<?= site_url('users') ?>">View staff users</a>
            <?php else: ?>
                <a class="button primary" href="<?= site_url('login') ?>">Log in</a>
            <?php endif ?>
        </div>
    </div>

    <div class="hero-panel" aria-label="Application overview">
        <p class="panel-label">System overview</p>
        <div class="metric-grid">
            <div><strong>AUTH</strong><span>Protected routes</span></div>
            <div><strong>12</strong><span>Sample accounts</span></div>
            <div><strong>MVC</strong><span>App structure</span></div>
            <div><strong>HASH</strong><span>Secure passwords</span></div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Quick access</p>
            <h2>Protected POS account tools</h2>
        </div>
        <p>Log in before opening or changing customer and user records.</p>
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
            <p>Review the session, password, and route-filter workflow.</p>
            <a href="<?= site_url('about') ?>">Read about the project <span aria-hidden="true">&rarr;</span></a>
        </article>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
