<?php
    session_start();
    $idsanpham = $_GET["id"];
    $soluong = $_POST["soluong"];
    $giohang = [];
    if(isset($_SESSION["giohang"])) {
        $giohang = $_SESSION["giohang"];
    }
    for($i = 0; $i < count($giohang); $i++) {
        if($giohang[$i]["id"] == $idsanpham) {
            $giohang[$i]["soluong"]= $soluong;
            break;
        }
    }
    
    //cập nhật session
    $_SESSION['giohang'] = $giohang;
    header('Location: giohang.php');
?>