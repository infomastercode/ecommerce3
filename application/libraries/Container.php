<?php

class Container {

  private static $ci;

  public function __construct() {
    self::$ci = & get_instance();
  }

  public static function uploadImage($id_product, $level_max) {
    $prefix_image = 'PIMG_';
    $config['upload_path'] = PATH_IMAGE.'/product';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['file_name'] = $prefix_image.$id_product.'_'.$level_max.'_default';
    $config['max_size'] = '780';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';

    self::$ci->load->library('upload', $config);

    if (!self::$ci->upload->do_upload()) {
      $error = array('error' => self::$ci->upload->display_errors());
      print_r($error);
      return false;
    } else {
      
      $path_source = self::$ci->upload->data('full_path');
      $ext = self::$ci->upload->data('file_ext');
      //$sizes = array('35x35', '74x74', '250x250', '340x340');
      $sizes = array('64x64', '250x250', '340x340');

      return self::resizeImage($id_product, $prefix_image, $path_source, $ext, $sizes, $level_max);
    }
  }

  private static function resizeImage($result_id, $prefix_image, $path_source, $ext, $sizes, $level_max) {
    $url_image_array = array();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $path_source; // $_FILES['image']['tmp_name'];
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = TRUE;

    foreach ($sizes as $size) {
      
      $dimension = explode('x', $size);
      $weight = $dimension[0];
      $height = $dimension[1];

      $img_name = $prefix_image.$result_id.'_'.$level_max.'_'.$size.$ext;
      $config['width'] = $weight;
      $config['height'] = $height;
      $config['new_image'] = PATH_IMAGE.'/product/'.$img_name; //pm_1_35x35

      //self::$ci->image_lib->clear();
      self::$ci->load->library('image_lib', $config);
      self::$ci->image_lib->initialize($config);

      if (!self::$ci->image_lib->resize()) {
	echo self::$ci->image_lib->display_errors();
      } else {
	$url_image_array[] = URL_BASE_IMAGE_PRODUCT.'/'.$img_name;
      }
    }
    
    //print_r($url_image_array); exit;
    return $url_image_array;
  }

  
}
