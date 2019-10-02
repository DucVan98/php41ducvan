<?php 
	//dat duong dan cho bien $fileLayout de load template vao day
	$this->fileLayout = "Views/Frontend/Layout_chitiet_sanpham.php";
 ?>
 <?php if(isset($record->id)): ?>
    <div class="container">
            
            <!-- Comment -->
            <div class="block-description">
            <div class="row">
                <div class="col-lg-6">
                    <div class="gallery">
                        <div class="owl-1">
                            <div class="img"><img class="img-fluid" src="Assets/upload/news/<?php echo $record->img; ?>" alt=""></div>
                        </div>

                        <div class="owl-2">
                            <div class="thumb"><img class="img-fluid" src="Assets/upload/news/<?php echo $record->img; ?>" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <article>
                        <div class="block-detail">
                            <h1 class="product-name header-font"><?php echo $record->name; ?></h1>
                           
                            <div class="price-wrap">
                                <span class="price-new"><?php echo number_format($record->price); ?> VND</span>
                               
                            </div>
                            <div class="desc">
                                <p>
                                    <?php echo $record->description; ?>
                                </p>
                            </div>
                            <form class="block-custom-change mb-4" action="#">
                                <div class="change-item">
                                    <div class="change-name">Màu sắc:</div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" checked type="radio" name="1" id=""
                                                value="checkedValue"> <span><?php echo $record->color; ?></span>
                                        </label>
                                       
                                    </div>
                                </div>
                                <div class="change-item">
                                    <div class="change-name">Kích cỡ:</div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="2" id=""
                                                value="checkedValue"> <span><?php echo $record->size; ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="change-item">
                                    <div class="change-name">Chất liệu:</div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="3" id=""
                                                value="checkedValue"> <span><?php echo $record->material; ?></span>
                                      
                                    </div>
                                </div>
                                <div class="form-action">
                                    <div class="quantity">
                                        <div class="change-name">số lượng:</div>
                                        <input type="number" min="1" max="9" step="1" value="1">
                                    </div>
                                    <a href="index.php?controller=Cart&action=add&id=<?php echo $record->id; ?>" class="btn btn-addcart header-font">Thêm vào giỏ hàng</a>
                                    <a href="index.php?controller=Cart&action=add&id=<?php echo $record->id; ?>" class="btn btn-buy header-font">Mua ngay</a>
                                </div>
                            </form>
                            <div class="block-status mb-4">
                                Tình trạng: <span>Còn hàng</span>
                            </div>
                            
                            <div class="social">
                                <span>Chia sẻ: </span>
                                <ul>
                                    <li>
                                        <a href="https://www.google.com.vn/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 19 19" fill="none">
                                                <path
                                                    d="M9.5 7.6V11.4H14.8751C14.0904 13.6116 11.9776 15.2 9.5 15.2C6.3574 15.2 3.8 12.6426 3.8 9.5C3.8 6.3574 6.3574 3.8 9.5 3.8C10.8623 3.8 12.1733 4.2883 13.1917 5.1756L15.6883 2.3104C13.9783 0.8208 11.7819 0 9.5 0C4.2617 0 0 4.2617 0 9.5C0 14.7383 4.2617 19 9.5 19C14.7383 19 19 14.7383 19 9.5V7.6H9.5Z"
                                                    fill="#969696" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="18"
                                                viewBox="0 0 10 18" fill="none">
                                                <path
                                                    d="M9.62343 0.0037452L7.22488 0C4.5302 0 2.78878 1.73871 2.78878 4.42982V6.47227H0.377148C0.168755 6.47227 0 6.63668 0 6.83949V9.79876C0 10.0016 0.168947 10.1658 0.377148 10.1658H2.78878V17.633C2.78878 17.8358 2.95753 18 3.16593 18H6.31242C6.52081 18 6.68957 17.8356 6.68957 17.633V10.1658H9.50932C9.71772 10.1658 9.88647 10.0016 9.88647 9.79876L9.88763 6.83949C9.88763 6.74211 9.84779 6.64886 9.77718 6.57994C9.70656 6.51103 9.61034 6.47227 9.51029 6.47227H6.68957V4.74086C6.68957 3.90868 6.89334 3.48622 8.00727 3.48622L9.62304 3.48566C9.83125 3.48566 10 3.32124 10 3.11863V0.370775C10 0.168347 9.83144 0.00411972 9.62343 0.0037452Z"
                                                    fill="#969696" />
                                            </svg>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

           
                           
<?php endif; ?>        