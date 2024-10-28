<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DICT - CI</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-static/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="theme-color" content="#712cf9">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">DICT-CI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link <?= (@$route == 'home') ? 'active' : '' ?>" aria-current="page" href="<?= base_url() ?>" onclick="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (@$route == 'about') ? 'active' : '' ?>" href="<?= base_url('/about') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (@$route == 'contactus') ? 'active' : '' ?>" href="<?= base_url('/contactus') ?>">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (@$route == 'jobs') ? 'active' : '' ?>" href="<?= base_url('job_posting') ?>">Job Posting</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php
                    $session = session();
                    if(($session->has('is_logged_in'))) { ?>
                        <?= form_open(base_url('logout')) ?>
                            <li class="nav-item"><button type="submit" class="nav-link link-body-emphasis px-2">Logout</button></li>
                        <?= form_close() ?>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= (@$route == 'login') ? 'active' : '' ?>" href="<?= base_url('/login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (@$route == 'register') ? 'active' : '' ?>" href="<?= base_url('/register') ?>">Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="bg-body-tertiary p-5 rounded">
            <?= $this->renderSection('content') ?>
        </div>
    </main>

    <?= $this->renderSection('jscript') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>