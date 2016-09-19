<div class="content">

  <!-- nav tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_product" aria-controls="home" role="tab" data-toggle="tab">Product</a></li>
    <li><a href="#tab_combination" aria-controls="profile" role="tab" data-toggle="tab">Combination</a></li>
    <li><a href="#tab_image" aria-controls="settings" role="tab" data-toggle="tab">Image</a></li>
  </ul>
  <!-- #nav tabs -->
  <br>

  <!-- tab panel -->
  <div class="tab-content">
    <!-- product -->
    <div class="tab-pane active" id="tab_product">

      <div class="form-group">
	<label class="col-md-2 control-label">Product Name</label>
	<div class="col-md-10">
	  <input type="text" name="product_name" id="input_product_name" value="<?php echo isset($products['product_name']) ? $products['product_name'] : ''; ?>"   class="form-control">
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">category</label>
	<div class="col-md-10">
	  <ul id="input_category">
	    <?php
	    if (isset($categories) && !empty($categories)) {
	      foreach ($categories as $category) {
		$checked = isset($products['product_category'][$category['id_category']]) ? 'checked' : '';
		echo "<li><input type='checkbox' name='category[]' value='{$category['id_category']}' $checked> {$category['category_name']}</li>";
	      }
	    }
	    ?>
	  </ul>
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Category Default</label>
	<div class="col-md-10">
	  <select name="id_category_default" id="input_id_category_default" class="form-control">
	    <option value="">---</option>
	    <?php
	    if (isset($categories) && !empty($categories)) {
	      foreach ($categories as $category) {
		$selected = isset($products['id_category_default']) && $products['id_category_default'] == $category['id_category'] ? 'selected' : '';
		echo "<option value='{$category['id_category']}' $selected >{$category['category_name']}</option>";
	      }
	    }
	    ?>
	  </select>
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Active</label>
	<div class="col-md-10">
	  <input type="checkbox" name="active" id="input_active" checked>
	</div>
      </div>

    </div>
    <!-- #product -->
    <!-- combination -->
    <div class="tab-pane" id="tab_combination">

      <div class="form-group">
	<label class="col-md-2 control-label">Combination List</label>
	<div class="col-md-10">
	  <div id="input_list_combination" class="list-group">
	    <?php
	    if (isset($products['combination']) && !empty($products['combination'])) {
	      foreach ($products['combination'] as $id_combination => $combination) {
		echo "<div>";
		echo "<button type='button' class='list-group-item'>Ref : {$combination['reference']}  - Price : {$combination['price']} - Qty {$combination['quantity']}</button>";
		if (isset($combination['attributes']) && !empty($combination['attributes'])) {
		  foreach ($combination['attributes'] as $id_attribute => $attribute) {
		    echo "<input type='hidden' name='combination[$id_combination][attribute][]' value='$attribute'>";
		  }
		}
		echo "<input type='hidden' name='combination[$id_combination][id_product_combination]' value='$id_combination'>";
		echo "<input type='hidden' name='combination[$id_combination][reference]' value='{$combination['reference']}'>";
		echo "<input type='hidden' name='combination[$id_combination][ean]' value='{$combination['ean']}'>";
		echo "<input type='hidden' name='combination[$id_combination][price]' value='{$combination['price']}'>";
		echo "<input type='hidden' name='combination[$id_combination][quantity]' value='{$combination['quantity']}'>";
		echo "</div>";
	      }
	    }
	    ?>
	  </div>
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Attribute</label>
	<div class="col-md-10">
	  <div id="input_list_attribute">
	    <?php
	    if (isset($attributes) && !empty($attributes)) {
	      foreach ($attributes as $id_attribute => $attribute) {
		echo "<div class = 'checkbox panel_attribute'>";
		echo "<label>";
		echo "<input type = 'checkbox' value = '' class='control_attribute' text='{$attribute['attribute_name']}'>{$attribute['attribute_name']}";
		echo " : ";
		echo "</label>";
		foreach ($attribute['value'] as $id_attribute_group => $attrinute_detail_name) {
		  echo " ";
		  echo "<input type ='radio' value = '$id_attribute_group' class='control_attribute_detail' text='$attrinute_detail_name' disabled> $attrinute_detail_name";
		}
		echo "</div>";
	      }
	    }
	    ?>
	  </div>
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Reference</label>
	<div class="col-md-10">
	  <input type="text" id="input_reference" class="form-control">
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">EAN</label>
	<div class="col-md-10">
	  <input type="text" id="input_ean" class="form-control">
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Price</label>
	<div class="col-md-10">
	  <input type="text" id="input_price" class="form-control">
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Quantity</label>
	<div class="col-md-10">
	  <input type="text" id="input_quantity" class="form-control">
	</div>
      </div>

      <div class="row">
	<label class="col-md-2 control-label">
	  Image
	</label>

	<div class="panel_image">

	  <?php
	  if (isset($products['product_image']) && !empty($products['product_image'])) {
	    foreach ($products['product_image'] as $product_image) {
	      echo "<div class='col-md-1'>";
	      echo "<input type='checkbox' value='{$product_image['id_product_image']}'>";
	      echo "<a href='#' class='thumbnail'>";
	      echo "<img src='{$product_image['image_url_medium']}' width='74' height='74' alt=''>";
	      echo "</a>";
	      echo "</div>";
	    }
	  }
	  ?>

	</div>
      </div>


      <div class="form-group">
	<label class="col-md-2 control-label">Option</label>
	<div class="col-md-10">
	  <button type="button" class="btn btn-primary" id="btn_add_conbination">A</button>
	  <button type="button" class="btn btn-danger" id="btn_del_combinaion">D</button>
	</div>
      </div>

    </div>
    <!-- #combination -->
    <!-- image -->
    <div  class="tab-pane" id="tab_image">
      <div class="form-group">
	<label class="col-md-2 control-label">Chosen</label>
	<div class="col-md-10">
	  <input type="file" name="userfile" id="input_image" multiple="multiple">
	</div>
      </div>

      <div class="form-group">
	<label class="col-md-2 control-label">Upload</label>
	<div class="col-md-10">
	  <button type="button" class="btn btn-primary" id="btn_upload_image" >Upload</button>
	</div>
      </div>

      <?php
      if (isset($products['product_image']) && !empty($products['product_image'])) {
	foreach ($products['product_image'] as $product_image) {
	  echo "<div class = 'row'>";
	  echo "<label class = 'col-md-2 control-label'>Image</label>";
	  echo "<div class = 'col-md-2'>";
	  echo "<a href = '#' class = 'thumbnail'>";
	  echo "<img src = '".$product_image['image_url_medium']."' alt = ''>";
	  echo '</a>';
	  echo '</div>';
	  echo '</div>';
	}
      }
      ?>
    </div>
    <!-- #image -->

  </div>
  <!-- #tab panel -->
  <input type="hidden" id="input_id_product" name="id_product" value="<?php echo isset($products['id_product']) ? $products['id_product'] : ''; ?>">
</div>
