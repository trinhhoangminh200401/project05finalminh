<?php 
          include("action.php");
          $c=new action();
          $c->xoasp();
          
        ?>
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">

    <a class="nut h3" onclick="clickadd()"><i class="fa fa-plus"></i> Thêm Sản Phẩm</a>
<br> <br>
    
    <style>
    .nut{
      cursor: pointer;
    color:black;
    padding: 2px;
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
top: -2%;
  }
  
  #AAAA{
display: none;
padding: 40px;
width: 45%;
left: 17%;
font-size:20px ;
position:relative;
transform: scale(0.4);
background-color: white;
  }
  #rmove{
    position: absolute;
    right: 0;
    top: 0%;
    font-size: 20px;
    background-color: whitesmoke;
    border: 0 solid gray;
    
  }
  
    </style>
  <div class="container"> 
     <form id="AAAA" method="POST">
    <button id="rmove">X</button>
  <div class="form-group">
    <label for="exampleInputEmail1">ID_Product</label>
    <input type="text" class="form-control" id="idps" disabled="false" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID_type</label>
    <select type="" class="form-control" id="idtype" aria-describedby="emailHelp" name="Choose Id">
    <option value="BED">BED</option>
    <option value="SF">SF</option>
    <option value="CT">CT</option>
    <option value="CF">CF</option>
    <option value="DT">DT</option>
    <option value="SH">SH</option>
  </select>    
  </div>
  
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control"  id="name" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Selling_price</label>
    <input type="text" class="form-control" id="selling" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
      <input type="number" id="quantity" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="date" class="form-control" id="date" aria-describedby="emailHelp" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Images:</label>
    <input type="file" class="form-control" id="image" aria-describedby="emailHelp" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Overview</label>
    <input type="text" class="form-control" id="over" placeholder="Password">
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
  $.post("./ajax.php",{id:id,action:"xemsp"},function(rs){
    rs.forEach(item=>{
      $("#idps").val(item.ID_Product);
      $("#name").val(item.Name);
      $("#selling").val(item.Selling_price);
      $("#quantity").val(item.Quantity);
      $("#date").val(item.Date);
      $("#over").val(item.OverView);
      $("#idtype").val(item.ID_type);
     $("#btnsua").html("<button a onclick='SUA(`"+id+"`)'>Sua</button>");
    });
  });
}

function SUA(id){
  let name=$("#name").val();
  let selling=$("#selling").val();
  let quantity=$("#quantity").val();
  let date=$("#date").val();
  let image=$("#image").val();
  let over=$("#over").val();
  let idtype=$("#idtype").val();
  image.
  $.post("./ajax.php",{id:id,sell:selling,name:name,quantity:quantity,over:over,date:date,idtype:idtype,image:image,action:"suasp"},function(rs){
    if(rs==1){
      alert("Sửa thành công");
    
      window.location.reload();
    }
    else{
      alert("Sửa thất bại");
    }

  });

}
function add(){
  let name=$("#name").val();
  let selling=$("#selling").val();
  let quantity=$("#quantity").val();
  let date=$("#date").val();
  let image=$("#image").val();
  var check= document.getElementById("image").value;
  var check1=check.replace("C:fakepath","");
  let over=$("#over").val();
  let idtype=$("#idtype").val();
  $.post("./ajax.php",{sell:selling,name:name,quantity:quantity,over:over,date:date,idtype:idtype,image:check1,action:"themsp"},function(rs){
    if(rs==1){
      alert("Thêm sản phẩm thành công!");   
      window.location.reload();
    }
    if (rs==0){
      alert("Thêm sản phẩm thất bại!");
    }
    if (rs==2){
      alert("Cập nhật sản phẩm thành công");
    }
    if (rs==3){
      alert("Cập nhật sản phẩm thất bại");
    }
    if (rs==5){
      alert("Thể loại, tên sản phẩm và số lượng là những trường bắt buộc!");
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

function xacnhan(){
  var check=confirm('Bạn có chắc chắn muốn xoá sản phẩm này không?');
  return check;
}

   </script>
 <div class="panel panel-default">
    <div class="panel-heading">
     Quan ly sp
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
            <th>ID_Product</th>
            <th>Image</th>
            <th>ID_type</th>
            <th>Name</th>
            <th>Selling_price</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Action</th>
            <!-- <th data-breakpoints="xs">Job Title</th>
           
            <th data-breakpoints="xs sm md" data-title="DOB">Date of Birth</th> -->
          </tr>
        </thead>
        <tbody>
        <?php 
        
        $c->product();
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
