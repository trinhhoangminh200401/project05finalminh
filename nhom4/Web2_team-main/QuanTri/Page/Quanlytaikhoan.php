<?php 
          include("action.php");
          $c=new action();
          $c->xoaaccount();
          
        ?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">


    
    <style>
    .nut{
      cursor: pointer;
    color:black;
    padding: 10px;
    transition:1s;
    border-radius: 100px;
    margin:  10px;
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
  
    </style>
  <div class="container"> 
     <form id="AAAA" method="POST">
    <button id="rmove">X</button>
  <div class="form-group">
    <label for="exampleInputEmail1">ID_Account</label>
    <input type="text" class="form-control" id="idacc" disabled="false" aria-describedby="emailHelp">
    
  </div>
  
  <div class="form-group">
    <label for="name">UserName</label>
    <input type="text" class="form-control"  id="name"  disabled="false" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" id="phone"  disabled="false" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" class="form-control" id="address"  disabled="false" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="email"  disabled="false" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select type="" class="form-control" id="status" aria-describedby="emailHelp" >
    <option value="active">Active</option>
    <option value="freeze">Freeze</option>  
  </select>
  </div>
  
  <div id="btnsua"></div>
</form> </div>

<script>
let s=  document.getElementById("idps").value
s.document
    function clickadd(){
      document.getElementById("AAAA").style.display='block';
  
     $("#btnsua").html("<button a onclick='add()'>Thêm</button>");
}
  
function rmove(){
  document.getElementById("AAAA").style.display='none'
}
  
function clickfix(id){
  document.getElementById("AAAA").style.display='block';
  $.post("./ajax.php",{id:id,action:"xemaccount"},function(rs){
    rs.forEach(item=>{
      $("#idacc").val(item.ID_Account);
      $("#name").val(item.Name);
      $("#phone").val(item.Phone);
      $("#address").val(item.Address);
      $("#email").val(item.Email);
      $("#status").val(item.Status);
     $("#btnsua").html("<button a onclick='SUA(`"+id+"`)'>Sua</button>");
    });
  });
}
function SUA(id){

  let status=$("#status").val();

  $.post("./ajax.php",{id:id,status:status,action:"suaacc"},function(rs){
    if (rs==1){
      alert("Sửa trạng thái thành công");
    }
    else{
      alert("Sửa trạng thái thất bại");
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
     Quản Lý Tài Khoản
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
            <th>ID_Account</th>
            <th>UserName</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
 
          </tr>
        </thead>
        <tbody>
        <?php 
        
        $c->account();
        ?>
           
          
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>
</section>
