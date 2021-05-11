<?php
    $trangHienTai = 1;
    $hanhDong = $loaiSanPham = '';

    if(isset($_GET['trangHienTai'])){
        $trangHienTai = $_GET['trangHienTai'];
    }
    if(isset($_GET['hanhDong'])){
        $hanhDong = $_GET['hanhDong'];
    }
    if(isset($_GET['loaiSanPham'])){
        $loaiSanPham = $_GET['loaiSanPham'];
    }

    function pagination($trangHienTai, $hanhDong, $loaiSanPham){
        include("./admin/config.php");
        $sql = "SELECT * FROM tbl_product WHERE 1 AND ID_type LIKE '%$loaiSanPham%'";
        $query = $conn->query($sql);
        $num_row = mysqli_num_rows($query);
        if($num_row > 0){
            $soTrang = $num_row / 9;
            if($trangHienTai > 1){
                echo' <li><a href="./index.php?action='.$hanhDong.'&page='.($trangHienTai-1).'" class="previous">Page:</a></li>';
            }
            for($i = 0; $i < $soTrang; $i++){
                if(($i+1) == $trangHienTai){
                    echo'<li class="active"><a href="./index.php?action='.$hanhDong.'&page='.($i+1).'">'.($i+1).'</a></li>';
                }else{
                    echo'<li><a href="./index.php?action='.$hanhDong.'&page='.($i+1).'">'.($i+1).'</a></li>';
                }
            }
        }else{
            echo'Khong tim thay san pham';
        }
    }   

    switch($hanhDong){
        case 'about':
            pagination($trangHienTai, $hanhDong, $loaiSanPham);
            break;
        case 'sofa':
        case 'coffee':
        case 'dinnertable':
        case 'shelf':
        case 'bed':
            pagination($trangHienTai, $hanhDong, $loaiSanPham);
            break;

    }
?>