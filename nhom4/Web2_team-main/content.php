<?php

    if(isset($_GET["action"])){
        switch($_GET["action"]){
            case "login":{
                include("./page/login.php");
                break;
            }
            case "sofa":{
                include("./page/sofa.php");
                break;
            }
            case "dinnertable":{
                include("./page/dinnertable.php");
                break;
            }
            case "shelf":{
                include("./page/shelf.php");
                break;
            }
            case "coffee":{
                include("./page/coffee.php");
                break;
            }
            
            case "bed":{
                include("./page/bed.php");
                break;
            }
     
            
            case "register":{
                include("./page/register.php");
                break;
            }
            case "contact":{
                include("./page/contact.php");
                break;
            }
            case "about":{
                include("./page/about.php");
                break;
            }
            case "logout":{
                unset($_SESSION["Username"]);
                unset($_SESSION["ID_User"]);
                echo "<script>window.location.href='../index.php';</script>";
                break;
            }
            case "search":{
                include("./page/search.php");
                break;
            }
            case "userbill":{
                include("./page/userbill.php");
                break;
            }
            case "";
            {
                include("./page/homepage.php");
                break;
            }
            case "empty_cart":{
                unset($_SESSION["giohang"]);
                echo "<script>window.location.href='../index.php';</script>";
                break;
            }

            // default:{
            //     include("error.php");
            //     break;
            // }
        }
     }
     else {
        include("./page/homepage.php");
    }

?>