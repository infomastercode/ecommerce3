<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view(VIEW_CATALOG_MIDDLE.'header'); ?>
  </head>
  <body>
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- menu -->
      <?php $this->load->view(VIEW_CATALOG_MIDDLE.'menu'); ?>
      <!-- #menu -->
      
      <!-- sidebar -->
      <?php if(isset($side) && $side){ $this->load->view(VIEW_CATALOG_MIDDLE.'slide'); } ?>
      <!-- #sidebar -->

      <!-- row -->
      <div class="row">
	<div class="col-md-12">
	    <?php $this->load->view($load_page); ?>
	</div>
      </div>
      <!-- #row -->

    </div>
    <!-- #Wrapper -->
    <?php $this->load->view(VIEW_CATALOG_MIDDLE.'script'); ?>
  </body>
</html>