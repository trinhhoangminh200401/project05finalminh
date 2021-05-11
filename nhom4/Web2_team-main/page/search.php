<?php 
       include("./action.php");
       $j= new action();
      $j->addCart();
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
                        <div class="dreamcrub">
                            <ul class="breadcrumbs">
                                <li class="home">
                                    <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                                    <span>&gt;</span>
                                </li>
                                <li class="home">&nbsp; About&nbsp;
                                    <span>&gt;</span>&nbsp;
                                </li>
                            </ul>
                            <ul class="previous">
                                <li><a href="index.php">Back to Previous Page</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mens-toolbar">
                           
                        
                            <div class="clearfix"></div>
                        </div>
                        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                            <div class="cbp-vm-options">
                                <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
                                <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
                            </div>
                           
                            <div class="clearfix"></div>
                            <ul>
                              <?php                       
                              $j->basicSearch();
                              ?>
                            </ul>
                        </div>
                        <script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                        <script src="js/classie.js" type="text/javascript"></script>
                        <script>
       
                        </script>
                    </div>
                </div>
            </div>
        </div>
  