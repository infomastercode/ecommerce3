<?php

class Product_model extends CI_Model {

  public function addProduct($data) {

    //echo '<pre>';print_r($data); exit;

    $today = datetime_today();
    $data_add = array();
    $data_add['id_store'] = '';
    $data_add['id_category_default'] = $data['id_category_default'];
    $data_add['on_sales'] = 0;
    $data_add['product_name'] = $data['product_name'];
    $data_add['description'] = '';
    $data_add['product_width'] = 0;
    $data_add['product_height'] = 0;
    $data_add['product_depth'] = 0;
    $data_add['product_weight'] = 0;
    $data_add['condition'] = 'new';
    $data_add['active'] = is_active($data['active']);
    $data_add['date_add'] = $today;
    $data_add['date_upd'] = $today;
    $this->db->insert('product', $data_add);
    $id_product = $this->db->insert_id();

    if (isset($data['combination']) && !empty($data['combination'])) {
      foreach ($data['combination'] as $level => $combination) {
	$data_combination = array();
	$data_combination['id_product'] = $id_product;
	$data_combination['reference'] = $combination['reference'];
	$data_combination['ean'] = $combination['ean'];
	$data_combination['price'] = $combination['price'];
	$data_combination['quantity'] = $combination['quantity'];
	$data_combination['is_default'] = 0;
	$this->db->insert('product_combination', $data_combination);
	$id_product_combination = $this->db->insert_id();

	if (isset($combination['attribute']) && !empty($combination['attribute'])) {
	  foreach ($combination['attribute'] as $id_attribute_detail) {
	    $data_attribute = array();
	    $data_attribute['id_product_combination'] = $id_product_combination;
	    $data_attribute['id_attribute_detail'] = $id_attribute_detail;
	    $this->db->insert('product_attribute', $data_attribute);
	  }
	}
      }
    }

    if (isset($data['category']) && !empty($data['category'])) {
      foreach ($data['category'] as $id_category) {
	$data_category = array();
	$data_category['id_product'] = $id_product;
	$data_category['id_category'] = $id_category;
	$product_category = $this->db->insert('product_category', $data_category);
      }
    }

    return $id_product;
  }

  public function updateImage($id_product, $level_image, $url_images = array()) {
    $data_image = array();
    $data_image['id_product'] = $id_product;
    $data_image['level_image'] = $level_image;
    $data_image['image_type'] = 'normal';
    $data_image['image_url_small'] = $url_images[0];
    $data_image['image_url_medium'] = $url_images[1];
    $data_image['image_url_large'] = $url_images[2];
    $data_image['is_default'] = 0;
    $product_image = $this->db->insert('product_image', $data_image);
    return $product_image;
  }

  function editProduct($data) {
    //echo '<pre>'; print_r($data); exit;
    $id_product = $data['id_product'];
    $today = datetime_today();

    /* begin product */
    $data_upd = array();
    $data_upd['id_category_default'] = $data['id_category_default'];
    $data_upd['on_sales'] = 0;
    $data_upd['product_name'] = $data['product_name'];
    $data_upd['description'] = '';
    $data_upd['product_width'] = 0;
    $data_upd['product_height'] = 0;
    $data_upd['product_depth'] = 0;
    $data_upd['product_weight'] = 0;
    $data_upd['condition'] = 'new';
    $data_upd['active'] = is_active($data['active']);
    $data_upd['date_upd'] = $today;
    $this->db->where('id_product', $id_product);
    $this->db->update('product', $data_upd);


    foreach ($data['combination'] as $level => $combination) {

      $data_combination = array();
      $data_combination['id_product'] = $id_product;
      $data_combination['reference'] = $combination['reference'];
      $data_combination['ean'] = $combination['ean'];
      $data_combination['price'] = $combination['price'];
      $data_combination['quantity'] = $combination['quantity'];
      $data_combination['is_default'] = 0;

      if (isset($combination['id_product_combination']) && !empty($combination['id_product_combination'])) {
	$id_product_combination = $combination['id_product_combination'];
	$this->db->where('id_product_combination', $id_product_combination);
	$this->db->update('product_combination', $data_combination);
      } else {
	$this->db->insert('product_combination', $data_combination);
	$id_product_combination = $this->db->insert_id();
      }

      if (isset($combination['attribute']) && !empty($combination['attribute'])) {
	foreach ($combination['attribute'] as $id_attribute_detail) {
	  $data_attribute = array();

	  $sql = "SELECT id_product_attribute "
		  ."FROM product_attribute "
		  ."WHERE id_product_combination = $id_product_combination AND id_attribute_detail = $id_attribute_detail ";
	   $result_attribute = $this->db->query($sql)->row();
	   $id_product_attribute =  isset($result_attribute->id_product_attribute) ? $result_attribute->id_product_attribute : '';

	  $data_attribute['id_product_combination'] = $id_product_combination;
	  $data_attribute['id_attribute_detail'] = $id_attribute_detail;

	  if (isset($id_product_attribute) && !empty($id_product_attribute)) {
	    $this->db->where('id_product_attribute', $id_product_attribute);
	    $this->db->update('product_attribute', $data_attribute);
	  } else {
	    $this->db->insert('product_attribute', $data_attribute);
	  }
	}
      }

      if (isset($combination['product_image']) && !empty($combination['product_image'])) {
	foreach ($combination['product_image'] as $product_image) {
	  $data_image = array();
	  $data_image['id_product_combination'] = $id_product_combination;
	  $data_image['id_product_image'] = $product_image;
	  $data_image['is_default'] = 0;

	  $this->db->insert('product_combination_image', $data_image);
	}
      }
    }
 
    
  }

  function deleteProduct($products_id) {
    
  }

}

// end defintion