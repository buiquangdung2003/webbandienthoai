<?php
    session_start();
    $idsanpham = $_GET["id"];

    $giohang = [];
    if(isset($_SESSION["giohang"])) {
        $giohang = $_SESSION["giohang"];
    }
    for($i = 0; $i < count($giohang); $i++) {
        if($giohang[$i]["id"] == $idsanpham) {
            array_splice($giohang, $i, 1) ;
            break;
        }
    }
    
    //cập nhật session
    $_SESSION['giohang'] = $giohang;
    header('Location: giohang.php');
?>