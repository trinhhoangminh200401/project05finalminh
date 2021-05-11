<?php
    include("action.php");
    if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "login":{
                $a=new action();
                echo $a->dangnhap($_POST["tk"],$_POST["mk"]);
                break;
            }
            case "register":{
                $b=new action();
                echo $b->dangki($_POST["username"],$_POST["fullname"],$_POST["email"], $_POST["address"],$_POST["phone"],$_POST["pass"],$_POST["repass"]);
                break;
            }
            case "xoasp":{            
            unset($_SESSION["giohang"][$_GET['id']]);          
            $bien=$_GET['id'];
            echo "Xoá Thành Công!";
            break;
            }
        }
    }
?>
