<?php
  
  $dashboard = '';
  $product = '';

  switch ($sub_menu){
    case 'dashboard' : $dashboard = 'active'; break;
    case 'product' : $product = 'active'; break;
  }

?>

<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="#">
	Start Bootstrap
      </a>
    </li>
    <li class="<?php echo $dashboard; ?>">
      <a href="<?php echo URL_BASE; ?>/store/dashboard">Dashboard</a>
    </li>
    <li class="<?php echo $product; ?>">
      <a href="<?php echo URL_BASE; ?>/store/product">Product</a>
    </li>
    <li>
      <a href="<?php echo URL_BASE; ?>/store/orders">Orders</a>
    </li>
    <li>
      <a href="#">Events</a>
    </li>
    <li>
      <a href="#">About</a>
    </li>
    <li>
      <a href="#">Services</a>
    </li>
    <li>
      <a href="#">Contact</a>
    </li>
  </ul>
</div>