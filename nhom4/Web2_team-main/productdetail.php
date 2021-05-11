

<html>
<head>
<title>Luxury Furnish an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Single :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!--//webfont-->
<script src="js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
</head>
<body>
<?php
				include("./action.php");
				
				$n= new action();		
				$n->addCartWithQty();
				?>
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
			  <select tabindex="4" class="dropdown">
				<option value="" class="label" value="">En</option>
				<option value="1">English</option>
				<option value="2">French</option>
				<option value="3">German</option>
			  </select>
   			</div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		 <div class="about_box">
			<ul class="login">
			<?php 
                      if(isset($_SESSION["Username"])){
                        echo "<li class='login_text'><a href='./index.php?action=login'>".$_SESSION['Username']."</a></li>";
                        echo "<li class='wish'><a href='./index.php?action=logout'>Logout</a></li>";
                      }
                      else {
                        echo "<li class='login_text'><a href='./index.php?action=login'>Login</a></li>";
                      }
                      ?>
				<div class='clearfix'></div>
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
				<div class='clearfix'></div>
		     </ul>
			 <form action="./index.php" method="get">
				<div class="search">
			   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
			   <input type="submit" value="">
			</div>
			</form>
		
		  </div>
		</div>
    </div>
	<div class="main">
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
				<?php
				$n->getInfoProduct();
				?>

		 </div>
		</div>
	    </div>
	  
    </div>
    <div class="footer">
		<div class="container">
			<div class="footer-grid">
				<h3>Category</h3>
				<ul class="list1">
				  <li><a href="index.html">Home</a></li>
				  <li><a href="index.php?action=about">About us</a></li>
				  <li><a href="index.php?action=about">Eshop</a></li>
				  <li><a href="index.php?action=about">Features</a></li>
				  <li><a href="index.php?action=about">New Collections</a></li>
				  <li><a href="typo.html">Typo</a></li>
				  <li><a href="index.php?action=contact">Contact</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Our Account</h3>
				<ul class="list1">
				  <li><a href="login.html">Your Account</a></li>
				  <li><a href="index.php?action=contact">Personal information</a></li>
				  <li><a href="index.php?action=contact">Addresses</a></li>
				  <li><a href="#">Discount</a></li>
				  <li><a href="checkout.php">Orders history</a></li>
				  <li><a href="index.php?action=about">Search Terms</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Our Support</h3>
				<ul class="list1">
				  <li><a href="index.php?action=contact">Site Map</a></li>
				  <li><a href="index.php?action=about">Search Terms</a></li>
				  <li><a href="index.php?action=about">Advanced Search</a></li>
				  <li><a href="index.php?action=about">Mobile</a></li>
				  <li><a href="index.php?action=contact">Contact Us</a></li>
				  <li><a href="index.php?action=contact">Mobile</a></li>
				  <li><a href="index.php?action=contact">Addresses</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Newsletter</h3>
				<p class="footer_desc">Nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p>
				<div class="search_footer">
				  <input type="text" class="text" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}">
				  <input type="submit" value="Subscribe">
				</div>
				<img src="images/payment.png" class="img-responsive" alt=""/>
			</div>
			 <div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class="copy">
			   <p>Copyright &copy; 2021 Luxury Furnish. All Rights Reserved . Design by My Team </p>
			</div>
		</div>
	</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
})
</script>
	        
</body>
</html>		