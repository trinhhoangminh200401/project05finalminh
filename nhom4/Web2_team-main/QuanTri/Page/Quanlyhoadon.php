<?php 
          include("action.php");
          $c=new action();
          $c->xoasp();
          
        ?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">


    
    <style>
    .nut{
      cursor: pointer;
    color:black;
    padding: 1px;
    transition:1s;
    border-radius: 100px;
    margin:  15px;
  }
  .nut:hover{
    background-color: #8B5C7E;
    color:whitesmoke;
  }
  .container{
width: 100%;
 position: fixed;
 background: url(images/bg.jpg) no-repeat 0px 0px;transform: scale(1.8);
z-index: 2;
top: 5%;
  }
  
  #AAAA{
display: none;
padding: 40px;
width: 45%;
left: 17%;
font-size:20px ;
position:relative;
transform: scale(0.45);
background-color: white;
  }
  #rmove{
    position: absolute;
    right: 0;
    top: 0;
    font-size: 20px;
    background-color: whitesmoke;
    border: 0 solid gray;
  }
  #AAAAAA{
display: none;
padding: 40px;
width: 45%;
left: 17%;
font-size:20px ;
position:relative;
transform: scale(0.45);
background-color: white;
  }
  #rmove{
    position: absolute;
    right: 0;
    top: 0;
    font-size: 20px;
    background-color: whitesmoke;
    border: 0 solid gray;
  }
  
    </style>
  <div class="container"> 
     <form id="AAAA" method="POST">
    <button id="rmove">X</button>
  <div class="form-group">
    <label for="exampleInputEmail1">ID_Bill</label>
    <input type="text" class="form-control" id="idbill" disabled="false" aria-describedby="emailHelp">
    
  </div>

  
  <div class="form-group">
    <label for="name">Plaeoder Date</label>
    <input type="text" class="form-control"  id="date" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID User</label>
    <input type="text" class="form-control" id="iduser" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tổng Tiền</label>
    <input type="text" class="form-control" id="price" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select type="" class="form-control" id="status" aria-describedby="emailHelp" >
    <option value="Đã Tiếp Nhận">Đã Tiếp Nhận</option> 
    <option value="Đã Gửi Hàng">Đã Gửi Hàng</option> 
    <option value="Đã Giao Thành Công">Đã Giao Thành Công</option>   
    <option value="Bị Huỷ">Bị Huỷ</option>   
  </select>
  </div>
  


  <div id="btnsua"></div>
</form>
<form id="AAAAAA" method="POST">
    <button id="rmove">X</button>
  <div class="form-group">
    <label for="exampleInputEmail1">ID_Bill</label>
    <input type="text" class="form-control" id="idbill" disabled="false" aria-describedby="emailHelp">
    
  </div>

  
  <div class="form-group">
    <label for="name">Plaeoder Date</label>
    <input type="text" class="form-control"  id="date" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID User</label>
    <input type="text" class="form-control" id="iduser" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Tổng Tiền</label>
    <input type="text" class="form-control" id="price" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select type="" class="form-control" id="status" aria-describedby="emailHelp" >
    <option value="Đã Tiếp Nhận">Đã tiếp nhận</option> 
    <option value="Đã Gửi Hàng">Đã Gửi Hàng</option> 
    <option value="Đã Giao Thành Công">Đã Giao Thành Công</option>   
    <option value="Bị Huỷ">Bị Huỷ</option>   
  </select>
  </div>
  


  <div id="btnsua"></div>
</form> </div>

<script>
let s=  document.getElementById("idps").value
s.document
    function clickadd(){
  document.getElementById("AAAA").style.display='block'
}
  
function rmove(){
  document.getElementById("AAAA").style.display='none'
}
  
