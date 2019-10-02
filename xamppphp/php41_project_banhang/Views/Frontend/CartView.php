<?php 
    $this->fileLayout = "Views/Frontend/layout_chitiet_sanpham.php";
 ?>
<div class="block-cart-page">
        <div class="container">
            <div class="block-cart-head">
                <h1 class="header-font">Giỏ hàng</h1>
                <div class="meta">( <span>6</span> sản phẩm )</div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="block-table-cart">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th></th>
                                    <th>Sản phẩm</th>
                                    <th>ĐƠN GIÁ</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>THÀNH TIỀN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($_SESSION["cart"] as $garment): ?>

                                <tr>
                                    <td scope="row">
                                        <button type="button" class="btn btn-close">
                                            
                                            <a href="index.php?controller=Cart&action=delete&id=<?php echo $garment['id']; ?>" title="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                viewBox="0 0 10 10" fill="none">
                                                <path
                                                    d="M9.66683 1.27398L8.72683 0.333984L5.00016 4.06065L1.2735 0.333984L0.333496 1.27398L4.06016 5.00065L0.333496 8.72732L1.2735 9.66732L5.00016 5.94065L8.72683 9.66732L9.66683 8.72732L5.94016 5.00065L9.66683 1.27398Z"
                                                    fill="#969696" />
                                            </svg>
                                            </a>
                                        </button>
                                    </td>
                                    <td>
                                        <div class="cart-product-item">
                                            <div class="thumb"><img src="Assets/upload/news/<?php echo $garment['img']; ?>" alt="<?php echo $garment['name']; ?>"></div>
                                            <div class="cart-product-info">
                                                <h6 class="name header-font"><a href="index.php?controller=GarmentDetail&id=<?php echo $garment['id']; ?>"><?php echo $garment['name']; ?></a></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong class="header-color"><?php echo number_format($garment['price']); ?>₫</strong>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="quantity">
                                            <?php if($this->cartNumber() > 0): ?>
                                            <input type="number" min="1" max="9" step="1" value="<?php echo $garment['number']; ?>">

                                        <?php endif; ?>
                                        </div>
                                    </td>
                                
                                    <td>

                                        <strong class="header-color"><?php echo number_format($garment['number']*$garment['price']); ?>đ</strong>
                                    </td>
                                </tr>
                                
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="block-cart-total">
                        <?php if($this->cartNumber() > 0): ?>
                        <div class="item-group">
                            <p class="title-price header-font">Tổng tiền hàng:
                             </p>
                            <span class="price"><?php echo number_format($this->cartTotal()); ?>đ</span>
                        </div>
                    <?php endif; ?>
                        
                        <div class="item-group">
                            <p class="title-price header-font">Tổng tạm tính:</p>
                            <strong class="price"><?php echo number_format($this->cartTotal()); ?>₫</strong>
                        </div>
                        <div class="item-group mt-5">
                            <a class="btn btn-paynow" href="index.php?controller=Cart&action=checkOut">thanh toán ngay</a>
                        </div>
                        <div class="item-group">
                            <a class="btn btn-continue" href="index.php">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </di