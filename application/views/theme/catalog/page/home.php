<div id="content">

  <div class="container">
    <div class="row">
      <div class="col-md-12">
	<h2>สินค้าแนะนำ</h2>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <?php
      foreach ($products as $index => $product) {
	echo "<div class='col-md-3'>";
	echo "<img src='{$product['image_url_medium']}' width='250' height='250' class='img-responsive'>";
	echo "<h3><a href='catalog/vision/preview/1/1'>{$product['product_name']}</a></h3>";
	echo "<h5>{$product['price']} บาท</h5>";
	echo "</div>";
      }
      ?>
    </div>
  </div>


  <div class="section">
    <div class="container">
      <div class="row">
	<div class="col-md-3">
	  <img src="img\product\1_thumbnail_view.jpg" class="img-responsive">
	  <h3>เดรสสไตล์เกาหลี</h3>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="img\product\2_thumbnail_view.jpg" class="img-responsive">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="img\product\3_thumbnail_view.jpg" class="img-responsive img-rounded">
	  <h3>ชุดนอนแขนยาวขายาวลวดลายน่ารัก ๆ ต้อนรับลมหนาวนี้</h3>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="img\product\4_thumbnail_view.jpg" class="img-responsive">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
      </div>
    </div>
  </div>


  <div class="section">
    <div class="container">
      <div class="row">
	<div class="col-md-3">
	  <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive img-rounded">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
	<div class="col-md-3">
	  <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
	  <h2>A title</h2>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
	    <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
	    <br>Ut enim ad minim veniam, quis nostrud</p>
	</div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
	<div class="col-md-12">
	  <h2>ข่าวและโปรโมชั่น</h2>
	</div>
      </div>
      <div class="row">
	<div class="col-md-6">s</div>
	<div class="col-md-6">s</div>
      </div>
    </div>
  </div>

</div>


