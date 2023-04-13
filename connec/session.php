<?php 
session_start();  
if (!isset($_SESSION['id'])) 
    { if (isset($_COOKIE['id']) && isset($_COOKIE['tb4'])) 
        { 
            $_SESSION['id'] = $_COOKIE['id']; $_SESSION['tb4'] = $_COOKIE['tb4']; 
        }else{
            echo 'Session Expired'; 
        //     $updategoto= "http://20.204.52.238/utilityv10915/loginnew.php"; 
        //  header(sprintf("Location: %s" ,$updategoto)); 
         $sesdiv="
         <div style='position:fixed;top:0%;left:0%;width:100%;height:100%;
         background-color:rgb(0,58,140);color:#FFF;'>
         <div style='position:relative;top:20%;left:0%;font-size:20pt;text-align:center;'>
                  <a href='../loginnew.php' target='_blank'><button style='font-size:22pt;'>Relogin</button></a>
				  <div><h3>You have kept MaINStream unattended too long!!</h3></div>
                  <div><h3>Your session is terminated due to security reasons.</h3></div>
                    <h4>Step 1: Relogin.</h4>
                    <h4>Step 2: Click 'Back' in browser.<br/> (If any back button isn't avaliable, please close the tab.)</h4>
                    <h4>Step 3: Repeat your operation.</h4>
         </div>
         </div>
         ";
         echo $sesdiv;
           exit(); 
        }
    }  

$emailfrom = 'mainstream0915@gmail.com';
?>