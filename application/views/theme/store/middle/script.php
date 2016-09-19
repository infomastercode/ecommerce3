<input type="hidden" value="<?php echo DIR_BASE_URL; ?>" id="base_url">



<!-- jQuery -->
<script src="<?php echo URL_BASE_ASSETS; ?>/js/jquery-3.1.0.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo URL_BASE_ASSETS; ?>/plugin/bootstrap-3.3.7/js/bootstrap.min.js"></script>

<script src="<?php echo URL_BASE_ASSETS; ?>/plugin/dynatable/jquery.dynatable.js"></script>

<script src="<?php echo URL_BASE_ASSETS; ?>/javascript/prototype_function.js"></script>

<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
  
  var base_url = $("#base_url").val();
</script>