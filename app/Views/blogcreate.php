<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
  <script src="<?php echo base_url('AppJs/blog.jps') ?>"></script>
</head>

<body>
  <div class="container">
    <br>
    <a href="<?php echo site_url('admin/index') ?>"><i class="fa fa-home"></i> Dashboard</a> /
    <a href="<?php echo site_url('blogindex') ?>">Blog Index</a>
    / Blog Create
    <br> &nbsp;

    <form method="post" action="<?= site_url('blogupdate') ?>" enctype="multipart/form-data">
      <?= csrf_field() ?>
      <div class="row">
        <div class="col-md-8">
          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
              <?= session()->getFlashdata('success') ?>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>
          <form method="post" action="<?php echo site_url('blogupdate') ?>">

            <br />
            <input type="hidden" name="ID" value="<?php echo $rid; ?>" />
            Heading
            <input type="text" name="Heading" value="<?= esc($blog['Heading']) ?>" placeholder="Blog Heading" class="form-control" required><br>
            <textarea id="summernote" name="BlogText">
                            <?= $blog['BlogText'] ?>
          </textarea><br />
            <input type="submit" value="Update" class="btn btn-success" />
        </div>
        <!--========== Image section ==========-->
        <div class="col-md-4">
          <label class="form-label">Feature Image</label>
          <input type="file" name="feature_image" class="form-control">
          <br>
          <?php if (!empty($blog['Ext'])) : ?>
            <img src="<?= base_url('uploads/blog/' . $rid . '.' . $blog['Ext']) ?>"
              style="width: 200px;">
          <?php endif; ?>
        </div>
        <!--========== // Image section ==========-->
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('#summernote').summernote(

        {
          height: 300,
          callbacks: {
            onImageUpload: function(files) {
              uploadImage(files[0]);
            },
            onMediaDelete: function(target) {

              deleteImage(target[0].src);
            }
          }

        }
      );
    });

    function uploadImage(file) {

      let data = new FormData();
      data.append("image", file);

      $.ajax({
        url: "<?= site_url('blogimg') ?>",
        method: "POST",
        data: data,
        contentType: false,
        processData: false,
        success: function(url) {
          if (url) {
            $('#summernote').summernote('insertImage', url);
          } else {
            alert(response.message || 'Image upload failed');
          }
        },
        error: function(xhr, status, error) {
          alert('Server error while uploading image. Err Code=' + error);
          
        }
      });
    }

    function deleteImage(imageUrl) {
    
      
      $.ajax({
        url: "<?= site_url('delblogimg') ?>",
        method: "POST",
        dataType: "json",
        data: {
          image: imageUrl
        },

        success: function(response) {
          console.log(response);
          if (response.status !== 'success') {
            console.warn(response.msg);
          }
        },

        error: function(xhr) {
          console.error(xhr.responseText);
        }
      });
    }
  </script>
</body>

</html>