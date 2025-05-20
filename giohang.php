<?php
session_start();
$is_homepage = false;
require_once('components/header.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            <div class="checkout__form">
                <h4>Giỏ hàng</h4>
                <!--<form action="#">-->
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products</div>
                                <table class="table">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    <?php 
                                        $giohang = [];
                                        if (isset($_SESSION['giohang'])) {
                                            $giohang = $_SESSION['giohang'];
                                        }
                                        $count = 0; //số thứ tự
                                        $tongtien = 0;
                                        foreach ($giohang as $item) {
                                            $tongtien += $item['soluong'] * $item['disscounted_price'];
                                    ?>
                                    <form action="./updategiohang.php?id=<?=$item['id']?>" method="post">
                                    <tr>
                                        <td>
                                            <?=++$count?>
                                        </td>
                                        <td>
                                            <?=$item['name']?>
                                        </td>
                                        <td>
                                            <?=number_format($item['disscounted_price'], 0, ',', '.') . ' '?>
                                        </td>
                                        <td>
                                            <input type="number" name="soluong" value="<?=$item['soluong']?>" min="1">
                                        </td>
                                        <td>
                                            <?=number_format($item['disscounted_price'] * $item['soluong'], 0, ',', '.') . ' '?>
                                        </td>
                                        <td>
                                            <button class="btn btn-warning">Cập nhật</button>
                                        </td>
                                        <td><a href="./deletegiohang.php?id=<?=$item['id']?>" class="btn btn-danger">Xóa</a></td>
                                    </tr>
                                    </form>
                                    <?php
                                        }
                                    ?>
                                </table>
                                <!-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> -->
                                <div class="checkout__order__total">Tổng tiền: <span><?=number_format($tongtien, 0, ',', '.') . ' VNĐ'?></span></div>
                                <div class="d-flex justify-content-between">
                                    <a href="sanpham.php" type="submit" class="btn btn-primary">
                                        Tiếp tục mua sắm
                                    </a>
                                    <a href="checkout.html" class="btn btn-success">
                                        Thanh toán
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--</form>-->
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<?php 
    require_once('components/footer.php');
?>