<?php
error_reporting(0);
session_start();
class action
{
    function dangki($username, $fullname, $email, $address, $phone, $pass, $repass){
        include("./admin/config.php");
        if(isset($_POST["username"])&& isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["pass"]) && isset($_POST["repass"])){
            if ( $_POST["username"]!="" && $_POST["fullname"]!="" && $_POST["email"]!="" && $_POST["address"]!="" && $_POST["phone"]!="" && $_POST["pass"]!="" && $_POST["repass"]!=""){
                $user = $_POST["username"];
                $fullname=$_POST["fullname"];
                $email=$_POST["email"];
                $phone=$_POST["phone"];
                $password=$_POST["pass"];
                $repsw=$_POST["repass"];
                $address=$_POST["address"];
                $mailformat =preg_match("/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/",$email);
                $telformat=preg_match("/^[0][3579][0-9]{6,8}$/",$phone);
                if ($mailformat==0){
                  return 3;
                }
                else if($telformat==0){
                  return 2;
                }
                else if($repsw!=$password){
                   return 0;
                }
                
                else{
                    $account="Select * from tbl_account";
                    $num_account=mysqli_num_rows(mysqli_query($conn,$account));
                    $idacc=$num_account+1;
                    $i=0;
                    $nuser="Select * from tbl_users";
                    $checkusername=mysqli_query($conn,$nuser);
                    while ($a=mysqli_fetch_array($checkusername)){
                        if ($user==$a["Username"]){
                            $i +=1;
                        }
                    }
                    if ($i!=0){
                       return -1;
                    }
                    $num_user=mysqli_num_rows(mysqli_query($conn,$nuser));
                    $iduser=$num_user+1;
                    $sql="INSERT INTO `tbl_account`(`ID_Account`, `Username`, `pass`, `ID_User`, `ID_Right`, `Status`) VALUES ($idacc,'$user','$password','$iduser','1','active')";  
                    $result=mysqli_query($conn,$sql);
                    $sql2="INSERT INTO `tbl_users`(`ID_User`, `Name`, `Phone`, `Address`, `Email`) VALUES ('$iduser','$fullname','$phone','$address','$email')";   
                    $result1=mysqli_query($conn,$sql2);
                    if ($result && $result1){
                       return 1;
                    }
                    else{
                        echo"<script>alert('Đăng Ký Thất Bại')</script>";
                    }
                  
                }
                
        }
        else{
           return -2;
        }
    }
        
    }
    function dangnhap($tk, $mk)
    {
        include("./admin/config.php");
        if (isset($_POST["tk"]) || isset($_POST["mk"])) {
            $username = addslashes($_POST['tk']);
            $password = addslashes($_POST['mk']);
            $sql = "SELECT * FROM tbl_account WHERE Username='$username'";
            $query = mysqli_query($conn, $sql);
            if (mysqli_num_rows($query) == 0){
                return 0;
            }

            $row=mysqli_fetch_object($query);
            if ($row->Status=="freeze"){
                return -1;
            }
            if ($password==$row->pass) {
                $_SESSION["Username"] = $tk;
                $_SESSION["ID_User"]=$row->ID_User;
                return 1;
            } else {
                return 2;
            }
        }
        }
    function product($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1) * 9;
        $sql = "SELECT * FROM tbl_product LIMIT 9 OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function Bedproduct($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1) *9;
        $sql = "SELECT * FROM tbl_product Where ID_type='BED' LIMIT 9 OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function Coffeeproduct($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1) * 9;
        $sql = "SELECT * FROM tbl_product Where ID_type='CT' LIMIT 9  OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li  class='col-lg-4 simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function Tableproduct($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1)*9;
        $sql = "SELECT * FROM tbl_product Where ID_type='DT' LIMIT 9 OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function Shelfproduct($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1)*9;
        $sql = "SELECT * FROM tbl_product Where ID_type='SH' LIMIT 9 OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function Sofaproduct($trangHienTai)
    {
        include("./admin/config.php");
        $soSanPham = ($trangHienTai-1)*9;
        $sql = "SELECT * FROM tbl_product Where ID_type='SF' LIMIT 9 OFFSET $soSanPham";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
        }
    }
    function getInfoProduct()
    {
        if (isset($_GET["id"])) {

            $id = $_GET["id"];
            include("./admin/config.php");
            $sql = "SELECT * FROM tbl_product Where ID_Product='$id'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_object($query);
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='$row->ID_Product'";
            $query1 = mysqli_query($conn, $sql1);
            echo "<div class='col-md-9'>
            <div class='dreamcrub'>
                <ul class='breadcrumbs'>
                <li class='home'>
                   <a href='index.php' title='Go to Home Page'>Home</a>&nbsp;
                   <span>&gt;</span>
                </li>
                <li class='home'>
                   <a href='index.php?action=about' title='Go to Home Page'>About</a>&nbsp;
                   <span>&gt;</span>
                </li>        
                <li class='home'>&nbsp;
                   $row->Name
                    <span>&gt;</span>&nbsp;
                </li>                   
            </ul>
            <ul class='previous'>
                <li><a href='index.php?action=" . $_GET["action"] . "'>Back to Previous Page</a></li>
            </ul>
            <div class='clearfix'></div>
           </div>
           <div class='singel_right'>
             <div class='labout span_1_of_a1'>
               <div class='flexslider'>
                 <ul class='slides'>";
            while ($hinh = mysqli_fetch_array($query1))

                echo "<li data-thumb='" . $hinh["Name"] . "'>
                   <img src='" . $hinh["Name"] . "' />
               </li>";
            echo " </ul>
              </div>
          </div>
          <div class='cont1 span_2_of_a1 simpleCart_shelfItem'>

            <h1>$row->Name</h1>
            <div class='price_single'>
              <span class='amount item_price actual'>$$row->Selling_price</span><h1>Giá:</h1>
            </div>
            <h3 class='quick'>Quick Overview:</h3>
            <p class='quick_desc'>$row->OverView</p>
       
            
            <div class='btn_form button item_add item_1'>
            <form action='productdetail.php?action=" . $_GET["action"] . "&id=" . $_GET["id"] . "&do=addcart' method='post' >
           
            <ul class='product-qty'>
               <span>Quantity:</span>
               <div class='buttons_added'>
               <input class='minus is-form' type='button' value='-'>
               <input aria-label='quantity' class='input-qty' max='$row->Quantity' min='1' name='quantity' type='number' value='1'>
               <input class='plus is-form' type='button' value='+'>
             </div>
             <span>Remain Products:$row->Quantity</span>
            </ul>
                 <input type='submit' value='Add to Cart' title=''  >
            
              </form>
              </div>
        </div>
        <div class='clearfix'></div>
       </div>
                
                <script type='text/javascript'>
                 $(window).load(function() {
                    $('#flexiselDemo3').flexisel({
                        visibleItems: 3,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,    		
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: { 
                            portrait: { 
                                changePoint:480,
                                visibleItems: 1
                            }, 
                            landscape: { 
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: { 
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });
                    
                });
               </script>
               <script type='text/javascript' src='js/jquery.flexisel.js'></script>
               
        </div>";
        } else {
            echo "Null";
        }
    }
    function addCart()
    {
        include("./admin/config.php");
        if (isset($_GET["do"]) && isset($_GET["id"]) && $_GET["do"] == 'addcart') {
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $sql = "Select * from tbl_product where ID_Product='$id'";
            $result = mysqli_query($conn, $sql);
            $obj = $result->fetch_object();
            $product = mysqli_num_rows($result);
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='$id' ORDER BY ID_Product ASC LIMIT 1";
            $result1 = mysqli_query($conn, $sql1);
            $obj1 = mysqli_fetch_object($result1);
            if ($product > 0) {
                if (isset($_SESSION["giohang"])) {
                    if (isset($_SESSION['giohang'][$id])) {
                        $_SESSION['giohang'][$id]['qty'] += 1;
                        $_SESSION['giohang'][$id]['name'] = $obj->Name;
                        $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                        $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                    } else {
                        $_SESSION['giohang'][$id]['qty'] = 1;
                        $_SESSION['giohang'][$id]['name'] = $obj->Name;
                        $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                        $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                    }
                } else {
                    $_SESSION['giohang'][$id]['qty'] = 1;
                    $_SESSION['giohang'][$id]['name'] = $obj->Name;
                    $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                    $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                }
            } else {
                echo "Sản phẩm đã bán hết!!!";
            }
        }
    }
    function addCartWithQty()
    {
        include("./admin/config.php");
        if (isset($_GET["do"]) && isset($_GET["id"]) && $_GET["do"] == 'addcart' && isset($_POST["quantity"])) {
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $sql = "Select * from tbl_product where ID_Product='$id'";
            $result = mysqli_query($conn, $sql);
            $obj = $result->fetch_object();
            $product = mysqli_num_rows($result);
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='$id' ORDER BY ID_Product ASC LIMIT 1";
            $result1 = mysqli_query($conn, $sql1);
            $obj1 = mysqli_fetch_object($result1);
            $today = date("d/m/Y");
            if ($product > 0) {
                if (isset($_SESSION["giohang"])) {
                    if (isset($_SESSION['giohang'][$id])) {
                        $_SESSION['giohang'][$id]['qty'] += $_POST["quantity"];
                        $_SESSION['giohang'][$id]['name'] = $obj->Name;
                        $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                        $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                        $_SESSION['giohang'][$id]['date'] = $today;
                    } else {
                        $_SESSION['giohang'][$id]['qty'] = $_POST["quantity"];
                        $_SESSION['giohang'][$id]['name'] = $obj->Name;
                        $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                        $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                        $_SESSION['giohang'][$id]['date'] = $today;
                    }
                } else {
                    $_SESSION['giohang'][$id]['qty'] = $_POST["quantity"];
                    $_SESSION['giohang'][$id]['name'] = $obj->Name;
                    $_SESSION['giohang'][$id]['price'] = $obj->Selling_price;
                    $_SESSION['giohang'][$id]['Pic'] = $obj1->Name;
                    $_SESSION['giohang'][$id]['date'] = $today;
                }
            } else {
                echo "Sản phẩm đã bán hết!!!";
            }
        }
    }
    function GioHang()
    {
        $total = 0;;
        $i = 0;
        $check=0;
        foreach ($_SESSION["giohang"] as $key => $val){
                $check++;
        }
        if (isset($_SESSION["giohang"]) && $check>0 ) {
            echo "<div class='check_box'>	 
            <div class='col-md-9 cart-items'>
                 <h1>My Shopping Bag</h1>";
            foreach ($_SESSION["giohang"] as $key => $val) {
                $i += 1;
                $total += $val['qty'] * $val['price'];
                echo " <div class='cart-header$i'>
                        <button class='close$i' onclick='xoa()'></button>
                        <div class='cart-sec simpleCart_shelfItem'>
                               <div class='cart-item cyc'>
                                    <img src='" . $val["Pic"] . "' class='img-responsive' alt=''>
                               </div>
                              <div class='cart-item-info'>
                               <h3><a href='#'>" . $val["name"] . "</a><span>Model No: " . $key . "</span></h3>
                               <ul class='qty'>
                               <li><p>Qty : ".$val["qty"]."</p></li>
                               </ul>
                               <div class='delivery'>
                                    <p>Selling Price: $" . $val['price'] . "</p>
                                    <span>Delivered in 2-3 bussiness days</span>
                                    <div class='clearfix'></div>
                               </div>	
                              </div>
                              <div class='clearfix'></div>
                                                   
                         </div>
                    </div>";

                echo "<script>$(document).ready(function(c) {
                                $('.close$i').on('click', function(c){
                                    $('.cart-header$i').fadeOut('slow', function(c){
                                        $('.cart-header$i').remove();
                                       
                                    });
                                   
                                    });	 
                                
                                });
                              
                           </script>";
                echo"<script>
                function xoa(){    
                $.post('./ajax.php?id=$key',{action:'xoasp'},function(result){
                    alert(result);
                    window.location.href='./checkout.php';
                });} 
            </script>";
            }




            echo "</div>
                 <div class='col-md-3 cart-total'>
                     <a class='continue' href='index.php?action=" . $_GET["action"] . "'>Continue to basket</a>
                     <div class='price-details'>
                         <h3>Price Details</h3>
                         <span>Total</span>
                         <span class='total1'>$total</span>
                         <span>Discount</span>
                         <span class='total1'>---</span>
           
                         <div class='clearfix'></div>				 
                     </div>	
                     <ul class='total_price'>
                       <li class='last_price'> <h4>TOTAL</h4></li>	
                       <li class='last_price'><span>$total</span></li>
                       <div class='clearfix'> </div>
                     </ul>
                        
                     
                     <div class='clearfix'></div>
                     <a class='order' href='hoadon.php?do=placeoder'>Place Order</a>
                     
                    </div>
                    <div class='clearfix'></div>
             </div>
             ";
        } else {
            echo "<h3 style='padding:10%; text-align:center;'>Bạn Chưa Mua Sản Phẩm nào!!!</h3>";
        }
    }
    function basicSearch()
    {
        if (isset($_POST["search"]) && $_POST["search"]!=null) {
            include("./admin/config.php");
            $sql = "SELECT * FROM tbl_product Where `Name`like'%" . $_POST["search"] . "%' ORDER BY ID_Product ASC LIMIT 9";
            $query = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($query)) {
                    $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
                    $query1 = mysqli_query($conn, $sql1);
                    $obj = mysqli_fetch_object($query1);
                    echo "<li class='simpleCart_shelfItem'>
            <a class='cbp-vm-image' href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                <div class='inner_content clearfix'>
                    <div class='product_image'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                        <div class='product_container'>
                            <div class='cart-left'>
                                <p class='title'>" . $row["Name"] . "</p>
                            </div>
                            <div class='mount item_price price'>$" . $row["Selling_price"] . "</div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>
            </a>
            <a class='button item_add cbp-vm-icon cbp-vm-add' href='index.php?action=" . $_GET["action"] . "&do=addcart&id=" . $row["ID_Product"] . "'>Add to cart</a>
        </li>";
                }
            }
        } else {
            echo "<p class='title' style='text-align:center;padding:7%'>Không Tìm Thấy Sản Phẩm</p>";
        }
    }
    function PlaceOder(){
        if (isset($_SESSION["Username"])){
            if (isset($_SESSION["giohang"]) && isset($_GET["do"]) && $_GET["do"]=="placeoder"){
                echo"<script>alert('Thanh toán thành công!');</script>";
            }        
        }
        else{
            echo "<script>alert('Vui lòng đăng nhập tài khoản để tiếp tục thanh toán');
            window.location.href='./index.php?action=login';</script>";
        }
     
    }
    function get6Bedproduct()
    {
        include("./admin/config.php");
        $sql = "SELECT * FROM tbl_product Where ID_type='BED' LIMIT 3";
        $query = mysqli_query($conn, $sql);
        $i=1;
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "	<div class='col-lg-4 simpleCart_shelfItem'>
            <a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
            </a>
            <div class='inner_content clearfix'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                </a>
                <div class='product_image'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                    </a><a href='index.php?do=addcart&id=" . $row["ID_Product"] . "' class='button item_add item_1'> </a>
                    <div class='product_container'>
                        <div class='cart-left'>
                            <p class='title'>".$row["Name"]."</p>
                        </div>
                        <span class='amount item_price'>".$row["Selling_price"]."</span>
                        <div class='clearfix'></div>
                    </div>
                </div>
            </div>

        </div>";
        }
    }
    function get6Sofaproduct()
    {
        include("./admin/config.php");
        $sql = "SELECT * FROM tbl_product Where ID_type='SF' LIMIT 3";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "	<div class='col-lg-4 simpleCart_shelfItem'>
            <a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
            </a>
            <div class='inner_content clearfix'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                </a>
                <div class='product_image'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                    </a><a href='index.php?do=addcart&id=" . $row["ID_Product"] . "' class='button item_add item_1'> </a>
                    <div class='product_container'>
                        <div class='cart-left'>
                            <p class='title'>".$row["Name"]."</p>
                        </div>
                        <span class='amount item_price'>".$row["Selling_price"]."</span>
                        <div class='clearfix'></div>
                    </div>
                </div>
            </div>

        </div>";
        }
    }
    function get6Shelfproduct()
    {
        include("./admin/config.php");
        $sql = "SELECT * FROM tbl_product Where ID_type='SH' LIMIT 3";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "	<div class='col-lg-4 simpleCart_shelfItem'>
            <a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
            </a>
            <div class='inner_content clearfix'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                </a>
                <div class='product_image'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                    </a><a href='index.php?do=addcart&id=" . $row["ID_Product"] . "' class='button item_add item_1'> </a>
                    <div class='product_container'>
                        <div class='cart-left'>
                            <p class='title'>".$row["Name"]."</p>
                        </div>
                        <span class='amount item_price'>".$row["Selling_price"]."</span>
                        <div class='clearfix'></div>
                    </div>
                </div>
            </div>

        </div>";
        }
    }
    function get6Coffeeproduct()
    {
        include("./admin/config.php");
        $sql = "SELECT * FROM tbl_product Where ID_type='CT' LIMIT 3";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $sql1 = "SELECT * FROM tbl_images Where ID_Product='" . $row["ID_Product"] . "' ORDER BY ID_Product ASC LIMIT 1";
            $query1 = mysqli_query($conn, $sql1);
            $obj = mysqli_fetch_object($query1);
            echo "	<div class='col-lg-4 simpleCart_shelfItem'>
            <a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
            </a>
            <div class='inner_content clearfix'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                </a>
                <div class='product_image'><a href='./productdetail.php?id=" . $row["ID_Product"] . "&action=" . $_GET["action"] . "'>
                        <img src='$obj->Name' class='img-responsive' alt=''>
                    </a><a href='index.php?do=addcart&id=" . $row["ID_Product"] . "' class='button item_add item_1'> </a>
                    <div class='product_container'>
                        <div class='cart-left'>
                            <p class='title'>".$row["Name"]."</p>
                        </div>
                        <span class='amount item_price'>".$row["Selling_price"]."</span>
                        <div class='clearfix'></div>
                    </div>
                </div>
            </div>

        </div>";
        }
    }
}

