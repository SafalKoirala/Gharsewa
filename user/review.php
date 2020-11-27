<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id =$_POST['book_id'];
    $rating =$_POST['rate'];
    $review =$_POST['review'];
    $query = "UPDATE book SET  rating=:rating,review=:review  WHERE id=:id";
    $stmt = $pdo -> prepare($query);
    $stmt->bindParam(':rating',$rating);
    $stmt->bindParam(':review',$review);
    $stmt->bindParam(':id',$id);
  
    $stmt->execute();
    echo "<script>alert('Thank You for your review')</script>"; 
    echo "<script>window.location.href ='user-page.php'</script>"; 
    
}





?>