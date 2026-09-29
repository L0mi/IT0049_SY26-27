<?= $this->include('layouts/header') ?>

<section class="page-intro">
    <p class="eyebrow">About Technical 3</p>
    <h1>Validated forms and profile pictures.</h1>
    <p>This version adds create and edit forms, server-side validation, and prepared avatar images to the database-backed POS project.</p>
</section>

<section class="about-grid">
    <article class="content-card large-card">
        <p class="eyebrow">How it works</p>
        <h2>How a form is processed</h2>
        <ol class="process-list">
            <li><span>1</span><div><strong>The form sends the values.</strong><p>Create and edit pages submit to their controller routes.</p></div></li>
            <li><span>2</span><div><strong>The controller validates them.</strong><p>Invalid entries return to the form with errors and the previous values.</p></div></li>
            <li><span>3</span><div><strong>The model saves valid data.</strong><p>Uploaded avatars are resized, and only the generated filename is stored.</p></div></li>
        </ol>
    </article>

    <aside class="content-card details-card">
        <p class="eyebrow">Project details</p>
        <h2>Technical 3</h2>
        <dl>
            <div><dt>Framework</dt><dd>CodeIgniter 4</dd></div>
            <div><dt>Architecture</dt><dd>Model View Controller</dd></div>
            <div><dt>Validation</dt><dd>CodeIgniter rules</dd></div>
            <div><dt>Images</dt><dd>320 × 320 JPG</dd></div>
            <div><dt>Database</dt><dd>technical3_pos</dd></div>
        </dl>
    </aside>
</section>

<?= $this->include('layouts/footer') ?>
