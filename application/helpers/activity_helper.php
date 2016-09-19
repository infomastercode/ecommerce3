<?php

function is_active($data) {
  return $data == 'on' ? 1 : 0;
}

function datetime_today() {
  return date("Y-m-d H:i:s");
}

function offset_dyna($value) {

  $data = array(
      isset($value['queries']['search']) ? $value['queries']['search'] : '',
      isset($value['sorts']) ? $value['sorts'] : '',
      $value['perPage'],
      $value['offset']
  );

  return $data;
}

function column_count() {
  return "count(1) as 'total'";
}

function order_by_limit($count, $sorts, $start, $limit) {

  $sql = '';

  if ($count) {
    return $sql;
  }

  $sql = '';
  if (!empty($sorts)) {

    $order_by = key($sorts);
    $key = reset($sorts);

    if ($key == 1) {
      $sort = "DESC";
    } else {
      $sort = "ASC";
    }


    $sql.= "ORDER BY $order_by $sort ";
  }

  if (!empty($limit)) {
    $sql.= "LIMIT ".$start.", ".$limit;
  }

  return $sql;
}

function table_checkbox($identifier, $check = false) {
  $checked = ($check) ? 'checked' : '';
  return "<input type='checkbox' name='selected[]' class='selected' value='$identifier' $checked >";
}

function table_image($image) {
  if (empty($image)) {
    $image = URL_BASE_IMAGE_DEFAULT.'/default_40x40.jpg';
  }
  return "<img src=".$image." width='35' class='img-thumbnail'>";
}

function table_date($date) {
  return date("d-m-Y", strtotime($date));
}

function table_option($redirect, $identifier, $options = array()) {
  $html = '';
  foreach ($options as $option) {

    if ($option == 'edit') {
      $btn_class = "btn btn-primary btn-sm";
      $icon = "<i class='fa fa-pencil'></i>";
    } else if ($option == 'delete') {
      
    } else if ($option == 'view') {
      
    } else {
      
    }

    $url = $redirect."/".$option."/".$identifier;

    $html.= "<a href='$url' data-toggle='tooltip' title='$option' class='$btn_class'>$icon</a> ";
  }

  return $html;
}

function array_map_key($data, $keyxx) {

  // echo '<pre>'; print_r($data); exit;
  $s = '';
  $assoc_arr = array_reduce($data, function ($result, $item) {
    $result[$item['id_category']] = $item[$keyxx];
    return $result;
  }, $keyxx);

  return $assoc_arr;
}

function set_image($result_id, $img_dir_name) {
  
  $setimage = array('path' => $img_dir_name,
      'img_default' => $img_dir_name.'_default_',
      'img_medium' => $img_dir_name.'_medium_',
      'img_small' => $img_dir_name.'_small_'
  );

  $url_small = Container::uploadImage($result_id, $setimage);
  return $url_small;
}
