<?php

class Product extends CI_Controller {

  public function __construct() {
    parent::__construct();

  }

  public function index() {
    $this->getList();
  }

  public function add() {
//    if ($this->input->post() && $this->validateForm()) {
//      $value = $this->input->post();
//
//    }
//    $this->getForm();
  }

  private function updateImage($result_id, $path_small) {
    //$this->product_model->updateImage($result_id, $path_small);
  }

  public function edit($product_id = null) {

  }

  public function delete() {

  }

  private function getList() {
    $data = $this->initForm();
    $data['action'] = '#';
//    $data['add'] = $this->base_url.'/add';
//    $data['delete'] = $this->base_url.'/delete';
//    $data['selector'] = array(Agent::SELECTOR_ADD, Agent::SELECTOR_DELETE);

//    $data['load_js'] = array('additional/part/product_list');
//    $data['load_menu'] = 'admin';
//    $data['load_page'] = VIEW_ADMIN_PAGE.'product_list';
//    $this->load->view(VIEW_ADMIN_MIDDLE.'pattern', $data);
    exit;
    $this->load->view(VIEW_STORE_PAGE.'product_list', $data);
  }

  public function getListRecord() {

  }

  private function getForm($product_id = null) {

  }

  private function getFormData($product_id) {

  }


  public function getFormResult() {

  }



  private function validateForm() {
    return true;
  }

  private function initForm() {
    $data = array();
    $data['sub_menu'] = 'product';
    $data['text_title'] = 'Products';
    $data['text_panel_title'] = 'Products List';
    $data['form_form'] = 'form_product';
    $data['today'] = date("d-m-Y");
    return $data;
  }

  private function rendorForm($data) {
    $data['selector'] = array(Agent::SELECTOR_SAVE, Agent::SELECTOR_SAVE_STAY, Agent::SELECTOR_CANCEL);
    $data['load_js'] = array('additional/part/product_form');
    $data['load_page'] = 'theme/part/product_form';
    $data['load_menu'] = 'catalog';
    $this->load->view('layout/middle/pattern', $data);
  }

}

// end definition

