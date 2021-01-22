<?php 


    $host ="localhost";
    $db="gharsewa";
    $user="root";
    $pass="";
    $dsn="mysql:host=$host;dbname=$db";
    $pdo =new PDO($dsn,$user,$pass);  
  


 if(($_POST["email"]))
  {
$email=$_POST["email"];
 $sql= "select email from staff where email=:email";
 $query=$pdo->prepare($sql);
 $query->bindParam(':email',$email);
 $query->execute();
 if($query->rowCount()>0){
    echo"<span class='text-danger'>
    Email already Registered
    </span>";
   echo" <script> $('#register').prop('disabled',true);</script>";
 }


  }

?>