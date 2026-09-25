<?= $this->include('layouts/header') ?>

<section class="page-intro">
    <p class="eyebrow">About Technical 2</p>
    <h1>Moving POS records from arrays into MySQL.</h1>
    <p>This version preserves the four-page CodeIgniter interface while replacing temporary arrays with models, Query Builder, and a persistent database.</p>
</section>

<section class="about-grid">
    <article class="content-card large-card">
        <p class="eyebrow">How it works</p>
        <h2>From request to database record</h2>
        <ol class="process-list">
            <li><span>1</span><div><strong>A route receives the URL.</strong><p>The route table maps each address to the correct controller method.</p></div></li>
            <li><span>2</span><div><strong>A controller asks a Model for data.</strong><p>CustomerModel and UserModel use Query Builder methods such as findAll() to retrieve database rows.</p></div></li>
            <li><span>3</span><div><strong>A view renders the records.</strong><p>The same reusable templates loop through the database results and produce the HTML interface.</p></div></li>
        </ol>
    </article>

    <aside class="content-card details-card">
        <p class="eyebrow">Current scope</p>
        <h2>Database release</h2>
        <dl>
            <div><dt>Framework</dt><dd>CodeIgniter 4</dd></div>
            <div><dt>Architecture</dt><dd>Model View Controller</dd></div>
            <div><dt>Data source</dt><dd>CodeIgniter models</dd></div>
            <div><dt>Query method</dt><dd>Query Builder findAll</dd></div>
            <div><dt>Database</dt><dd>technical2_pos</dd></div>
        </dl>
    </aside>
</section>

<?= $this->include('layouts/footer') ?>
