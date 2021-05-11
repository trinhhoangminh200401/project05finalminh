<?php
    include("action.php");
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "login":{
                $a=new action();
                echo $a->login($_POST["tk"],$_POST["mk"]);
                break;
            }
            case "xemsp":{
                include("../admin/config.php");
                $id=$_POST["id"];
                $sql =" SELECT * FROM tbl_product WHERE ID_Product ='$id' ";
                $query = mysqli_query($conn,$sql);
                while($row= mysqli_fetch_array( $query )){
                    $rs[]=$row;
                }
                header("Access-Control-Allow-Origin:*");
                header("Content-Type:application/json");
                echo json_encode($rs);
                break;
            }
            case "xemaccount":{
                include("../admin/config.php");
                $id=$_POST["id"];
                $sql =" SELECT tbl_account.ID_Account,Username,Name, Phone,Address,Email,Status FROM tbl_account,tbl_users WHERE tbl_account.ID_Account ='$id' And tbl_account.ID_User=tbl_users.ID_User ";
                $query = mysqli_query($conn,$sql);
                while($row= mysqli_fetch_array( $query )){
                    $rs[]=$row;
                }
                header("Access-Control-Allow-Origin:*");
                header("Content-Type:application/json");
                echo json_encode($rs);                break;
            }
            case "suasp":{
                include("../admin/config.php");
                $id=$_POST["id"];
                $sell=$_POST["sell"];
                $idtype=$_POST["idtype"];
                $status=$_POST["status"];
                $over=$_POST["over"];
                $date=$_POST["date"];
                $name=$_POST["name"];
                $sql="UPDATE `tbl_product` SET Selling_price='$sell',ID_type='$idtype',Status='$status',OverView='$over',Date='$date',Name='$name' where ID_Product='$id'";
                $query = mysqli_query($conn,$sql);
                if($query){
                    echo 1;
                }
                else{
                    echo 0;
                }
                break;
            }
            case "suaacc":{
                include("../admin/config.php");
                $id=$_POST["id"];           
                $status=$_POST["status"];           
                $sql="UPDATE `tbl_account` SET Status='$status' where ID_Account='$id'";
                $query = mysqli_query($conn,$sql);
                if($query){
                    echo 1;
                }
                else{
                    echo 0;
                }
                break;
            }
            
            case "themsp":{
            if ($_POST["idtype"]!='' && $_POST["name"]!='' && $_POST["quantity"]!='') 
            {
                include("../admin/config.php");
                $check="Select * from tbl_product";
                $check1="Select * from tbl_images";
                $num=mysqli_num_rows(mysqli_query($conn,$check));    
                $num1=mysqli_num_rows(mysqli_query($conn,$check1));        
                $id=$num+1;
                $image2="";
                $idimage=$num1+1;
                $sell=$_POST["sell"];
                $idtype=$_POST["idtype"];
                $quantity=$_POST["quantity"];
                $over=$_POST["over"];
                $date=$_POST["date"];
                $name=addslashes($_POST["name"]);
                $image=$_POST["image"];
                $u=0;
                $quan=0;
                $idproduct=0;
                $image1= str_replace("C:\\fakepath\\","",$image);
                if ($idtype=='BED'){
                    $image2="images/Bed/".$image1;
                }
                if ($idtype=='CT'){
                    $image2="images/Coffee/".$image1;
                }
                if ($idtype=='DT'){
                    $image2="images/BoBanAn/".$image1;
                }
                if ($idtype=='SF'){
                    $image2="images/Sofa/".$image1;
                }
                if ($idtype=='SH'){
                    $image2="images/Shelf/".$image1;
                }
                $timsptrung=mysqli_query($conn, $check);
                while($z= mysqli_fetch_array($timsptrung)){
                    if ($name==$z["Name"] && $idtype==$z["ID_type"]){
                        $u+=1;
                        $quan=$quantity + $z["Quantity"];
                        $idproduct=$z["ID_Product"];
                    }
                }
                if ($u!=0){
                    $sql="UPDATE `tbl_product` SET Quantity=$quan WHERE ID_Product='$idproduct'";             
                    $query = mysqli_query($conn,$sql);
                    
                    if($query){
                        echo 2;
                    }
                    else{
                        echo 3;
                    }
                }
                else{
                    $sql="INSERT INTO `tbl_product`(`ID_Product`, `ID_type`, `Name`, `Selling_price`, `Quantity`, `Date`, `OverView`) VALUES ('$id','$idtype','$name','$sell',$quantity,'$date','$over')";             
                    $query = mysqli_query($conn,$sql);
                    $sql1="INSERT INTO `tbl_images`(`ID_Images`, `ID_Product`, `Name`) VALUES ('$idimage','$id','$image2')";
                    $query1=mysqli_query($conn,$sql1);
                    if($query && $query1){
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
                }
            }else{
                echo 5;
            }
                break;
            }
            case "suabill":{
                include("../admin/config.php");
                $id=$_POST["id"];
                $status=$_POST["status"];
            
                $sql="UPDATE `tbl_bill` SET Status='$status' where ID_Bill='$id'";
                $query = mysqli_query($conn,$sql);
                if($query){
                    echo 1;
                }
                else{
                    echo 0;
                }
                break;
            }
            case "formbill":{
                include("../admin/config.php");
                $id=$_POST["id"];
                $sql =" SELECT * FROM tbl_bill WHERE ID_Bill ='$id' ";
                $query = mysqli_query($conn,$sql);
                while($row= mysqli_fetch_array( $query )){
                    $rs[]=$row;
                }
                header("Access-Control-Allow-Origin:*");
                header("Content-Type:application/json");
                echo json_encode($rs);
                break;
        }
    }
}
?>