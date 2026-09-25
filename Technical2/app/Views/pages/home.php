<?= $this->include('layouts/header') ?>

<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow">From arrays to a real database</p>
        <h1>Account records that persist beyond the session.</h1>
        <p class="hero-text">Technical 2 moves the POS directories into MySQL. CodeIgniter models now retrieve customer and user records with Query Builder while the familiar four-page experience stays intact.</p>
        <div class="hero-actions">
            <a class="button primary" href="<?= site_url('customers') ?>">View customers</a>
            <a class="button secondary" href="<?= site_url('users') ?>">View staff users</a>
        </div>
    </div>

    <div class="hero-panel" aria-label="Application overview">
        <p class="panel-label">System overview</p>
        <div class="metric-grid">
            <div><strong>4</strong><span>Working pages</span></div>
            <div><strong>12</strong><span>Sample accounts</span></div>
            <div><strong>MVC</strong><span>App structure</span></div>
            <div><strong>2</strong><span>Database models</span></div>
        </div>
    </div>
</section>

<section class="section-block">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Quick access</p>
            <h2>Manage the people behind each sale</h2>
        </div>
        <p>Open either account directory to review and register records stored in the MySQL database.</p>
    </div>

    <div class="feature-grid">
        <article class="feature-card">
            <span class="card-number">01</span>
            <h3>Customer accounts</h3>
            <p>Review shopper names, email addresses, and phone numbers in one responsive table.</p>
            <a href="<?= site_url('customers') ?>">Open customer list <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card accent-card">
            <span class="card-number">02</span>
            <h3>User accounts</h3>
            <p>See the usernames, full names, and assigned roles of the staff who operate the store.</p>
            <a href="<?= site_url('users') ?>">Open user list <span aria-hidden="true">&rarr;</span></a>
        </article>
        <article class="feature-card">
            <span class="card-number">03</span>
            <h3>Project overview</h3>
            <p>Learn how routes, controllers, models, views, Query Builder, and MySQL work together.</p>
            <a href="<?= site_url('about') ?>">Read about the project <span aria-hidden="true">&rarr;</span></a>
        </article>
    </div>
</section>

<?= $this->include('layouts/footer') ?>
