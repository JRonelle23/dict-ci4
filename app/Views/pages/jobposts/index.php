<?= $this->extend('app') ?>

<?= $this->section('content') ?>
    <h1>Job Posting <a type="button" class="btn btn-success" href="<?= base_url('job_posting/new' )?>"><i class=""></i> New</a></h1>

    <?php //var_dump($data['jobs']);exit(); ?>
    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Salary</th>
            <th scope="col">Date Posted</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['jobs'] as $i => $j) { ?>
        <tr>
            <td scope="row"><?= $i+1 ?></td>
            <td><?= $j['name'] ?></td>
            <td><?= $j['description'] ?></td>
            <td><?= $j['salary'] ?></td>
            <td><?= $j['date_post'] ?></td>
            <td>
                <a type="button" class="btn btn-primary" href="<?= base_url('/job_posting/' . $j['id']) . '/edit'?>">Edit</a>
                <button type="button" class="btn btn-danger button-delete-jobs" data-bs-toggle="modal" data-bs-target="#exampleModal" data-uri="<?= base_url('/job_posting/' . $j['id']) ?>">
                    Delete
                </button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warning</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this job?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form id="form_delete" method="POST" action="#">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-primary" >Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('jscript') ?>
<script>
    $(function(){
        $('.button-delete-jobs').click(function() {
            let uri = $(this).data("uri")
            $('#form_delete').attr('action', uri)
        })
    });
</script>
<?= $this->endSection() ?>
