<?php 
	//dat duong dan cho bien $fileLayout de load template vao day
	$this->fileLayout = "Views/Frontend/Layout_trangchu.php";
 ?>
  <section id="block-saleoff-product" class="block-product block-saleoff-product">
        <div class="container">
            <div class="block-head header-font header-color">
                <h3>Sản phẩm hot</h3>
            </div>
            <div class="owl-carousel owl-slide owl-saleoff-product">
            	<?php 
					$data = $this->productHot();
				 ?>
				 <?php foreach($data as $rows): ?>
                
                <div class="item">
                    <div class="product-item">
                        <div class="thumb-product">
                           
                            <div class="img">
                                <a href="index.php?controller=ProductDetail&id=<?php echo $rows->id; ?>"><img class="img-fluid" src="Assets/upload/news/<?php echo $rows->img; ?>" alt="" title="<?php echo $rows->name; ?>"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4 class="name header-font">
                                <a href="product-detail.html"><?php echo $rows->name; ?></a>
                            </h4>
                            <div class="price-new header-font header-color">
                                <span class="price"><?php echo number_format($rows->price); ?> VND</span>
                            </div>
                            <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
							  <a href="index.php?controller=Cart&action=add&id=<?php echo $rows->id; ?>" class="btn btn-addcart">Cho vào giỏ hàng</a>
							</form>
                          
                        </div>
                    </div>
                </div>
                <!-- /.product -->
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="block-ads-banner" class="block-ads-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="#"><img class="img-fluid" src="Assets/Frontend/images/banner-left.png" alt=""></a>
                </div>
                <div class="col-sm-6">
                    <a href="#"><img class="img-fluid" src="Assets/Frontend/images/banner-right.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
    <section id="block-saleoff-product" class="block-product block-saleoff-product">
        <div class="container">
            <div class="block-head header-font header-color">
                <h3>Sản phẩm mới</h3>
            </div>
            <div class="owl-carousel owl-slide owl-saleoff-product">
                <?php 
                    $data = $this->productNew();
                 ?>
                 <?php foreach($data as $rows): ?>
                <!-- product -->
                
                <div class="item">
                    <div class="product-item">
                        <div class="thumb-product">
                           
                            <div class="img">
                                <a href="index.php?controller=ProductDetail&id=<?php echo $rows->id; ?>"><img class="img-fluid" src="Assets/upload/news/<?php echo $rows->img; ?>" alt="" title="<?php echo $rows->name; ?>"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4 class="name header-font">
                                <a href="product-detail.html"><?php echo $rows->name; ?></a>
                            </h4>
                            <div class="price-new header-font header-color">
                                <span class="price"><?php echo number_format($rows->price); ?> VND</span>
                            </div>
                            <form action="cart/add" method="post" enctype="multipart/form-data" id="product-actions-1168979">
                              <a href="index.php?controller=Cart&action=add&id=<?php echo $rows->id; ?>" class="btn btn-addcart">Cho vào giỏ hàng</a>
                            </form>
                          
                        </div>
                    </div>
                </div>
                <!-- /.product -->
                <?php endforeach; ?>
            </div>
        </div>
    </section>