function clickfix(id){
  document.getElementById("AAAA").style.display='block';
  $.post("./ajax.php",{id:id,action:"formbill"},function(rs){
    rs.forEach(item=>{
      $("#idbill").val(item.ID_Bill);
      $("#date").val(item.placeoder_date);
      $("#iduser").val(item.ID_User);
      $("#price").val(item.Sum_of_money);
      $("#status").val(item.Status);
     $("#btnsua").html("<button a onclick='SUA(`"+id+"`)'>Sua</button>");
    });
  });
}
function clickxem(id){
  document.getElementById("AAAAAA").style.display='block';
  $.post("./ajax.php",{id:id,action:"formbill"},function(rs){
    rs.forEach(item=>{
      $("#idbill").val(item.ID_Bill);
      $("#date").val(item.placeoder_date);
      $("#iduser").val(item.ID_User);
      $("#price").val(item.Sum_of_money);
      $("#status").val(item.Status);
     $("#btnsua").html("<button a onclick='SUA(`"+id+"`)'>Sua</button>");
    });
  });
}
function SUA(id){
  let status=$("#status").val();
  $.post("./ajax.php",{id:id,status:status,action:"suabill"},function(rs){
    if(rs==1){
      alert("ok");
    
      location.reload();
    }
    else{
      alert("ko");
    }

  });

}
function rmove(){
  document.getElementById("AAAA").style.display='none';
}
function clickdelete(id){
  document.getElementById("AAAA").style.display='block';
  $.post("./ajax.php",{id:id,action:"xemsp"},function(rs){
    rs.forEach(item=>{
      $("#idps").val(item.ID_Product);
      $("#name").val(item.Name);
      $("#selling").val(item.Selling_price);
      $("#status").val(item.Status);
      $("#date").val(item.Date);
      $("#over").val(item.OverView);
      $("#idtype").val(item.ID_type);
     $("#btnsua").html("<button a onclick='XOA(`"+id+"`)'>XOA</button>")
    })
  });
}
function XOA(id){
  document.getElementsByClassName("de").style.display="none";
}

   </script>
 <div class="panel panel-default">
    <div class="panel-heading">
     Quản Lý Hoá Đơn
    </div>
    <div>
      <table class="table sortable" ui-jq="footable" ui-options="{
        &quot;paging&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;filtering&quot;: {
          &quot;enabled&quot;: true
        },
        &quot;sorting&quot;: {
          &quot;enabled&quot;: true
        }}">
        <thead>
          <tr>
            <!-- <th data-breakpoints="xs">ID</th> -->
            <th>ID_Bill</th>
            <th>Ngày Đặt</th>
            <th>Mã Khách Hàng</th>
            <th>Tổng Tiền</th>
            <th>Status</th>
            <th>Action</th>
            <!-- <th data-breakpoints="xs">Job Title</th>
           
            <th data-breakpoints="xs sm md" data-title="DOB">Date of Birth</th> -->
          </tr>
        </thead>
        <tbody>
        <?php 
        
        $c->bill();
        ?>
            <!-- <tr data-expanded="true">
              <td>1</td>
              <td>Dennise</td>
              <td>Fuhrman</td>
              <td>High School History Teacher</td>
              
              <td>July 25th 1960</td>
            </tr>
          <tr>
            <td>2</td>
            <td>Elodia</td>
            <td>Weisz</td>
            <td>Wallpaperer Helper</td>
          
            <td>March 30th 1982</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Raeann</td>
            <td>Haner</td>
            <td>Internal Medicine Nurse Practitioner</td>
           
            <td>February 26th 1966</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Junie</td>
            <td>Landa</td>
            <td>Offbearer</td>
           
            <td>March 29th 1966</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Solomon</td>
            <td>Bittinger</td>
            <td>Roller Skater</td>
           
            <td>September 22nd 1964</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Bar</td>
            <td>Lewis</td>
            <td>Clown</td>
           
            <td>August 4th 1991</td>
          </tr>
          <tr>
            <td>7</td>
            <td>Usha</td>
            <td>Leak</td>
            <td>Ships Electronic Warfare Officer</td>
          
            <td>November 20th 1979</td>
          </tr>
          <tr>
            <td>8</td>
            <td>Lorriane</td>
            <td>Cooke</td>
            <td>Technical Services Librarian</td>
           
            <td>April 7th 1969</td>
          </tr> -->
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
</section>
