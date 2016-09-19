<?php

class BaseContext {

  private $ci;

  public function __construct() {
    $this->ci = & get_instance();
  }

  public function getCategory() {
    $sql = "SELECT * FROM category ";
    $results = $this->ci->db->query($sql)->result_array();
    return $results;
  }

  public function getAttribute() {
    $data = array();
    $sql = "SELECT A.id_attribute, A.is_color, A.attribute_name, "
	    . "AD.id_attribute_detail, AD.attribute_detail_name "
	    . "FROM attribute A "
	    . "INNER JOIN attribute_detail AD ON A.id_attribute = AD.id_attribute ";
    $results = $this->ci->db->query($sql)->result_array();
    if(isset($results) && !empty($results)){
      foreach($results as $result){
	$id_attribute = $result['id_attribute'];
	$id_attribute_detail = $result['id_attribute_detail'];
	
	$data[$id_attribute]['is_color'] = $result['is_color'];
	$data[$id_attribute]['attribute_name'] = $result['attribute_name'];
	$data[$id_attribute]['value'][$id_attribute_detail] = $result['attribute_detail_name'];
      }
    }
    return $data;
  }

  public function getProduct($id_product) {
    $data = array();
    $sql = "SELECT P.id_product, P.id_category_default, P.product_name, P.active, "
	    . "PC.id_product_combination, PC.reference, PC.ean, PC.price, PC.quantity, "
	    . "A.id_attribute, "
	    . "AD.id_attribute_detail "
	    ."FROM product P "
	    ."INNER JOIN product_combination PC ON P.id_product = PC.id_product "
	    ."LEFT JOIN product_attribute PA ON PC.id_product_combination = PA.id_product_combination "
	    ."LEFT JOIN attribute_detail AD ON PA.id_attribute_detail = AD.id_attribute_detail "
	    ."LEFT JOIN attribute A ON A.id_attribute = AD.id_attribute "
	    ."WHERE P.id_product = $id_product ";
    $results = $this->ci->db->query($sql)->result_array();

    if (isset($results) && !empty($results)) {
      foreach ($results as $result) {
	$id_product_combination = $result['id_product_combination'];
	
	$data['id_product'] = $id_product;
	$data['product_name'] = $result['product_name'];
	$data['id_category_default'] = $result['id_category_default'];
	$data['active'] = $result['active'];

	$data['combination'][$id_product_combination]['reference'] = $result['reference'];
	$data['combination'][$id_product_combination]['ean'] = $result['ean'];
	$data['combination'][$id_product_combination]['price'] = $result['price'];
	$data['combination'][$id_product_combination]['quantity'] = $result['quantity'];
	
	if(isset($result['id_attribute']) && !empty($result['id_attribute'])){
	  $id_attribute = $result['id_attribute'];
	  $data['combination'][$id_product_combination]['attributes'][$id_attribute] = $result['id_attribute_detail'];
	}
      }
    }
    
    
    
    

    $sql_category = "SELECT id_category FROM product_category WHERE id_product = $id_product ";
    $results_category = $this->ci->db->query($sql_category)->result_array();

    $assoc_arr = array_reduce($results_category, function ($result, $item) {
      $result[$item['id_category']] = $item['id_category'];
      return $result;
    }, array());

    $data['product_category'] = $assoc_arr;
    
    $sql_image = "SELECT * FROM product_image PI WHERE id_product = $id_product ";
    $data['product_image'] = $this->ci->db->query($sql_image)->result_array();

    return $data;
  }
  
  public function getProductImageLevel($product_id) {
    $sql = "SELECT MAX(level_image) 'level_max' FROM product_image WHERE id_product = $product_id ";
    return $this->ci->db->query($sql)->row()->level_max;
  }
  
  public function getProductHome() {
    $sql = "SELECT P.id_product, P.product_name, PC.price, PI.image_url_medium "
	    . "FROM product P "
	    . "INNER JOIN product_combination PC ON P.id_product = PC.id_product AND PC.is_default = 1 "
	    . "INNER JOIN product_image PI ON P.id_product = PI.id_product AND PI.is_default = 1 "
	    . "WHERE P.active = 1 ";
    return $this->ci->db->query($sql)->result_array();
  }
  
    public function getProductPreview($category, $id_product) {
    $sql = "SELECT P.id_product, P.product_name, PC.price, PI.image_url_medium "
	    . "FROM product P "
	    . "INNER JOIN product_combination PC ON P.id_product = PC.id_product AND PC.is_default = 1 "
	    . "INNER JOIN product_image PI ON P.id_product = PI.id_product AND PI.is_default = 1 "
	    . "WHERE P.active = 1 ";
    return $this->ci->db->query($sql)->result_array();
  }
  

}
