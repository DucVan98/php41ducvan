    <header id="block-header" class="block-header d-none d-lg-block">
        <div class="container">
            <div class="flex-display">
                <!-- logo -->
                <div id="block-header-logo" class="block-header-logo">
                    <a href="index.php"><img src="Assets/Frontend/images/logo.png" alt=""></a>
                </div>
                <!-- /.logo -->

                <!-- Search -->
                <div class="block-header-search">
                    <div class="form-group">
                        <input type="text" name="" id="" class="form-control content-font"
                            placeholder="Tìm kiếm sản phẩm" aria-describedby="helpId">
                        <button type="submit" class="btn btn-search" onclick="window.location.href='https://onshop.asia/result.html'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path d="M21.4999 21.5L15.8999 15.9" stroke="#969696" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M9.5 18.5C14.4706 18.5 18.5 14.4706 18.5 9.5C18.5 4.52944 14.4706 0.5 9.5 0.5C4.52944 0.5 0.5 4.52944 0.5 9.5C0.5 14.4706 4.52944 18.5 9.5 18.5Z"
                                    stroke="#969696" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- /.Search -->

                <!-- Action -->
                <div class="block-header-action">
                    <div class="action-cart mr-4">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M0.9375 0.9375H3.9375V15.9375H22.6875" stroke="#969696" stroke-miterlimit="10"
                                    stroke-linecap="square" />
                                <path
                                    d="M5.4375 23.4375C6.68014 23.4375 7.6875 22.4301 7.6875 21.1875C7.6875 19.9449 6.68014 18.9375 5.4375 18.9375C4.19486 18.9375 3.1875 19.9449 3.1875 21.1875C3.1875 22.4301 4.19486 23.4375 5.4375 23.4375Z"
                                    stroke="#969696" stroke-miterlimit="10" stroke-linecap="square" />
                                <path
                                    d="M21.1875 23.4375C22.4301 23.4375 23.4375 22.4301 23.4375 21.1875C23.4375 19.9449 22.4301 18.9375 21.1875 18.9375C19.9449 18.9375 18.9375 19.9449 18.9375 21.1875C18.9375 22.4301 19.9449 23.4375 21.1875 23.4375Z"
                                    stroke="#969696" stroke-miterlimit="10" stroke-linecap="square" />
                                <path d="M3.9375 3.9375H21.1875L18.9375 12.9375H3.9375" stroke="#969696"
                                    stroke-miterlimit="10" stroke-linecap="square" />
                            </svg>
                            <span class="count main-color text-center">
                                <?php 
                                    //lay so luong san pham
                                    $cartNumber = 0;
                                    if(isset($_SESSION["cart"]) == true){
                                        foreach($_SESSION["cart"] as $product){
                                            $cartNumber = $cartNumber + $product["number"];
                                        }
                                    }
                                 ?>
                            </span>
                        </a>
                    </div>
                    
                </div>
                <!-- /.Action -->
            </div>
        </div>
    </header>