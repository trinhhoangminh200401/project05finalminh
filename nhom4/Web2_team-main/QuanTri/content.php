<?php
if (isset($_SESSION["adminname"])){
    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case "quanlysp":{
                include("./Page/Quanlysp.php");
                break;
            }
            case "quanlyhoadon":{
                include("./Page/Quanlyhoadon.php");
                break;
            }
            case "quanlytaikhoan":{
                include("./Page/Quanlytaikhoan.php");
                break;
            }
            case "thongkedoanhthu":{
                include("./Page/thongkedoanhthu.php");
                break;
            }
            case "thongkebanchay":{
                include("./Page/thongkebanchay.php");
                break;
            }
            case"logout":{
                unset($_SESSION["adminname"]);
                echo"<script>window.location.href='index.php'</script>";
                 break;
            }
        }
    }
    else{
        include("./Page/dashboard.php");
    }
}
else{
    echo "<script>alert('Vui lòng đăng nhập để sử dụng tính năng Admin');
    window.location.href='Login_admin.php';
    </script>";
}
?>