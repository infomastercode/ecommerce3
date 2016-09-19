<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  
  private $base_context;

  public function __construct() {
    parent::__construct();
//    $this->load->library('base/BaseContext');
//    $xx = uri_string();
//    print_r($xx);
//exit;
    //$this->base_url = URL_BASE.'/store/product';
    $this->base_context = new BaseContext();
  }

  public function index() {
    $data = array();
     $data['side'] = true;
    $data['products'] = $this->base_context->getProductHome();
    //echo '<pre>'; print_r($data); exit;
    $data['load_page'] = VIEW_CATALOG_PAGE.'home';
    $this->load->view(VIEW_CATALOG_MIDDLE.'pattern', $data);
  }
  
  public function ss() {
  }

}
