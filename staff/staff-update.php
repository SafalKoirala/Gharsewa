<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if(!isset($_SESSION['staff_id'])){
    echo "<script>window.location.href ='../index.php'</script>";
    
  }?>

<?php
//php code to update form data  to the database
   if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
              $id = (int)$_SESSION['staff_id'];
              $name = $_POST['name'];
              $contact = $_POST['contact_number'];
              $address = $_POST['address'];
              $postalcode = $_POST['postalcode'];
              $email = $_POST['email'];
              $pass = $_POST['password'];
              $password =md5($pass);
              $query = "UPDATE staff SET  name=:name,contact=:contact, address=:address, postalcode=:postalcode, email=:email, password=:password  WHERE id=:id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':id',$id);
                $stmt->bindParam(':name',$name);
                $stmt->bindParam(':contact',$contact);
                $stmt->bindParam(':address',$address);
                $stmt->bindParam(':email',$email);
                $stmt->bindParam(':postalcode',$postalcode);
                $stmt->bindParam(':password',$password);
               
                $stmt->execute();
                

              }   
              echo "<script>alert('Updated Successfully')</script>";            
              echo "<script>window.location.href ='staff-page.php'</script>";            
?>