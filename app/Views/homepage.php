<?php require("pagelib.php"); ?>
<?= $this->extend('shared/layoutmain') ?>
<?= $this->section('content') ?>
<div class="container">
  <br>
  <h1 style="text-align: center;">
    Welcome to My Blog
  </h1>
  <hr>
  <div class="row">
    <?php if (!empty($blogs)) : ?>
      <?php foreach ($blogs as $blog) : ?>
        <?php if (($blog['Heading'])!="") : ?>
          <div class="col-md-4" style="margin-bottom: 20px;">

            <div class="card h-100 shadow-sm">
              <img src="<?= base_url('uploads/blog/' . $blog['ID'] . '.' . $blog['Ext']) ?>" class="card-img-top" alt="Blog Image" onerror="this.onerror=null;this.src='<?= base_url('/img/blank.jpg') ?>';" loading="lazy"
     decoding="async">
              <div class="card-body">
                <h5 class="card-title">
                  <?= esc($blog['Heading']) ?>
                </h5>

              </div>
              <div class="card-footer bg-white border-0">
                <a href="<?= site_url('blogview/' . $blog['ID']) ?>" class="btn btn-primary btn-sm">Read More</a>
              </div>
            </div>
          </div>
        <?php endif; ?>

      <?php endforeach; ?>
    <?php else : ?>

      <h4 style="font-size: large;color:red;text-align: center;">
        No blogs found
      </h4>

    <?php endif; ?>

  </div>
</div>

<?= $this->endSection() ?>