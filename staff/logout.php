<?php 
session_start();
require_once "../inc/dbconn.php";

    session_unset();
    session_destroy();
    header("Location:.././index.php"); 
    


?>