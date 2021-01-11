<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $book_id =$_POST['book_id'];
    $id =(int)$_POST['staff_id'] ;
    $query="SELECT * FROM staff WHERE id=:id ";
    $stmt=$pdo->prepare($query); 
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $staff = $stmt->fetch();  
}





?>
<!-- rating and reviewing a worker -->
<div class="container"> 

    
    <h3>Your review on the service</h3>
    
    <div class="row mt-4">
    <br>
    <div class="col-md-4">
      <div class="card" style="width:300px">
        <div class="card-body ">
        <h4 class="card-title"> <?php echo $staff['name'];?></h4>
           <h4 class="card-title"> <?php echo $staff['occupation'];?></h4>  
             
           <h4 class="card-title">average rating</h4>  
          
          
        </div>
      </div>
      <br>
  </div>
    <div class="col-md-4">
        <form  style="width:700px" action="review.php" method="POST">
         <fieldset>
          <div class="card-body ">
            <p>Give a rating out of 5 and write a review on the service you recieved</p> 
          <div class="rate">
            <input type="radio" id="star1" name="rate" value="5"/>
            <label for="star1" >5 stars</label>
            <input type="radio" id="star2" name="rate" value="4" />
            <label for="star2" >4 stars</label>
            <input type="radio" id="star3" name="rate" value="3"/>
            <label for="star3" >3 stars</label>
            <input type="radio" id="star4" name="rate" value="2" />
            <label for="star4" >2 stars</label>
            <input type="radio" id="star5" name="rate" value="1"  />
            <label for="star5" >1 star</label>
         </div>
            <br>
            <br>
            <input type="hidden"  name="book_id" value="<?php echo($book_id);?>"></input>
            
            <textarea name="review" id="" cols="80" rows="10" placeholder="Review.." ></textarea><br>
            <button type="submit"  class="btn btn-primary " name="submit" value="submit">SUBMIT</button>
           
          </div>
          </fieldset>
        </form>
        
    </div>

    </div>
  </div>