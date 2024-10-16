<!doctype html>
<html>
<head>
    <title>DICT</title>
</head>
<body>
    <a href="<?= base_url() ?>">Home</a>
    <a href="<?= base_url('/about') ?>">About</a>
    <a href="<?= base_url('/contactus') ?>">Contact Us</a>
    <a href="<?= base_url('/job_posting') ?>">Job Postings</a>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>