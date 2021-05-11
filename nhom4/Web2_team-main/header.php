<div class="header">	
    <div class="container"> 
       <div class="header-top">
             <div class="logo">
              <a href="index.php"><h6>Online Furnish</h6><h2>Luxury</h2></a>
           </div>
         <div class="header_right">
           <ul class="social">
              <li><a href=""> <i class="fb"> </i> </a></li>
              <li><a href=""><i class="tw"> </i> </a></li>
              <li><a href=""><i class="utube"> </i> </a></li>
              <li><a href=""><i class="pin"> </i> </a></li>
              <li><a href=""><i class="instagram"> </i> </a></li>
           </ul>
          <div class="lang_list">
            <div class="dropdown"><span class="old"><select tabindex="4" class="" id="EasyDropDownC9CFEE">
              <option value="" class="label">En</option>
              <option value="1">English</option>
              <option value="2">French</option>
              <option value="3">German</option>
            </select></span><span class="selected">En</span><span class="carat"></span><div><ul><li>English</li><li>French</li><li>German</li></ul></div></div>
             </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
       </div>  
       <div class="banner_wrap">
          <div class="bannertop_box">
                  <ul class="login">
                      <?php 
                      if(isset($_SESSION["Username"])){
                        echo "<li class='login_text'><a href='./index.php?action=userbill'>".$_SESSION['Username']."</a></li>";
                        echo "<li class='wish'><a href='./index.php?action=logout'>Logout</a></li>";
                      }
                      else {
                        echo "<li class='login_text'><a href='./index.php?action=login'>Login</a></li>";
                      }
                      ?>
                      
                      <div class="clearfix"></div>
                  </ul>
                  <div class="cart_bg">
                    <ul class="cart">
                      <?php 
                      $i=0;
                      $total=0;
                        if (isset($_SESSION["giohang"])){
                          foreach ($_SESSION["giohang"] as $key => $val){
                            $i+=$val['qty'];
                            $total += $val['qty'] * $val['price'];
                          }
                          echo" <a href='checkout.php'>
                          <h4><i class='cart_icon'> </i><p>Cart: <span class='simpleCart_total'>$total</span> (<span id='simpleCart_quantity' class='simpleCart_quantity'>$i</span> items)</p><div class='clearfix'> </div></h4>
                          </a>";
                         
                          } else{
                            echo" <a href='checkout.php'>
                            <h4><i class='cart_icon'> </i><p>Cart: <span class='simpleCart_total'>$0</span> (<span id='simpleCart_quantity' class='simpleCart_quantity'>0</span> items)</p><div class='clearfix'> </div></h4>
                         </a>";

                        }
                      ?>
                      
                   <h5 class="empty"><a href="index.php?action=empty_cart" class="simpleCart_empty">Empty Cart</a></h5>
                   <div class="clearfix"> </div>
                </ul>
                  </div>
                <ul class="quick_access">
                      <li class="view_cart"><a href="checkout.php">View Cart</a></li>
                      <li class="check"><a href="checkout.php">Checkout</a></li>
                      <div class="clearfix"></div>
                  </ul>
                  <form action="index.php?action=search" method="post">
                  <div class="search">
                   <input name="search" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';} ">
                 <input type="submit" value="">
                </div>
                </form>
                <div class="welcome_box">
                    <h3>Warning!!!</h3>
                    <p>This is not a real Ecomerce Website, this is just a small Project</p>
                </div>
              </div>
              <div class="banner_right">
                  <h1>ĐỒ ÁN NHỎ NHỎ <br>TẠM TẠM</h1>
                  <p>ĐỂ NỘP CHO THẦY SANG ÁAAAA</p>
                  <a href="index.php?action=about" class="banner_btn">Buy Now</a>
              </div>
              <div class="clearfix"></div>
      </div>
     </div>
  </div>