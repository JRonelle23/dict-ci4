<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h3>Edit New Job Post</h3>
    <?php if (validation_errors()) { ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <div>
            <?= validation_list_errors() ?>
        </div>
    </div>
    <?php } ?>

    <?= form_open(base_url('job_posting/' .  $data['id'])) ?>
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Position" value="<?= $data['name'] ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="<?= $data['description'] ?>">
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control" id="salary" max="999999" min="1" step="0.01" value="<?= $data['salary'] ?>">
        </div>
        <div class="form-group">
            <label for="date_post">Date Posted</label>
            <input type="date" name="date_post"  class="form-control" id="date_post" value="<?= $data['date_post'] ?>">
        </div>
        <div style="float: right; margin-top: 5px;">
            <a type="button" class="btn btn-danger" href="<?= base_url('job_posting') ?>">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    <?= form_close() ?>
<?= $this->endSection() ?>