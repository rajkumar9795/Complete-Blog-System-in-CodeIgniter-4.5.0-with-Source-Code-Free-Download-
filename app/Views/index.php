<?php require("pagelib.php"); ?>
<?= $this->extend('shared/layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <h2>Admin Dashboard</h2>
        <h5>Welcome , Love to see you back. </h5>
    </div>
</div>
<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <a href="<?php echo site_url('blogindex') ?>">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">
                        <?php
                        echo $count;
                        ?>
                    </p>
                    <p class="text-muted">Total Blogs</p>
                </div>
            </div>
        </a>

    </div>



</div>

<?= $this->endSection() ?>