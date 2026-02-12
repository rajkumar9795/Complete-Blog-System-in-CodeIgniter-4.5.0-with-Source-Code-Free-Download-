

<!DOCTYPE html>
<html >
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('adminasset/css/bootstrap.css')?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('adminasset/css/font-awesome.css')?>" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo base_url('adminasset/js/morris/morris-0.4.3.min.css')?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('adminasset/css/custom.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('adminasset/js/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans') rel='stylesheet' type='text/css' />
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <?= $this->renderSection('head') ?>
</head>
<body>
    <div id="wrapper">
         <?= $this->include('shared/menu') ?>
         <div id="page-wrapper" >
            <div id="page-inner">
   
    <?= $this->renderSection('content') ?>
            </div>
        </div>
   </div>
     <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('adminasset/js/jquery-1.10.2.js')?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('adminasset/js/bootstrap.min.js')?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('adminasset/js/jquery.metisMenu.js')?>"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url('adminasset/js/morris/raphael-2.1.0.min.js')?>"></script>
    <script src="<?php echo base_url('adminasset/js/morris/morris.js')?>"></script>
      <!-- CUSTOM SCRIPTS -->
    
     <script src="<?php echo base_url('adminasset/js/dataTables/jquery.dataTables.js')?>"></script>
     <script src="<?php echo base_url('adminasset/js/dataTables/dataTables.bootstrap.js')?>"></script>
      <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                     "order": []
                    });

            });
    </script>
    <script src="<?php echo base_url('adminasset/js/custom.js')?>"></script>
</body>
</html>    