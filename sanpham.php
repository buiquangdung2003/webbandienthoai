<?php 
    $is_homepage = false;
    session_start();
    require_once('./database/conn.php');

    //kiểm tra nút thêm vào giỏ được ấn
    if (isset($_POST['btnthemgiohang'])) {
        $id = $_POST['pid'];
        $soluong = $_POST['soluong'];
        //thêm sản phẩm vào giỏ hàng
        $giohang = [];
        if (isset($_SESSION['giohang'])) {
            $giohang = $_SESSION['giohang'];
        }
        $isFound = false;
        for ($i = 0; $i < count($giohang); $i++) {
            if ($giohang[$i]['id'] == $id) {
                $giohang[$i]['soluong'] += $soluong;
                $isFound = true;
                break;
            }
        }
        if (!$isFound) { //ko tìm thấy sản phẩm nào trong giỏ
            $sql_str = "select * from products where id = $id";
            $result = mysqli_query($conn, $sql_str);
            $product = mysqli_fetch_assoc($result);//thực thi câu lệnh ('select * from products where id = '.$id, true);
            $product['soluong']= $soluong;
            $giohang[] = $product;
        }
        //cập nhật session
        $_SESSION['giohang'] = $giohang;
    }

    require_once('components/header.php');

    $idsanpham = $_GET['id'];
    $sql_str = "select * from products where id = $idsanpham ";
    $result = mysqli_query($conn, $sql_str);
    $row = mysqli_fetch_assoc($result);
    $anh_arr = explode(';', $row['images']);
?>

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?php 
                                        $filename = trim($anh_arr[0]);
                                        if (!str_starts_with($filename, 'uploads/') && !str_starts_with($filename, 'quantri/uploads/')) {
                                            $filename = 'uploads/' . $filename;
                                        }
                                        if (!str_starts_with($filename, 'quantri/')) {
                                            $filename = 'quantri/' . $filename;
                                        }
                                        echo $filename;
                                        ?>" alt="<?=$row['name']?>">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php 
                                for($i = 0; $i < count($anh_arr); $i++){   
                            ?>
                                <img data-imgbigurl="<?php 
                                        $filename = trim($anh_arr[$i]);
                                        if (!str_starts_with($filename, 'uploads/') && !str_starts_with($filename, 'quantri/uploads/')) {
                                            $filename = 'uploads/' . $filename;
                                        }
                                        if (!str_starts_with($filename, 'quantri/')) {
                                            $filename = 'quantri/' . $filename;
                                        }
                                        echo $filename;
                                        ?>"
                                    src="<?php 
                                        $filename = trim($anh_arr[$i]);
                                        if (!str_starts_with($filename, 'uploads/') && !str_starts_with($filename, 'quantri/uploads/')) {
                                            $filename = 'uploads/' . $filename;
                                        }
                                        if (!str_starts_with($filename, 'quantri/')) {
                                            $filename = 'quantri/' . $filename;
                                        }
                                        echo $filename;
                                        ?>">
                            <?php
                                }   
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$row['name']?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">
                            <?=number_format($row['price'], 0, ',', '.') . ' đ'?>
                        </div>
                        <p>
                            <?=$row['summary']?>
                        </p>
                        <form method="post">
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                        <input type="hidden" value="1" name = "soluong">
                                    </div>
                                    <input type="hidden" name="pid" value="<?=$idsanpham?>">
                                </div>
                            </div>
                            <button href="#" class="primary-btn" name="btnthemgiohang">Thêm vào giỏ hàng</button>
                        </form>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    <p><?=$row['description']?></p>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Đánh giá sản phẩm (reviews)</h6>
                                    <p>Đang hoàn thiện chức năng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    //tìm các sản phẩm liên quan cùng category_id với sản phẩm này
                    $danhmucid = $row['category_id'];
                    $sql2= "select * from products where category_id = $danhmucid and id <> $idsanpham";
                    $result2 = mysqli_query($conn,$sql2);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $arr2 = explode(";", $row2["images"]);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php 
                                        $filename = trim($arr2[0]);
                                        if (!str_starts_with($filename, 'uploads/') && !str_starts_with($filename, 'quantri/uploads/')) {
                                            $filename = 'uploads/' . $filename;
                                        }
                                        if (!str_starts_with($filename, 'quantri/')) {
                                            $filename = 'quantri/' . $filename;
                                        }
                                        echo $filename;
                                        ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                    <?php
                        $giaGoc = $row2['price'];
                        $giaGiam = $row2['disscounted_price'];
                        $phanTramGiam = 100 - round($giaGiam / $giaGoc * 100);
                    ?>
                    <div class="product__item__text">
                        <h6><a href="sanpham.php?id=<?=$row2['id']?>"><?= htmlspecialchars($row2['name']) ?></a></h6>
                        <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            <span style="color: #d0021b; font-size: 18px; font-weight: bold;">
                                <?= number_format($giaGiam, 0, ',', '.') ?> đ
                            </span>
                            <span style="color: #777; text-decoration: line-through; font-size: 14px;">
                                <?= number_format($giaGoc, 0, ',', '.') ?> đ
                            </span>
                            <span style="background: #ffea00; color: #d0021b; font-size: 13px; padding: 2px 6px; border-radius: 3px; font-weight: bold;">
                                -<?= $phanTramGiam ?>%
                            </span>
                        </div>
                    </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->


<?php 
    require_once('components/footer.php');
?>