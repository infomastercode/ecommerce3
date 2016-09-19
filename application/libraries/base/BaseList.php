<?php

class BaseList {

  private $ci;

  public function __construct() {
    $this->ci = & get_instance();
  }

  public function getProductListTotal($search, $conditions) {
    return $this->getProductList(0, 0, '', $search, $conditions, true);
  }

  public function getProductList($start, $limit, $sorts, $search, $conditions = array(), $count = false) {
    
    if ($count) {
      $column_name = column_count();
    } else {
      $column_name = "PM.*, PI.image_url_small, C.category_name ";
    }

    $sql = "SELECT $column_name "
	    . "FROM product PM "
	    . "INNER JOIN category C ON PM.id_category_default = C.id_category "
	    . "LEFT JOIN product_image PI ON PM.id_product = PI.id_product AND PI.is_default = 1 "
	    . "WHERE PM.active = 1 ";

    // condition
//    if (isset($conditions['active'])) {
//      $active = implode_comma($conditions['active']);
//      $sql.= "AND PM.active IN ('$active') ";
//    } else {
//      $sql.= "AND PM.active = 1 ";
//    }

    // search
//    $columns_unset = array('product_id', 'image_small');
//    $sql.= column_search($search, $columns, $columns_unset);
//    unset($columns_unset);

    // order by
    $sql.= order_by_limit($count, $sorts, $start, $limit);

    $query = $this->ci->db->query($sql);
    return ($count) ? $query->row()->total : $query->result_array();
  }

}
