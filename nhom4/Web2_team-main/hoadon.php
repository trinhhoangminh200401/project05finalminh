<?php
include("./action.php");
$g = new action();
$g->PlaceOder();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Hoá Đơn</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tohoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 21cm;
            overflow: hidden;
            min-height: 297mm;
            padding: 2.5cm;
            margin-left: auto;
            margin-right: auto;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 237mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

        button {
            width: 100px;
            height: 24px;
        }

        .header {
            overflow: hidden;
        }

        .logo {
            background-color: #FFFFFF;
            text-align: left;
            float: left;
        }

        .company {
            padding-top: 24px;
            text-transform: uppercase;
            background-color: #FFFFFF;
            text-align: right;
            float: right;
            font-size: 16px;
        }

        .title {
            text-align: center;
            position: relative;
            color: #0000FF;
            font-size: 24px;
            top: 1px;
        }

        .footer-left {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            float: left;
            font-size: 12px;
            bottom: 1px;
        }

        .footer-right {
            text-align: center;
            text-transform: uppercase;
            padding-top: 24px;
            position: relative;
            height: 150px;
            width: 50%;
            color: #000;
            font-size: 12px;
            float: right;
            bottom: 1px;
        }

        .TableData {
            background: #ffffff;
            font: 11px;
            width: 100%;
            border-collapse: collapse;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 12px;
            border: thin solid #d3d3d3;
        }

        .TableData TH {
            background: rgba(0, 0, 255, 0.1);
            text-align: center;
            font-weight: bold;
            color: #000;
            border: solid 1px #ccc;
            height: 24px;
        }

        .TableData TR {
            height: 24px;
            border: thin solid #d3d3d3;
        }

        .TableData TR TD {
            padding-right: 2px;
            padding-left: 2px;
            border: thin solid #d3d3d3;
        }

        .TableData TR:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .TableData .cotSTT {
            text-align: center;
            width: 10%;
        }

        .TableData .cotTenSanPham {
            text-align: left;
            width: 40%;
        }

        .TableData .cotHangSanXuat {
            text-align: left;
            width: 20%;
        }

        .TableData .cotGia {
            text-align: right;
            width: 120px;
        }

        .TableData .cotSoLuong {
            text-align: center;
            width: 50px;
        }

        .TableData .cotSo {
            text-align: right;
            width: 120px;
        }

        .TableData .tong {
            text-align: right;
            font-weight: bold;
            text-transform: uppercase;
            padding-right: 4px;
        }

        .TableData .cotSoLuong input {
            text-align: center;
        }

        @media print {
            @page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="company">Công Ty Web 2 Lớp Thầy Sang Đẹp Trai</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>

 
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Đơn giá</th>
      <th>Số</th>
      <th>Thành tiền</th>
    </tr>
    <?php
    include("./admin/config.php");

         $today = date("d/m/Y");
         $datesql=date("Y/m/d");
        $tongsotien = 0;
        if (isset($_SESSION["giohang"]) && isset($_SESSION["Username"]) && isset($_SESSION["ID_User"])) {
            if (isset($_SESSION["Username"]) && isset($_SESSION["ID_User"])) {
                $nhanvien=$_SESSION["Username"];
                $id_nhanvien=$_SESSION["ID_User"];
                $sql="Select * from tbl_users where ID_User='$id_nhanvien'";
                $sql1="Select * from tbl_bill";
                $num=mysqli_query($conn,$sql1);
                $sobill=mysqli_num_rows($num)+1;
                $diachi=mysqli_query($conn,$sql);
                $ct_diachi=mysqli_fetch_object($diachi);
            }
            $pos = 1;
            $tongsotien = 0;
            foreach ($_SESSION["giohang"] as $key => $val) {
                $tongsotien1 += $val['qty'] * $val['price'];
            }
            $trangthai="Đang chờ xử lý";
            echo" <p>Mã hoá đơn: $sobill</p> 
            <p>Địa chỉ thanh toán: $ct_diachi->Address</p>
            <p>Địa chỉ Email: $ct_diachi->Email</p>
            <p>Trạng thái: $trangthai";        
            $sql2="INSERT INTO `tbl_bill`(`ID_Bill`, `placeoder_date`, `ID_User`, `Sum_of_money`, `Status`) VALUES ('$sobill','$datesql','$id_nhanvien','$tongsotien1','$trangthai')";
            $result=mysqli_query($conn,$sql2);
            foreach ($_SESSION["giohang"] as $key => $val) {   
                $sql4= "Select * from tbl_product where ID_Product='$key'";  
                $quansp=mysqli_fetch_object(mysqli_query($conn,$sql4));
                $remain=$quansp->Quantity - $val['qty'];   
                $sql5="UPDATE `tbl_product` SET `Quantity`='$remain' Where ID_Product='$key'";
                $updatesl=mysqli_query($conn,$sql5);
                $sum_price_each_product=$val['qty'] * $val['price']; 
                $sql3="INSERT INTO `tbl_details_of_bills`(`ID_Product`, `ID_Bill`, `Price`, `Quantity`) VALUES ('$key','$sobill','".$sum_price_each_product."','".$val['qty']."')";        
                $result1=mysqli_query($conn,$sql3);               
                $tongsotien += $val['qty'] * $val['price'];
                echo "<tr>";
                echo "<td class=\"cotSTT\">" . $pos++ . "</td>";
                echo "<td class=\"cotTenSanPham\">" . $val['name'] . "</td>";
                echo "<td class=\"cotGia\"><div id='giasp" . $key . "' name='giasp" . $key . "' value='" . $val['price'] . "'>" . number_format($val['price'], 0, ",", ".") . "</div></td>";
                echo "<td class=\"cotSoLuong\" align='center'>" . $val['qty'] . "</td>";
                echo "<td class=\"cotSo\">" . number_format(($val['qty'] * $val['price']), 0, ",", ".") . "</td>";
                echo "</tr>";
            }
            unset($_SESSION["giohang"]);
        } else echo "Không lấy được dữ liệu";
        ?>
    <tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo"><?php echo number_format(($tongsotien),0,",",".")?></td>
    </tr>
  </table>
  <div class="footer-left"> Hồ Chí Minh, <?php echo"$today";?><br/>
    Khách hàng </br></br></br> <?php echo"$ct_diachi->Name";?></div>
  <div class="footer-right"> Hồ Chí Minh, <?php echo"$today";?><br/>
    Nhân viên </div>
</div>
</body>

</html>




