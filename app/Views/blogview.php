<?php require("pagelib.php"); ?>
<?= $this->extend('shared/layoutmain') ?>
<?= $this->section('content') ?>
<div class="container my-5">
  <div class="row g-4">

    <!-- MAIN BLOG CONTENT -->
    <div class="col-lg-8">

      <div class="card shadow-sm mb-4">
        <img src="<?= base_url('uploads/blog/' . $blog['ID'] . '.' . $blog['Ext']) ?>" class="card-img-top" alt="Blog Image" onerror="this.onerror=null;this.src='<?= base_url('/img/blank.jpg') ?>';">
        <div class="card-body">
          <h2 class="card-title">
            <?= esc($blog['Heading']) ?>
          </h2>
          <p class="text-muted mb-2">
            Posted on <?= esc($blog['UpdatedDate']) ?>
          </p>

          <p class="card-text">
            <?= $blog['BlogText'] ?>
          </p>


        </div>
      </div>

    </div>

    <!-- RIGHT SIDEBAR -->
    <div class="col-lg-4">

      <div class="card shadow-sm">
        <div class="card-header fw-bold">
          Recent Blogs
        </div>

        <div class="list-group list-group-flush">
          <?php if (!empty($sidebar)) : ?>
            <?php foreach ($sidebar as $item) : ?>
              <?php if (($item['Heading']) != "") : ?>
                <a href="<?= site_url('blogview/' . $item['ID']) ?>" class="list-group-item list-group-item-action d-flex gap-3">
                  <img src="<?= base_url('uploads/blog/' . $item['ID'] . '.' . $item['Ext']) ?>" class="rounded" onerror="this.onerror=null;this.src='<?= base_url('/img/blank.jpg') ?>';" style="width: 100px" loading="lazy"
     decoding="async">
                  <div>
                    <h6 class="mb-1"><?= esc($item['Heading']) ?></h6>
                    <small class="text-muted"><?= esc($item['UpdatedDate']) ?></small>
                  </div>
                </a>
              <?php endif; ?>


            <?php endforeach; ?>
          <?php else : ?>

            <h6 style="font-size: large;color:red;text-align: center;">
              No blogs found
            </h6>

          <?php endif; ?>




        </div>
      </div>

    </div>

  </div>
</div>
<?= $this->endSection() ?>