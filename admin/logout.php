<?php 
 require_once("../inc/dbconn.php");

if(isset($_SESSION['logged_user']))
{
    $_SESSION['logged_user']=null;
    unset($_SESSION['logged_user']); //either one is ok
}
header('Location:index.php');
?>