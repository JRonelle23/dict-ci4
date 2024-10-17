<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h3>Create New Job Post</h3>
    <?= validation_list_errors() ?>

    <?= form_open(base_url('job_posting')) ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Position" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" step="0.01" class="form-control" id="salary" placeholder="10000">
        </div>
        <div class="form-group">
            <label for="date_post">Date Posted</label>
            <input type="date" name="date_post"  class="form-control" id="date_post">
        </div>
        <div style="float: right; margin-top: 5px;">
            <a type="button" class="btn btn-danger" href="<?= base_url('job_posting') ?>">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    <?= form_close() ?>
<?= $this->endSection() ?>