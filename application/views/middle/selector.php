<div class="pull-right">
  <div class="selector">
    <?php
    if (isset($selector) && !empty($selector)) {

      if (isset($form_list) && !empty($form_list)) {
	$formdata = $form_list;
      } else if (isset($form_form) && !empty($form_form)) {
	$formdata = $form_form;
      } else {
	$formdata = '';
      }


      foreach ($selector as $select) {

	if ($select == Agent::SELECTOR_ADD) {
	  echo '<a href="'.$add.'" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a> ';
	}

	if ($select == Agent::SELECTOR_CANCEL) {
	  echo '<a href="'.$cancel.'" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a> ';
	}

	if ($select == Agent::SELECTOR_SAVE) {
	  echo '<button id="btn_save" form="'.$formdata.'" name="save" value="save" data-toggle="tooltip" title="Save" class="btn btn-primary" type="button">';
	  echo '<i class="fa fa-save"></i>';
	  echo '</button> ';
	}

	if ($select == Agent::SELECTOR_SAVE_STAY) {
	  echo '<button id="btn_save_stay" form="'.$formdata.'" name="save" value="save_stay" data-toggle="tooltip" title="Save & Stay" class="btn btn-warning" type="button">';
	  echo '<i class="fa fa-save"></i>';
	  echo '</button> ';
	}

	if ($select == Agent::SELECTOR_DELETE) {
	  echo '<button id="btn_delete" form="'.$formdata.'" link="'.$delete.'" data-toggle="tooltip" title="Delete" type="button"  class="btn btn-danger">';
	  echo '<i class="fa fa-trash-o"></i>';
	  echo '</button> ';
	}

	if ($select == Agent::SELECTOR_CONFIRM) {
	  $confirm = isset($confirm) ? $confirm : "";
	  echo '<button id="btn_confirm" form="'.$formdata.'" link="'.$confirm.'" data-toggle="tooltip" title="Confirm" class="btn btn-success" type="button">';
	  echo '<i class="fa fa-rocket"></i>';
	  echo '</button> ';
	}

	if ($select == Agent::SELECTOR_PREVIEW) {
	  echo '<button id="btn_preview" form="'.$formdata.'" data-toggle="tooltip" title="Print" class="btn btn-info" type="button">';
	  echo '<i class="fa fa-print"></i>';
	  echo '</button> ';
	}
	
	if ($select == Agent::SELECTOR_GENTASK) {
	  echo '<button id="btn_gentask" form="'.$formdata.'" data-toggle="tooltip" title="Generate Task" class="btn btn-info" type="button">';
	  echo '<i class="fa fa-plug"></i>';
	  echo '</button> ';
	}
	
	if ($select == Agent::SELECTOR_DOWNLOAD) {
	  echo '<button id="btn_download" form="'.$formdata.'" data-toggle="tooltip" title="Download" class="btn btn-success" type="button">';
	  echo '<i class="fa fa-download"></i>';
	  echo '</button> ';
	}
	
	if ($select == Agent::SELECTOR_DOWNLOAD_ALL) {
	  echo '<button id="btn_download_all" form="'.$formdata.'" data-toggle="tooltip" title="Download All" class="btn btn-info" type="button">';
	  echo '<i class="fa fa-download"></i>';
	  echo '</button> ';
	}
      }
    }
    ?>
  </div>
</div>