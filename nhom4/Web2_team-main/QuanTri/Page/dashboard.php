<section id="main-content">
    <section class="wrapper">
        <!-- //market-->
        <div class="market-updates">
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-2">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-eye"> </i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Sản Phẩm</h4>
                        <h3><?php
                            include("../admin/config.php");
                            $prodcut = "Select * from tbl_product";
                            $num_product = mysqli_num_rows(mysqli_query($conn, $prodcut));
                            echo "$num_product";
                            ?></h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-1">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Người Dùng</h4>
                        <h3><?php

                            $user = "Select * from tbl_account";
                            $num_user = mysqli_num_rows(mysqli_query($conn, $user));
                            echo "$num_user"; ?></h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-3">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Đã Bán</h4>
                        <h3><?php
                            $bill = "Select * from tbl_bill where Status=N'Đã Giao Thành Công'";
                            $numbill = mysqli_num_rows(mysqli_query($conn, $bill));
                            echo "$numbill";
                            ?></h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-3 market-update-gd">
                <div class="market-update-block clr-block-4">
                    <div class="col-md-4 market-update-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-8 market-update-left">
                        <h4>Đơn Hàng</h4>
                        <h3><?php
                            $oder = "Select * from tbl_bill where Status=N'Đã Giao Thành Công' or Status=N'Đã Tiếp Nhận' or Status=N'Đã Gửi Hàng' ";
                            $numoder = mysqli_num_rows(mysqli_query($conn, $oder));
                            echo "$numoder";
                            ?></h3>
                        <p>Other hand, we denounce</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- //market-->

        <div class="agil-info-calendar">
            <!-- calendar -->
            <div class="col-md-6 agile-calendar">
                <div class="calendar-widget">
                    <div class="panel-heading ui-sortable-handle">
                        <span class="panel-icon">
                            <i class="fa fa-calendar-o"></i>
                        </span>
                        <span class="panel-title"> Calendar Widget</span>
                    </div>
                    <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">

                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">

                                </div>
                                <div class="monthly" id="mycalendar">
                                  
                                 
                           
                                    <div class="monthly-event-list">
                                        <div class="monthly-list-item" id="mycalendarday1" data-number="1">
                                            <div class="monthly-event-list-date">SAT<br>1</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday2" data-number="2">
                                            <div class="monthly-event-list-date">SUN<br>2</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday3" data-number="3">
                                            <div class="monthly-event-list-date">MON<br>3</div>
                                        </div>
                                        <div class="monthly-list-item monthly-today" id="mycalendarday4" data-number="4">
                                            <div class="monthly-event-list-date">TUE<br>4</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday5" data-number="5">
                                            <div class="monthly-event-list-date">WED<br>5</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday6" data-number="6">
                                            <div class="monthly-event-list-date">THU<br>6</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday7" data-number="7">
                                            <div class="monthly-event-list-date">FRI<br>7</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday8" data-number="8">
                                            <div class="monthly-event-list-date">SAT<br>8</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday9" data-number="9">
                                            <div class="monthly-event-list-date">SUN<br>9</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday10" data-number="10">
                                            <div class="monthly-event-list-date">MON<br>10</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday11" data-number="11">
                                            <div class="monthly-event-list-date">TUE<br>11</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday12" data-number="12">
                                            <div class="monthly-event-list-date">WED<br>12</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday13" data-number="13">
                                            <div class="monthly-event-list-date">THU<br>13</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday14" data-number="14">
                                            <div class="monthly-event-list-date">FRI<br>14</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday15" data-number="15">
                                            <div class="monthly-event-list-date">SAT<br>15</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday16" data-number="16">
                                            <div class="monthly-event-list-date">SUN<br>16</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday17" data-number="17">
                                            <div class="monthly-event-list-date">MON<br>17</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday18" data-number="18">
                                            <div class="monthly-event-list-date">TUE<br>18</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday19" data-number="19">
                                            <div class="monthly-event-list-date">WED<br>19</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday20" data-number="20">
                                            <div class="monthly-event-list-date">THU<br>20</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday21" data-number="21">
                                            <div class="monthly-event-list-date">FRI<br>21</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday22" data-number="22">
                                            <div class="monthly-event-list-date">SAT<br>22</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday23" data-number="23">
                                            <div class="monthly-event-list-date">SUN<br>23</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday24" data-number="24">
                                            <div class="monthly-event-list-date">MON<br>24</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday25" data-number="25">
                                            <div class="monthly-event-list-date">TUE<br>25</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday26" data-number="26">
                                            <div class="monthly-event-list-date">WED<br>26</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday27" data-number="27">
                                            <div class="monthly-event-list-date">THU<br>27</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday28" data-number="28">
                                            <div class="monthly-event-list-date">FRI<br>28</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday29" data-number="29">
                                            <div class="monthly-event-list-date">SAT<br>29</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday30" data-number="30">
                                            <div class="monthly-event-list-date">SUN<br>30</div>
                                        </div>
                                        <div class="monthly-list-item" id="mycalendarday31" data-number="31">
                                            <div class="monthly-event-list-date">MON<br>31</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //calendar -->
       
            <div class="clearfix"> </div>
        </div>
        <!-- tasks -->

        <!-- //tasks -->

    </section>
    <!-- footer -->
    <div class="footer">
        <div class="wthree-copyright">
            <p>© 2021 Web 2. Thầy Chấm Nhẹ Tay ^_^ | Design by My Team</p>
        </div>
    </div>
    <!-- / footer -->
</section>