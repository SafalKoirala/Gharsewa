<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>

 
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              $id = (int)$_SESSION['user_id'];
              
              $name = $_POST['name'];
              $contact = $_POST['contact_number'];
              $address = $_POST['address'];
              $postalcode = $_POST['postalcode'];
              $email = $_POST['email'];
              $pass = $_POST['password'];
              $password =md5($pass);
              
              if($name==""){
                      $query = "UPDATE user SET  contact=:contact, address=:address, postalcode=:postalcode, email=:email, password=:password  WHERE id=:id";
              }
              
              elseif($contact==""){
                      $query = "UPDATE user SET  name=:name, address=:address, postalcode=:postalcode, email=:email, password=:password  WHERE id=:id";
              }
              elseif($address==""){
                      $query = "UPDATE user SET  name=:name, contact=:contact, postalcode=:postalcode, email=:email, password=:password  WHERE id=:id";
              }
              elseif($postalcode==""){
                      $query = "UPDATE user SET  name=:name, contact=:contact, address=:address, email=:email, password=:password  WHERE id=:id";
              }
              elseif($email==""){
                      $query = "UPDATE user SET  name=:name, contact=:contact, address=:address, postalcode=:postalcode, password=:password  WHERE id=:id";
              }
              elseif($pass==""){
                      $query = "UPDATE user SET  name=:name, contact=:contact, address=:address, postalcode=:postalcode ,email=:email WHERE id=:id";
              }
              else{
                      $query = "UPDATE user SET  name=:name, contact=:contact, address=:address, postalcode=:postalcode ,email=:email, password=:password WHERE id=:id";
              }
              
 
              
                
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id',$id);
              
               
                
                

                if($name != "")
                {
                    $stmt->bindParam(':name',$name);
                }
                if($contact != "")
                {
                    $stmt->bindParam(':contact',$contact);
                }
              
                if($address != "")
                {
                    $stmt->bindParam(':address',$address);
                }
                if($email != "")
                {
                    $stmt->bindParam(':email',$email);
                }
                if($postalcode != "")
                {
                    $stmt->bindParam(':postalcode',$postalcode);
                }
                
                 if($password != "")
                {
                    $stmt->bindParam(':password',$password);
                }

                $stmt->execute();
                

              }   
              echo "<script>alert('Updated Successfully')</script>";            
             echo "<script>window.location.href ='user-page.php'</script>";            
?>