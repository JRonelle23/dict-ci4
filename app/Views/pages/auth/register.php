<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <div class="w-50" style="margin: auto">
        <h3 class="text-center">Register</h3>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <div>
                    <?= validation_list_errors() ?>
                </div>
            </div>
        <?php } ?>
        <?= form_open(base_url('/register')) ?>
        <div class="form-group mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?= @$data['name'] ?: '' ?>">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="description" value="<?= @$data['email'] ?: '' ?>">
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group mb-2">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password">
        </div>

        <div style="float: right; margin-top: 5px;">
            <a type="button" class="btn btn-danger" href="<?= base_url('/') ?>">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?= form_close() ?>
    </div>
<?= $this->endSection() ?>