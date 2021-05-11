<div class="content_box">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu_box">
                            <h3 class="menu_head">Menu</h3>
                            <ul class="nav">
                            <li><a href="index.php?action=about">Tất Cả </a></li>
						<li><a href="index.php?action=sofa">Sofa</a></li>
						<li><a href="index.php?action=shelf">Tủ Kệ</a></li>
						<li><a href="index.php?action=dinnertable">Bộ Bàn Ăn</a></li>
						<li><a href="index.php?action=bed">Giường Ngủ</a></li>
						<li><a href="index.php?action=coffee">Bàn Cafe</a></li>

                            </ul>
                        </div>
                       
                    </div>
                    <div class="col-md-9">
                    <section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     ĐƠN HÀNG ĐÃ ĐẶT
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options="{
        &quot;paging&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;filtering&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;sorting&quot;: {
          &quot;enabled&quot;: true
        }}">
        <thead>
          <tr>
            <th data-breakpoints="xs">ID_BILL</th>
            <th>Ngày Đặt</th>
            <th>Tổng Tiền</th>
            <th data-breakpoints="xs">Trạng Thái</th>
           
          </tr>
        </thead>
        <tbody>
            <?php 
                include("./admin/config.php");
                if (isset($_SESSION["ID_User"])){
                    $user=$_SESSION["ID_User"];
                $sql="Select * from tbl_bill where ID_User='$user'";
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                  if ($row["Status"]=="Đang chờ xử lý"){
                    echo" <tr data-expanded='true'>
                    <td><a href='cthoadon.php?idbill=".$row['ID_Bill']."'>".$row['ID_Bill']."</a></td>
                    <td>".$row['placeoder_date']."</td>
                    <td>".$row['Sum_of_money']."</td>
                    <td>".$row['Status']."</td>
                    <td><a href='index.php?action=userbill&do=huydon&idbill=".$row["ID_Bill"]."'>Huỷ Đơn</a></td>
                  </tr>";           
                  }     
                  else{
                    echo" <tr data-expanded='true'>
                    <td><a href='cthoadon.php?idbill=".$row['ID_Bill']."'>".$row['ID_Bill']."</a></td>
                    <td>".$row['placeoder_date']."</td>
                    <td>".$row['Sum_of_money']."</td>
                    <td>".$row['Status']."</td>
                  </tr>";         

                    }
                  }
                
            }else{
                echo"<h3>Bạn chưa đặt đơn hàng nào !!!</h3>";
            }
                } 

            ?>
         
       
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
</section>
                    </div>
                </div>
            </div>
        </div>
      
<?php 
  if (isset($_SESSION["Username"]) && isset($_GET["do"]) && isset($_GET["idbill"]) && $_GET["do"]=="huydon"){
    
      $idbill=$_GET["idbill"];
      $sql2="Select * from  `tbl_details_of_bills` WHERE ID_Bill='$idbill' ";
      $bill=mysqli_query($conn,$sql2);
      while($row = mysqli_fetch_array($bill)){
        $sql5="Select * from tbl_product where ID_Product='".$row["ID_Product"]."'";
        $sp= mysqli_fetch_object(mysqli_query($conn,$sql5));
        $sl=$sp->Quantity + $row["Quantity"];
        $sql6="UPDATE `tbl_product` SET Quantity=$sl WHERE ID_Product='".$row["ID_Product"]."'";
        $update=mysqli_query($conn,$sql6);
      }
      $sql= "DELETE FROM `tbl_details_of_bills` WHERE ID_Bill='$idbill'";
      $resul1=mysqli_query($conn,$sql);
      $sql1= "DELETE FROM `tbl_bill` WHERE ID_Bill='$idbill'";
      $result1=mysqli_query($conn,$sql1);
      if ($result && $result1){
       echo" <script>alert('Huỷ đơn hàng thành công');
       window.location.href='index.php?action=userbill';
       </script>";
      }
    
  }
?>