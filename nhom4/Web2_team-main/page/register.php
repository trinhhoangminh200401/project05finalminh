
<div class="container">
		  <div class="register">
		  	  <form method="post"> 
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div>
						<span>UserName<label>*</label></span>
						<input type="text" name="Username" id="username"> 
					 </div>
					 <div>
						<span>Full Name<label>*</label></span>
						<input type="text" name="Fullname" id="fullname"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="Email" id="email"> 
					 </div>
					 <div>
						 <span>Address<label>*</label></span>
						 <input type="text" name="address" id="address"> 
					 </div>
					 <div>
						 <span>Phone<label>*</label></span>
						 <input type="tel" name="phone" id="phone"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>LOGIN INFORMATION</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="psw" id="pass">
							 </div>
							 <div>
								<span>Confirm Password<label>*</label></span>
								<input type="password" name="re_psw" id="repass">
							 </div>
					 </div>

				<div class="clearfix"> </div>
				<div class="register-but">
					   <input type="submit" onclick="dangky()" value="submit" >
					   <div class="clearfix"> </div>
				</div>
				</form>
		   </div>
	     </div>
		 <script>
			function dangky(){
				var username=$("#username").val();
				var fullname=$("#fullname").val();
				var email=$("#email").val();
				var address=$("#address").val();
				var phone=$("#phone").val();
				var pass=$("#pass").val();
				var repass=$("#repass").val();
				$.post("../ajax.php",{username:username,fullname:fullname,email:email,address:address,phone:phone,pass:pass,repass:repass,action:"register"},function(rs){
					if (rs==3){
						alert('Địa chỉ Email không phù hợp!');
                    //window.location.href='../index.php?action=register';
					}
					if (rs==2){
						alert('Định dạng số điện thoại không đúng!');
                 		// window.location.href='../index.php?action=register';
					}
					if (rs==0){
						alert('Mật Khẩu Nhập Lại Không Trùng Khớp');
                  	 	//window.location.href='../index.php?action=register';
					}
					if (rs==-1){
						alert('Tên đăng nhập đã tồn tại');
                        //window.location.href='../index.php?action=register';
					}
					if (rs==1){
						alert('Đăng Ký Thành Công');
                       	window.location.href='../index.php?action=login';
					}
					if (rs==-2){
						alert('Vui Lòng Nhập Đầy Đủ Thông Tin');
           				//window.location.href='../index.php?action=register';
					}
				});
			}
		</script>