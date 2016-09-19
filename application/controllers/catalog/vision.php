<?php

class Vision extends CI_Controller {
  
  private $base_context;
  
  public function __construct() {
    parent::__construct();
    
    
    $this->base_context = new BaseContext();
  }
  
  public function index(){

  }
  
  public function preview($category = '', $id_product = ''){
    $data = array();
    
    $data['products'] = $this->base_context->getProductPreview($category, $id_product);
    $data['load_page'] = VIEW_CATALOG_PAGE.'preview';
    $this->load->view(VIEW_CATALOG_MIDDLE.'pattern', $data);
    

  }
  
  
}