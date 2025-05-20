<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <!-- Header Section Begin -->
    <header>
        <img src="images/anh1.jpg" alt="" class = "logo">
    </header>
    <div>
    <nav>
        <div class="container">
            <ul>
                <li><a href=""><img style ="width: 160px"  src="images/logo.jpg" alt=""></a></li>
                <li id="adress-form"><a href="#">Hà Nội<i class="fa-solid fa-caret-down"></i></a></li>
                <li><input type="text" placeholder="Bạn cần tìm gì...."><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><a href="giohang.php"><button><i class="fa-solid fa-cart-shopping" style="position: relative;">
                    <span id="cart-count">
                        <?php 
                            $giohang= [];
                            if(isset($_SESSION["giohang"])){
                                $giohang= $_SESSION["giohang"];
                            }
                            $count = 0; //hiển thị số lượng sản phẩm trong giỏ hàng
                            foreach($giohang as $item){
                                $count += $item["soluong"];
                            }
                            //hiển thị số lượng
                            echo $count;
                        ?>
                    </span></i>Giỏ hàng</button></a>
                </li>
                <li><a href="">Lịch sử <br> đơn hàng</a></li>
                <li><a href=""><span class=" btn-content"><span class = "btn-top"></span></span>24h công nghệ</a></li>
                <li><a href=""> Giới thiệu | Liên hệ</a></li>
                <li><a href=""><span><i class="fa-solid fa-right-to-bracket"></i></span>&nbsp;<span> Đăng nhập</span></a></li>
                <li><a href=""><span><i class="fa-solid fa-id-card"></i></span>&nbsp;<span> Đăng kí</span></a></li>
                <div class="adress-form">
                    <div class="adress-form-content">
                        <h2>Chọn địa chỉ nhận hàng <span id="adress-close" style="color: red;">x Đóng</span></h2>
                        <form action="">
                            <p>Chọn đầy đủ địa chỉ nhận hàng để biết chính xác thời gian giao</p>
                            <select id="provinceSelect">
                                <option value="">--Chọn Tỉnh/Thành phố</option>
                            </select>
                            <select name="" id="">
                                <option value="#">--Chọn Quận/Huyện</option>
                                <option value="#">Hà Nội</option>
                            </select>
                            <select name="" id="">
                                <option value="#">--Chọn Phường/Xã</option>
                                <option value="#">Hà Nội</option>
                            </select>
                            <input type="text" placeholder="Số nhà, Tên đường">
                            <button>Xác nhận</button>
                        </form>
                    </div> 
                </div>
            </ul>
        </div>
    </nav>
</div>

<section class="menu-bar">
    <div class="container">
        <div class="menu-bar-content">
            <ul>
                <li><a href="./dienthoai.php"><i class="fa-solid fa-mobile-screen"></i>Điện thoại</a></li>
                <li><a href=""><i class="fa-solid fa-laptop"></i>Laptop</a></li>
                <li><a href=""><i class="fa-solid fa-tablet-screen-button"></i>Taplet</a></li>
                <li><a href=""><i class="fa-solid fa-headphones-simple"></i> Headphone<i style="margin-left: 6px;" class="fa-solid fa-caret-down"></i></a>
                    <div class="submenu">
                        <ul>
                            <li><a href="">Tai nghe Bluetooth</a></li>
                            <li><a href="">Tai nghe có dây</a></li>
                            <li><a href="">Loa</a></li>
                            <li><a href="">Tai nghe chụp tai</a></li>
                            <li><a href="">Tai nghe Gaming</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href=""><i class="fa-solid fa-desktop"></i>Phụ kiện<i style="margin-left: 6px;" class="fa-solid fa-caret-down"></i></a>
                    <div class="submenu">
                        <ul>
                            <li><a href=""><h4><b>Phụ kiện hàng đầu</b></h4></a></li>
                            <li><a href="">Pin, sạc dự phòng</a></li>
                            <li><a href="">Ốp lưng điện thoại</a></li>
                            <li><a href="">Cường lực màn hình</a></li>
                            <li><a href="">Gậy tự sướng</a></li>
                            <li><a href="">Thẻ nhớ, USB</a></li>
                            <li><a href="">Túi chống nước</a></li>
                            <li><a href="">Đế, móc điện thoại</a></li>
                            <li><a href="">Chuột, bàn phím</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href=""><i class="fa-solid fa-newspaper"></i>Tin tức</a></li>
               <!--<li><a href=""><i class="fa-solid fa-mobile-retro"></i>Máy cũ giá rẻ</a></li>
                <li><a href=""><i class="fa-solid fa-sim-card"></i>Sim, thẻ cào</a></li>
                <li><a href=""><i class="fa-regular fa-money-bill-1"></i>Trả góp</a></li>--> 
            </ul>
        </div>
    </div>
</section>
    <!-- Hero Section Begin -->
    <!-- <?php
    if($is_homepage) {
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </div>
                    <ul>
                        <?php
                            require('./database/conn.php');
                            $sql_str = "select * from categories order by name";
                            $result = mysqli_query($conn, $sql_str);
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <li><a href="#"><?= $row['name'] ?></a></li>
                        
                        <?php } ?>
                        
                    </ul>
                </div>
        </div>
    </div>
    <?php
        }
    ?> -->

    <?php
        if($is_homepage) {
    ?>
    <div class="big-container">
    <!-- Khối thứ nhất -->
        <div class="small-container">
            <section class="slider">
                <div class="container">
                    <div class="slider-content">
                        <div class="slider-content-left">
                            <div class="slider-content-left-top">
                                <div class="slider-wrapper">
                                    <a href=""><img src="images/slide1.png" alt=""></a>
                                    <a href=""><img src="images/slide2.png" alt=""></a>
                                    <a href=""><img src="images/slide3.png" alt=""></a>
                                    <a href=""><img src="images/slide4.png" alt=""></a>
                                    <a href=""><img src="images/slide2.png" alt=""></a>
                                </div>
                                <!-- Nút trái/phải -->
                                <button class="slider-prev"><i class="fa-solid fa-chevron-left"></i></button>
                                <button class="slider-next"><i class="fa-solid fa-chevron-right"></i></button>
                            </div>
                            
                            <div class="slider-content-left-bottom">
                                <li class="active" data-index="0">Samsung Galaxy A05s <br>Giá siêu rẻ </li>
                                <li data-index="1">Iphone 16 Series <br>Giá 19.990.000đ, Quà Ngon</li>
                                <li data-index="2">Mua Redmi Note 14 5G <br>Nhận Ngàn Quà Tặng </li>
                                <li data-index="3">Honor X7C 8Gb/256Gb <br> Giảm Ngay 500K</li>
                                <li data-index="4">Mua Honor X8C <br>Nhận Quà 1,5 Triệu </li>
                            </div>
                        </div>  
                    <!-- <div class="slider-content-right">
                            <li><a href=""><img src="image/" alt=""></a></li>
                        </div> --> 
                    </div>
                </div>
            </section>
        </div>

    <!-- Khối thứ hai -->
        <div class="nested-container">
            <div class="box">Khối 1</div>
            <div class="box">Khối 2</div>
            <div class="box">Khối 3</div>
            <div class="box">Khối 4</div>
        </div>
    </div>
    <?php
        }
    ?>

    <!-- Hero Section End -->
