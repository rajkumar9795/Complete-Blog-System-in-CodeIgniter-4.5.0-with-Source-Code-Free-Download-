<?php require("pagelib.php"); ?>
<?= $this->extend('admin/shared/layout') ?>
<?= $this->section('content') ?>
<a href="<?php echo site_url('admin/index') ?>"><i class="fa fa-home"></i> Dashboard</a> / Blog Index
<h3>
    Blog Index
</h3>
<hr>

<div class="panel ">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <br>
    <a href="<?php echo site_url('blogNewRowCreate') ?>" class="btn btn-primary">
        <i class="	fa fa-plus"></i> Create New Blog
    </a>
    <br><br>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="200">Action</th>
                <th>Heading</th>
                <th>Created Date</th>
                <th>Updated Date</th>


            </tr>
        </thead>
        <tbody>

            <?php if (!empty($blogs)) : ?>
                <?php foreach ($blogs as $blog) : ?>
                    <tr>
                        <td>
                            <a href="<?= site_url('blogadd/' . $blog['ID']) ?>"
                                class="btn btn-sm btn-success">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <form action="<?= site_url('blogdelete') ?>"
                                method="post"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this blog?')">

                                <?= csrf_field() ?>
                                <input type="hidden" name="ID" value="<?= $blog['ID'] ?>">

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>

                        <td><?= esc($blog['Heading']) ?></td>
                        <td><?= $blog['CreatedDate'] ?></td>
                        <td><?= $blog['UpdatedDate'] ?></td>


                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">
                        <span style="font-size: large;color:red">
                            No blogs found
                        </span>
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>
<?= $this->endSection() ?>