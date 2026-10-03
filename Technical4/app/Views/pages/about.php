<?= $this->include('layouts/header') ?>

<section class="page-intro">
    <p class="eyebrow">About Technical 4</p>
    <h1>Sessions and authentication.</h1>
    <p>This version restricts account management to users whose credentials match a stored password hash.</p>
</section>

<section class="about-grid">
    <article class="content-card large-card">
        <p class="eyebrow">How it works</p>
        <h2>How access is checked</h2>
        <ol class="process-list">
            <li><span>1</span><div><strong>The login form sends credentials.</strong><p>The controller finds the username and verifies the password hash.</p></div></li>
            <li><span>2</span><div><strong>The session stores the user.</strong><p>A successful login records the authorized user's ID and name.</p></div></li>
            <li><span>3</span><div><strong>The filter protects account routes.</strong><p>Logged-out visitors are redirected to the login page.</p></div></li>
        </ol>
    </article>

    <aside class="content-card details-card">
        <p class="eyebrow">Project details</p>
        <h2>Technical 4</h2>
        <dl>
            <div><dt>Framework</dt><dd>CodeIgniter 4</dd></div>
            <div><dt>Architecture</dt><dd>Model View Controller</dd></div>
            <div><dt>Authentication</dt><dd>Hashed passwords</dd></div>
            <div><dt>Access control</dt><dd>Auth filter</dd></div>
            <div><dt>Database</dt><dd>technical4_pos</dd></div>
        </dl>
    </aside>
</section>

<?= $this->include('layouts/footer') ?>
