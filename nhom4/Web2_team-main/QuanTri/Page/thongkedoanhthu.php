
<section id="main-content">
	<section class="wrapper">
		<div class="typo-agile">
			<h2 class="w3ls_head">THỐNG KÊ TÌNH HÌNH KINH DOANH THEO THỜI GIAN</h2>
			<form  method="POST">
			<div class="form-group row">
				<label for="from" class="col-form-label">Từ Ngày</label>
				<div class="col-6">
					<input class="form-control" type="date" value="" id="from" name='fromdate'>
				</div>			
			</div>
			<div class="form-group row">
			<label for="to" class="col-form-label">Đến Ngày</label>
				<div class="col-6">
					<input class="form-control" type="date" value="" id="to" name="todate">
				</div>
				</div>
		
			<div class="form-group row">
			<label for="type" class="col-form-label">Thể Loại</label>
				<div class="col-6">
					<select name="type" id="type" class="form-control">
					<option value="All">Tất cả</option>
					<option value="BED">Bed</option>
					<option value="CT">Coffee Table</option>
					<option value="DT">Dinner Table</option>
					<option value="SF">Sofa</option>
					<option value="SH">Shelf</option>
					</select>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<?php 
				include("./action.php");
				$z= new action();
				$z->thongkedoanhthu();
			?>
		</div>
	</section>
	<!-- footer -->
	
	<!-- / footer -->
</section>
