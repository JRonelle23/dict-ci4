<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <div class="w-50" style="margin: auto">
        <h3>Login Form</h3>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <?= validation_list_errors() ?>
                </div>
            </div>
        <?php } ?>
        <?= form_open(base_url('authenticate')) ?>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="description" value="<?= @$data['email'] ?: '' ?>">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div style="float: right; margin-top: 5px;">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
        <?= form_close() ?>
    </div>
<?= $this->endSection() ?>