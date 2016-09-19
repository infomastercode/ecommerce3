<?php

class Product extends Store {

  public function __construct() {
    parent::__construct();
    $this->load->model('product_model');
    $this->base_url = $this->base_url.'/store/product';
  }

  public function index() {
    $this->getList();
  }

  public function add() {
    if ($this->input->post() && $this->validateForm()) {

      $value = $this->input->post();
      //echo '<pre>'; print_r($value); exit;
      $id_product = $this->product_model->addProduct($value);

      if ($value['save'] == 'save') {
	redirect($this->base_url, 'refresh');
      } else {
	$this->getFormData($id_product); // save stay
	return;
      }
    }
    $this->getForm();
  }

  public function edit($id_product = '') {
    if ($this->input->post() && $this->validateForm()) {
      $value = $this->input->post();
      //echo '<pre>'; print_r($value); exit;
      $this->product_model->editProduct($value);

      if ($value['save'] == 'save') {
	redirect($this->base_url, 'refresh');
      } else {
	$this->getFormData($id_product); // save stay
	return;
      }
    }
    $this->getFormData($id_product);
  }

  public function delete() {
    
  }

  public function uploadImage($id_product = '') {

    if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name']) && !empty($id_product)) {
      $level_max = $this->base_context->getProductImageLevel($id_product);
      $url_images = Container::uploadImage($id_product, $level_max);
      $this->product_model->updateImage($id_product, $level_max + 1, $url_images);
    }
  }

  private function getList() {
    $data = array();
    $data = $this->initForm();
    $data['action'] = '#';
    $data['add'] = $this->base_url.'/add';
    $data['delete'] = $this->base_url.'/delete';
    $data['selector'] = array(Agent::SELECTOR_ADD, Agent::SELECTOR_DELETE);
    $data['load_js'] = array('product_list');
    $data['load_page'] = VIEW_STORE.'/page/product_list';
    //echo '<pre>'; print_r($data); exit;
    $this->load->view(VIEW_STORE.'/middle/pattern', $data);
  }

  public function getListRecord() {
    if ($this->input->post()) {
      $value = $this->input->post();
      $offset = offset_dyna($value);
      list($search, $sorts, $limit, $start) = $offset;

      $conditions = array();
      $data = array();
      $data['queryRecordCount'] = $this->base_list->getProductListTotal($search, $conditions);
      $data['totalRecordCount'] = $data['queryRecordCount'];
      $data['records'] = array();
      $results = $this->base_list->getProductList($start, $limit, $sorts, $search, $conditions);
      //print_r($results); exit;
      $tmp = array();
      foreach ($results as $key => $result) {
	$tmp['row'] = $start + ($key + 1);
	$tmp['id_product'] = $result['id_product'];
	$tmp['checkbox'] = table_checkbox($result['id_product']);
	$tmp['image_url_small'] = table_image($result['image_url_small']);
	$tmp['category_name'] = $result['category_name'];
	$tmp['product_name'] = $result['product_name'];
	$tmp['date_add'] = table_date($result['date_add']);
	$tmp['option'] = table_option($this->base_url, $result['id_product'], array('edit'));

	array_push($data['records'], $tmp);
      }

      echo json_encode($data);
    }
  }

  private function getForm() {
    $data = array();
    $data = $this->initForm();
    $data['categories'] = $this->base_context->getCategory();
    $data['attributes'] = $this->base_context->getAttribute();

    $data['action'] = $this->base_url.'/add';
    $data['cancel'] = $this->base_url;
    //echo '<pre>'; print_r($data); exit;
    $this->rendorForm($data);
  }

  private function getFormData($id_product) {
    $data = array();
    $data = $this->initForm();
    $data['products'] = $this->base_context->getProduct($id_product);
    $data['categories'] = $this->base_context->getCategory();
    $data['attributes'] = $this->base_context->getAttribute();

    $data['action'] = $this->base_url.'/edit/'.$id_product;
    $data['cancel'] = $this->base_url;
//    $data['id_product'] = $id_product;
  //    echo '<pre>'; print_r($data); exit;
    $this->rendorForm($data);
  }

  public function getFormResult() {
    
  }

  public function getAjaxAttribute() {

    if ($this->input->post()) {
      $data = array();
      $attribute_group_id = $this->input->post('attribute_group_id');
      $data['attribute'] = $this->base_context->getAttribute($attribute_group_id);
      echo json_encode($data);
    }
  }

  private function validateForm() {
    return true;
  }

  private function initForm() {
    $data = array();
    $data['sub_menu'] = 'product';
    $data['text_title'] = 'Products';
    $data['form_form'] = 'form_product';
    $data['today'] = date("d-m-Y");
    return $data;
  }

  private function rendorForm($data) {
    $data['selector'] = array(Agent::SELECTOR_SAVE, Agent::SELECTOR_SAVE_STAY, Agent::SELECTOR_CANCEL);
    $data['load_js'] = array('product_form');
    $data['load_page'] = VIEW_STORE.'/page/product_form';
    $this->load->view(VIEW_STORE.'/middle/pattern', $data);
  }

}

// end definition

