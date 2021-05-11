<?php 
                               include("./action.php");
                               $g= new action();
                               $g->addCart();

                               ?>
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
				<h3 class="m_1">Giường Ngủ</h3>
				<div class="row">
				<?php 
				$g->get6Bedproduct();
				?>

				</div> 
				<h3 class="m_2">Ghế Sofa</h3>
				<div class="row">
					<?php 
						$g->get6Sofaproduct();
					?>
				</div>
				<h3 class="m_2">Tủ Kệ</h3>
				<div class="row">

				<?php 
						$g->get6Shelfproduct();
					?>
				</div>
				<h3 class="m_2">Bàn Cà Phê</h3>
				<div class="row">

				<?php 
						$g->get6Coffeeproduct();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

