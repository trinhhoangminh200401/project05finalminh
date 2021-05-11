<?php

class action{  
    function login($tk,$mk){        
        session_start();
        include("../admin/config.php");
        if (isset($_POST["tk"]) || isset($_POST["mk"])) {
            $username = addslashes($_POST['tk']);
            $password = addslashes($_POST['mk']);
            $sql = "SELECT * FROM tbl_adminlogin WHERE adminname='$username'";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) == 0){
                return 0;
            }
            $row=mysqli_fetch_object($query);
            if ($password==$row->password) {
                $_SESSION["adminname"] = $tk;
                return 1;
            } 
            else {
                return 2;
            }
        }
    }
    function spbanchay(){
        if (isset($_POST["fromdate"]) && isset($_POST["todate"])){
            include("../admin/config.php");
            $fromdate=strtotime($_POST["fromdate"]);
            $todate=strtotime($_POST["todate"]);
            $date1=date("Y/m/d",$fromdate);
            $date2=date("Y/m/d",$todate);

            $sql="SELECT tbl_details_of_bills.ID_Product, tbl_details_of_bills.ID_Bill,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_bill.placeoder_date from tbl_bill ,tbl_details_of_bills WHERE   tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product ORDER BY TongSoLuong DESC LIMIT 5";
            $rs=mysqli_query($conn, $sql);
            echo"<table class='table sortable'>
            <thead>
              <tr>
                <th scope='col'>ID_Product</th>
                <th scope='col'>ID_Type</th>
                <th scope='col'>Name</th>
                <th scope='col'>Placeoder Date</th>
                <th scope='col'>number of sold product</th>
              </tr>
            </thead>
            <tbody>";
            while($row=mysqli_fetch_array($rs)){
                $sql1= "Select * from tbl_product where ID_Product='".$row["ID_Product"]."'";
                $name=mysqli_fetch_object(mysqli_query($conn,$sql1));
                echo" <tr>
                <th scope='row'>".$row["ID_Product"]."</th>
                <td>$name->ID_type</td>
                <td>$name->Name</td>
                <td>".$row["placeoder_date"]."</td>
                <td>".$row["TongSoLuong"]."</td>
              </tr>";
            }
            echo" </tbody>
            </table>";
        }
    }
    function thongkedoanhthu(){
        if (isset($_POST["fromdate"]) && isset($_POST["todate"]) && $_POST["type"]){
            include("../admin/config.php");
            $type=$_POST['type'];
            $fromdate=strtotime($_POST["fromdate"]);
            $todate=strtotime($_POST["todate"]);
            $date1=date("Y/m/d",$fromdate);
            $date2=date("Y/m/d",$todate);
            $sql="SELECT tbl_details_of_bills.ID_Product, tbl_details_of_bills.ID_Bill,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_bill.placeoder_date from tbl_bill ,tbl_details_of_bills WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product ORDER BY TongSoLuong DESC LIMIT 5";
            $rs=mysqli_query($conn, $sql);
            if ($type=="All"){
            echo"        
            <table class='table sortable'>
           <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
            <thead>
              <tr>
                <th scope='col'>ID_Product</th>
                <th scope='col'>ID_Type</th>
                <th scope='col'>Name</th>
                <th scope='col'>number of sold product</th>
              </tr>
            </thead>
            <tbody>";
            while($row=mysqli_fetch_array($rs)){
                $sql1= "Select * from tbl_product where ID_Product='".$row["ID_Product"]."'";
                $name=mysqli_fetch_object(mysqli_query($conn,$sql1));
                echo" <tr>
                <th scope='row'>".$row["ID_Product"]."</th>
                <td>$name->ID_type</td>
                <td>$name->Name</td>
                <td>".$row["TongSoLuong"]."</td>
              </tr>";
            }
            echo" </tbody>
            </table>";
          $sql3="SELECT * from tbl_product where ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
          $rs1=mysqli_query($conn, $sql3);
          echo"        
          <table class='table sortable'>
         <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
          <thead>
            <tr>
              <th scope='col'>ID_Product</th>
              <th scope='col'>ID_Type</th>
              <th scope='col'>Name</th>

            </tr>
          </thead>
          <tbody>";
          while($row=mysqli_fetch_array($rs1)){
              echo" <tr>
              <th scope='row'>".$row["ID_Product"]."</th>
              <td>".$row["ID_type"]."</td>
              <td>".$row["Name"]."</td>
            </tr>";
        }
        echo" </tbody>
        </table>";
    }
    if ($type=="BED"){
        $sql4="SELECT tbl_bill.placeoder_date,tbl_details_of_bills.ID_Product,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_product.ID_type,tbl_product.Name From tbl_details_of_bills,tbl_product,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_details_of_bills.ID_Product=tbl_product.ID_Product AND tbl_product.ID_type='BED' AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product";
        $rs2=mysqli_query($conn,$sql4);
        echo"        
        <table class='table sortable'>
       <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
        <thead>
          <tr>
            <th scope='col'>ID_Product</th>
            <th scope='col'>ID_Type</th>
            <th scope='col'>Name</th>
            <th scope='col'>Placeoder Date</th>
            <th scope='col'>number of sold product</th>
          </tr>
        </thead>
        <tbody>";
        while($row=mysqli_fetch_array($rs2)){
            echo" <tr>
            <th scope='row'>".$row["ID_Product"]."</th>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["TongSoLuong"]."</td>
          </tr>";
        }
        echo" </tbody>
        </table>";
      $sql3="SELECT * from tbl_product where ID_type='BED' AND ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
      $rs1=mysqli_query($conn, $sql3);
      echo"        
      <table class='table sortable'>
     <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
      <thead>
        <tr>
          <th scope='col'>ID_Product</th>
          <th scope='col'>ID_Type</th>
          <th scope='col'>Name</th>

        </tr>
      </thead>
      <tbody>";
      while($row=mysqli_fetch_array($rs1)){
          echo" <tr>
          <th scope='row'>".$row["ID_Product"]."</th>
          <td>".$row["ID_type"]."</td>
          <td>".$row["Name"]."</td>
        </tr>";
    }
    echo" </tbody>
    </table>";
    }
    if ($type=="CT"){
        $sql4="SELECT tbl_bill.placeoder_date,tbl_details_of_bills.ID_Product,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_product.ID_type,tbl_product.Name From tbl_details_of_bills,tbl_product,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_details_of_bills.ID_Product=tbl_product.ID_Product AND tbl_product.ID_type='CT' AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product";
        $rs2=mysqli_query($conn,$sql4);
        echo"        
        <table class='table sortable'>
       <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
        <thead>
          <tr>
            <th scope='col'>ID_Product</th>
            <th scope='col'>ID_Type</th>
            <th scope='col'>Name</th>
            <th scope='col'>Placeoder Date</th>
            <th scope='col'>number of sold product</th>
          </tr>
        </thead>
        <tbody>";
        while($row=mysqli_fetch_array($rs2)){
            echo" <tr>
            <th scope='row'>".$row["ID_Product"]."</th>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["TongSoLuong"]."</td>
          </tr>";
        }
        echo" </tbody>
        </table>";
      $sql3="SELECT * from tbl_product where ID_type='CT' AND ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
      $rs1=mysqli_query($conn, $sql3);
      echo"        
      <table class='table sortable'>
     <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
      <thead>
        <tr>
          <th scope='col'>ID_Product</th>
          <th scope='col'>ID_Type</th>
          <th scope='col'>Name</th>

        </tr>
      </thead>
      <tbody>";
      while($row=mysqli_fetch_array($rs1)){
          echo" <tr>
          <th scope='row'>".$row["ID_Product"]."</th>
          <td>".$row["ID_type"]."</td>
          <td>".$row["Name"]."</td>
        </tr>";
    }
    echo" </tbody>
    </table>";
    }
    if ($type=="DT"){
        $sql4="SELECT tbl_bill.placeoder_date,tbl_details_of_bills.ID_Product,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_product.ID_type,tbl_product.Name From tbl_details_of_bills,tbl_product,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_details_of_bills.ID_Product=tbl_product.ID_Product AND tbl_product.ID_type='DT' AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product";
        $rs2=mysqli_query($conn,$sql4);
        echo"        
        <table class='table sortable'>
       <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
        <thead>
          <tr>
            <th scope='col'>ID_Product</th>
            <th scope='col'>ID_Type</th>
            <th scope='col'>Name</th>
            <th scope='col'>Placeoder Date</th>
            <th scope='col'>number of sold product</th>
          </tr>
        </thead>
        <tbody>";
        while($row=mysqli_fetch_array($rs2)){
            echo" <tr>
            <th scope='row'>".$row["ID_Product"]."</th>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["TongSoLuong"]."</td>
          </tr>";
        }
        echo" </tbody>
        </table>";
      $sql3="SELECT * from tbl_product where ID_type='DT' AND ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
      $rs1=mysqli_query($conn, $sql3);
      echo"        
      <table class='table sortable'>
     <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
      <thead>
        <tr>
          <th scope='col'>ID_Product</th>
          <th scope='col'>ID_Type</th>
          <th scope='col'>Name</th>

        </tr>
      </thead>
      <tbody>";
      while($row=mysqli_fetch_array($rs1)){
          echo" <tr>
          <th scope='row'>".$row["ID_Product"]."</th>
          <td>".$row["ID_type"]."</td>
          <td>".$row["Name"]."</td>
        </tr>";
    }
    echo" </tbody>
    </table>";
    }
    if ($type=="SF"){
        $sql4="SELECT tbl_bill.placeoder_date,tbl_details_of_bills.ID_Product,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_product.ID_type,tbl_product.Name From tbl_details_of_bills,tbl_product,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_details_of_bills.ID_Product=tbl_product.ID_Product AND tbl_product.ID_type='SF' AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product";
        $rs2=mysqli_query($conn,$sql4);
        echo"        
        <table class='table sortable'>
       <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
        <thead>
          <tr>
            <th scope='col'>ID_Product</th>
            <th scope='col'>ID_Type</th>
            <th scope='col'>Name</th>
            <th scope='col'>Placeoder Date</th>
            <th scope='col'>number of sold product</th>
          </tr>
        </thead>
        <tbody>";
        while($row=mysqli_fetch_array($rs2)){
            echo" <tr>
            <th scope='row'>".$row["ID_Product"]."</th>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["TongSoLuong"]."</td>
          </tr>";
        }
        echo" </tbody>
        </table>";
      $sql3="SELECT * from tbl_product where ID_type='SF' AND ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
      $rs1=mysqli_query($conn, $sql3);
      echo"        
      <table class='table sortable'>
     <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
      <thead>
        <tr>
          <th scope='col'>ID_Product</th>
          <th scope='col'>ID_Type</th>
          <th scope='col'>Name</th>

        </tr>
      </thead>
      <tbody>";
      while($row=mysqli_fetch_array($rs1)){
          echo" <tr>
          <th scope='row'>".$row["ID_Product"]."</th>
          <td>".$row["ID_type"]."</td>
          <td>".$row["Name"]."</td>
        </tr>";
    }
    echo" </tbody>
    </table>";
    }
    if ($type=="SH"){
        $sql4="SELECT tbl_bill.placeoder_date,tbl_details_of_bills.ID_Product,SUM(tbl_details_of_bills.Quantity) AS TongSoLuong,tbl_product.ID_type,tbl_product.Name From tbl_details_of_bills,tbl_product,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_details_of_bills.ID_Product=tbl_product.ID_Product AND tbl_product.ID_type='SH' AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' GROUP BY tbl_details_of_bills.ID_Product";
        $rs2=mysqli_query($conn,$sql4);
        echo"        
        <table class='table sortable'>
       <caption style='text-align:center;'>SẢN PHẨM BÁN ĐƯỢC</caption>
        <thead>
          <tr>
            <th scope='col'>ID_Product</th>
            <th scope='col'>ID_Type</th>
            <th scope='col'>Name</th>
            <th scope='col'>Placeoder Date</th>
            <th scope='col'>number of sold product</th>
          </tr>
        </thead>
        <tbody>";
        while($row=mysqli_fetch_array($rs2)){
            echo" <tr>
            <th scope='row'>".$row["ID_Product"]."</th>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["TongSoLuong"]."</td>
          </tr>";
        }
        echo" </tbody>
        </table>";
      $sql3="SELECT * from tbl_product where ID_type='SH' AND ID_Product NOT IN (SELECT ID_Product from tbl_details_of_bills,tbl_bill WHERE tbl_bill.ID_Bill=tbl_details_of_bills.ID_Bill AND tbl_bill.placeoder_date BETWEEN '$date1' AND '$date2' ORDER BY ID_Product)";  
      $rs1=mysqli_query($conn, $sql3);
      echo"        
      <table class='table sortable'>
     <caption style='text-align:center;'>SẢN PHẨM KHÔNG BÁN ĐƯỢC</caption>
      <thead>
        <tr>
          <th scope='col'>ID_Product</th>
          <th scope='col'>ID_Type</th>
          <th scope='col'>Name</th>

        </tr>
      </thead>
      <tbody>";
      while($row=mysqli_fetch_array($rs1)){
          echo" <tr>
          <th scope='row'>".$row["ID_Product"]."</th>
          <td>".$row["ID_type"]."</td>
          <td>".$row["Name"]."</td>
        </tr>";
    }
    echo" </tbody>
    </table>";
    }
    }
}
    function product(){
        include("../admin/config.php");
        $sql = "SELECT ID_Product,tbl_product.ID_type,tbl_product.Name,Selling_price,Quantity,Date,OverView FROM tbl_product,tbl_type_of_product WHERE tbl_product.ID_TYPE =tbl_type_of_product.ID_TYPE   ";
     
        $query = mysqli_query($conn,$sql);
       while( $row = mysqli_fetch_array($query))
        {
            $sql1="select * from tbl_images where ID_Product='".$row["ID_Product"]."'LIMIT 1" ;
            $image=mysqli_fetch_object(mysqli_query($conn,$sql1));
            echo"<tr data-expanded='true' class='del'>
            <td>".$row["ID_Product"]."</td>
            <td><img src='../$image->Name' alt='".$row["Name"]."' width='50' height='50'></td>
            <td>".$row["ID_type"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["Selling_price"]."</td>
            <td>".$row["Quantity"]."</td>          
            <td>".$row["Date"]."</td>
            <td style='display:flex;'>
            <div>
            <button class='nut h3' onclick='clickfix(".$row["ID_Product"].") '><i class='fa fa-wrench'></i> </button>       
            <a  class='nut h3 link' onclick='return xacnhan()' href='index.php?action=quanlysp&id=".$row["ID_Product"]."'><i class='fa fa-trash'></i></a>
            </div>'</td>
            
          </tr>";
      
        }
       
        
    }
    function account(){
        include("../admin/config.php");
        $sql = "SELECT ID_Account,tbl_account.ID_User,tbl_account.Username,tbl_users.Name,Phone,Address,Email,Status FROM tbl_account,tbl_users WHERE  tbl_account.ID_User =tbl_users.ID_User";   
        $query = mysqli_query($conn,$sql);
       while( $row = mysqli_fetch_array($query))
        {
            echo"<tr data-expanded='true'>
            <td>".$row["ID_Account"]."</td>
            <td>".$row["Username"]."</td>
            <td>".$row["Name"]."</td>
            <td>".$row["Phone"]."</td>          
            <td>".$row["Address"]."</td>
            <td>".$row["Email"]."</td>
            <td>".$row["Status"]."</td>
            <td style='display:flex;'>
            <a class='nut h3' onclick='clickfix(".$row["ID_Account"].") '><i class='fa fa-wrench'></i> </a>
            '</td>
            
          </tr>";
      
        }
       
        
    }
    function bill(){
        include("../admin/config.php");
        $sql = "SELECT ID_Bill,placeoder_date,ID_User,Sum_of_money,Status FROM tbl_bill";   
        $query = mysqli_query($conn,$sql);
       while( $row = mysqli_fetch_array($query))
        {
            echo"<tr data-expanded='true'>
            <td>".$row["ID_Bill"]."</td>
            <td>".$row["placeoder_date"]."</td>
            <td>".$row["ID_User"]."</td>      
            <td>".$row["Sum_of_money"]."</td>
            <td>".$row["Status"]."</td>
            <td style='display:flex;'>
            <a class='nut h3' onclick='clickfix(".$row["ID_Bill"].") '><i class='fa fa-wrench'></i> </a>
            <a class='nut h3' target='_blank' href='cthoadon.php?idbill=".$row["ID_Bill"]."&iduser=".$row["ID_User"]."') '><i class='fa fa-eye'></i> </a>
            '</td>
            
          </tr>";
      
        }
    }
    function showproduct($id){
        include("../admin/config.php");
        $sql =" SELECT * FROM tbl_product WHERE ID_Product = $id ";
        $query = mysqli_query($conn,$sql);
        while($row= mysqli_fetch_array( $query )){
            $rs[]=$row;
        }
        header("Access-Control-Allow-Origin:*");
        header("Content-Type:application/json");
        echo json_encode($rs);
    }
    function xoasp(){
        include("../admin/config.php");
        
        if (isset($_GET["id"])){
        echo"<script>alertBạn có chắc chắn muốn xoá sản phẩm này không</script>";  
        $id=$_GET["id"];
        $sql="DELETE FROM `tbl_images` WHERE ID_Product='$id'";
        $result=mysqli_query($conn,$sql);
        $sql1 ="DELETE FROM `tbl_product` WHERE ID_Product='$id'";
        $result1=mysqli_query($conn,$sql1);
        if ($result && $result1){
            echo"<script>alert('Xoa Thanh Cong!!!')</script>";
            echo"<script>window.location.href='index.php?action=quanlysp'</script>";
        }
        else{
            echo"<script>alert('Xoa That Bai!!!')</script>";
        }
    
        }
        else{
       
        }
    }
    function xoaaccount(){
        include("../admin/config.php");
        if (isset($_GET["id"])){
        $id=$_GET["id"];
        $sql3="Select * from tbl_account WHERE ID_Account='$id'";
        $result2=mysqli_query($conn,$sql3);
        $iduser=mysqli_fetch_object($result2);
        $sql1 ="DELETE FROM `tbl_users` WHERE ID_User='$iduser->ID_User'";
        $result1=mysqli_query($conn,$sql1);
        $sql="DELETE FROM `tbl_account` WHERE ID_Account='$id'";
        $result=mysqli_query($conn,$sql);
      
        if ($result && $result1){
            echo"<script>alert('Xoa Thanh Cong!!!')</script>";
            echo"<script>window.location.href='index.php?action=quanlytaikhoan'</script>";
        }
        else{
            echo"<script>alert('Xoa That Bai!!!')</script>";
        }
        }
    }
    
}
?>
