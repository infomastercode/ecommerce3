<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view(VIEW_STORE.'/middle/header'); ?>
  </head>
  <body>
    <!-- wrapper -->
    <div id="wrapper">
      <!-- sidebar -->
      <?php $this->load->view(VIEW_STORE.'/middle/menu', $sub_menu); ?>
      <!-- #sidebar -->

      <nav class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
	  <a href="#menu-toggle" class="btn btn-default navbar-btn" id="menu-toggle">Sign in</a>
	</div>
      </nav>

      <!-- page content -->
      <div id="page-content-wrapper">
	<div class="container-fluid">

	  <!-- page heading -->
          <div class="row">
            <div class="col-md-12">
	      <strong><?php echo $text_title; ?></strong>
	      <?php $this->load->view('middle/selector', isset($selector) ? $selector : ''); ?>
	      <hr>
            </div>
          </div>
          <!-- #page heading -->
	  
	  <!-- row -->
          <div class="row">
	    <div class="col-md-12">
	      <form action="<?php echo $action; ?>" id="<?php echo $form_form; ?>" method="post" onkeypress="return event.keyCode != 13" enctype="multipart/form-data" class="form-horizontal">

		<?php $this->load->view($load_page); ?>

	      </form>
	    </div>
          </div>
          <!-- #row -->
	  
	</div>
      </div>
      <!-- #page content -->
    </div>
    <!-- #wrapper -->

    <!-- script -->
    <?php $this->load->view(VIEW_STORE.'/middle/script'); ?>

    <?php
    if (isset($load_js) && !empty($load_js)) {
      foreach ($load_js as $js) {
	$path_js = URL_BASE_STORE."/assets/javascript/".$js.".js";
	echo "<script type=\"text/javascript\" src=\"$path_js\"></script>\n";
      }
    }
    ?>

  </body>
</html>