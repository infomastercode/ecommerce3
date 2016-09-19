<?php

class Dashboard extends Store {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->getList();
  }

  private function getList() {
    $data = array();
    $data['sub_menu'] = 'dashboard';
    $data['text_title'] = 'Products';
    $data['action'] = '#';
    $data['add'] = '';
    $data['delete'] = '';
    $data['selector'] = array();
    $data['load_js'] = array();
    $data['load_page'] = VIEW_STORE.'/page/dashboard';
    $this->load->view(VIEW_STORE.'/middle/pattern', $data);
  }

}

// end definition

