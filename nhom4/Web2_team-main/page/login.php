
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
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        &nbsp;Account
                        <span>&gt;</span>&nbsp;
                    </li>
                    <li class="women">
                       Login
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   <div class="col-md-6 login-left">
			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="index.php?action=register">Create an Account</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form method="post">
				  <div>
					<span>Email Address<label>*</label></span>
					<input type="text" name="tk" id="tk"> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name="mk" id="mk"> 
				  </div>
				  <a class="forgot" href="#">Forgot Your Password?</a>
				  <input type="submit" onclick="dangnhap()" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
		  </div>
	     </div>
	    </div>
		<script>
			function dangnhap(){
				var tk=$("#tk").val();
				var mk=$("#mk").val();
				$.post("../ajax.php",{tk:tk,mk:mk,action:"login"},function(result){
					if(result==1){
						alert("Bạn đã đăng nhập thành công!");
						window.location.href="../index.php";
					}
					if(result==2){
						alert("Sai mật khẩu vui lòng kiểm tra lại!");
					}
					 if(result==-1){
						alert("Tài khoản của bạn đã bị khoá!");
					}
					if (result==0){
						alert("Không tồn tại tên user!");
					}
				});
			}
		</script>