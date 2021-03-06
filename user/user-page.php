<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if(!isset($_SESSION['user_id'])){
    echo "<script>window.location.href ='../index.php'</script>";
    
  }?>
    <?php 
    $id = (int)$_SESSION['user_id'];
  $query="SELECT * FROM user WHERE id=:id ";
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $user = $stmt->fetch();
  
?> 
 
<!-- services haru ko lagi -->
<?php 
$query ="SELECT * from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$services=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!-- bookings ko lagi -->
<?php 
 $id = (int)$_SESSION['user_id'];
$query ="SELECT * from book where user_id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$booking=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
	
<div class="container">
<div class="tab">
  
      <button class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen">Search</button>
       <button class="tablinks" onclick="openCity(event, 'two')">Bookings</button>
       <button class="tablinks" onclick="openCity(event, 'three')">Edit Info</button>

        <!-- search ko lagi -->
      <div id="one" class="tabcontent">
  <h2>SEARCH </h2>
  <form class="form-group" action="search.php" method="POST">
  <input class="form-control mr-sm-3" type="text" name="postalcode" placeholder="Postal code" value="<?php echo $user['postalcode'];?>">
    <select name = "occupation"  class="form-control mr-sm-3" required>
    <option value = "">Select a service</option>
    <?php foreach ($services as $row){ ?>
            <option value = "<?php echo $row->services; ?>"> <?php echo $row->services;?></option>
            <?php }?>
            </select>
         &nbsp;  
      <button class="btn btn-primary btn-block" type="submit">Search</button>
      
    </form>
    
</div>
<!-- bookings haru dekhana lai -->
<div id="two" class="tabcontent">
<table class="table table-striped">
<tr>
<th scope="col">NAME</th>
<th scope="col">SERVICE</th>
<th scope="col">DATE</th>
<th scope="col">TIME</th>
<th scope="col">PROBLEM</th>
<th scope="col">RESPONSE</th>
<th scope="col">FEEDBACK</th>
<th scope="col">ACTION</th>
</tr>
<tr>
<?php foreach ($booking as $row){ ?>
<?php 
$id =(int) $row->staff_id;
$query ="SELECT * from staff where id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$staff=$stmt->fetch();

?>
            <td> <?php echo $staff['name']  ; if($row->bookings == 1) { echo"</br>";echo "(";echo  $staff['contact'];echo ")";};?></td>
            <td> <?php echo $staff['occupation'];?></td>
            <td> <?php echo $row->date;?></td>
            <td> <?php echo $row->time;?></td>
            <td> <?php echo $row->problem;?></td>
            <td> <?php if($row->bookings == 1 ){echo ("ACCEPTED");}
            elseif($row->bookings == 0 ){
              echo("DECLINED");
            }
            elseif($row->bookings == 3 ){
              echo("CANCELLED");
            }else{
              echo("NO REPLY YET");
              }?></td>
            <td>
            <?php if($row->bookings == 1){
                  if($row->rating !=0){echo ("Feedback given");}else{?>

          
              <form action="feedback.php" method="POST">

             <input type="hidden"  name="book_id" value="<?php echo($row->id);?>"></input>
             <input type="hidden"  name="staff_id" value="<?php echo $staff['id'];?>"></input>
             <input  type="submit" class="btn btn-primary btn-sm btn-secondary " name="submit" value="ADD FEEDBACK"></input> 
            
             </form>
            
          <?php }?>
          <?php }?>
            </td>
            <td><?php if($row->bookings ==2){?>
                <form action="cancel.php" method="POST">
                <input type="hidden"  name="id" value="<?php echo  ($row->id);?>"></input>
                <input type="hidden"  name="staff_id" value="<?php echo  $staff['id'];?>"></input>
                <input  type="submit" class="btn  btn-sm btn-danger" name="submit" value="Cancel"></input> 
               
                </form>
                &nbsp;
  <!-- Button to Open the Modal -->
  <input type="submit" class="btn  btn-sm btn-info" data-toggle="modal" value="Update" data-target="#myModal">
    
  </input>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="bookingUpdate.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $row->id;?>"></input>
      <input type="hidden"  name="staff_id" value="<?php echo  $staff['id'];?>"></input>
            <div class="form-group">
                <div class="form-label-group">
                <label for="date">Select Date</label>
                  <input type="date"  class="form-control"  name="date" value="<?php echo $row->date;?>">
                </div>
              </div>
             
              <div class="form-group">
                <div class="form-label-group">
                <label for="time">Select Time</label>
                  <input type="time"  class="form-control"  name="time" value="<?php echo $row->time;?>">
                </div>
              </div> 
              <div class="form-group">
                <div class="form-label-group">
                <label for="problem">Describe your Problem</label>
                  <textarea type="text"  class="form-control"  name="problem" value=""><?php echo $row->problem;?></textarea>
                </div>
              </div> 
                  <input type="submit" class="btn btn-success btn-block" name="submit" value="submit"></input>
            </form>
        </div>
        
        
       
      </div>
    </div>
  </div>
  
</div>

                </form>
          <?php  }; ?> </td>
        
            </tr>
            
              
           
            <?php }?>


</table>

</div>

<div id="three" class="tabcontent">
  <div class="div2">
  <form action="user-update.php" method="POST">
   <div class="form-group">
      <h2><label for="inputlg">Update Details</label></h2>
      <h7><label for="inputlg">Leave as it is to use existing detail</label></h7>
      <br>
      <label for="name">Name</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="name"  value="<?php echo $user['name'];?>" required>
    </div>
    <div class="form-group">
    <label for="contact">Contact</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="contact_number"  value="<?php echo $user['contact'];?>" required>
    </div>
    <div class="form-group">
    <label for="email">Email address</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="email" value="<?php echo $user['email'];?>"required >
    </div>
    <div class="form-group">
    <label for="Postal Code">Postal Code</label>
      <input class="form-control input-lg" id="inputlg" type="text"  name="postalcode"  value="<?php echo $user['postalcode'];?>" required>
    </div>
    <div class="form-group">
    <label for="address">Address</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="address"  value=<?php echo $user['address'];?> required>
    </div>
    <div class="form-group">
    <label for="password">Password</label>
      <input class="form-control input-lg" id="inputlg" type="password" name="password" placeholder="password">
    </div>
    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update" ></input> 
    </form> 
    
  </div>
</div>
</div> 


 <script>
function openCity(evt, cityName) {
var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

</script>

    <!-- user name ra image display gareko -->
       <div class="inside">
            

            <div class="card" style=" border-radius: 200px; background-color:skyblue;">
            <img class="card-img-top" src="../images/<?php echo($user['image']); ?>" alt="Card image cap" height="300px;" width="300px;">
            </div>
              <div class="name">
              <?php echo $user['name'];?>
            
        </div>
        </div>
      
</div>
