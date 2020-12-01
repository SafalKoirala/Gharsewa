<?php session_start();?>
<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"../inc/dbconn.php"?>
<?php
if(!isset($_SESSION['staff_id'])){
    echo "<script>window.location.href ='../index.php'</script>";
    
  }?>
    <?php 
    $id = (int)$_SESSION['staff_id'];
  $query="SELECT * FROM staff WHERE id=:id ";
  
  $stmt=$pdo->prepare($query); 
  $stmt->bindParam(':id',$id);
  $stmt->execute();
  $staff = $stmt->fetch();
  
?> 
<!-- bookings ko lagi -->
<?php 
 $id = (int)$_SESSION['staff_id'];
$query ="SELECT * from book where staff_id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$booking=$stmt->fetchAll(PDO::FETCH_OBJ);

?>
	

<div class="container">
<div class="tab">
  
      <button class="tablinks" onclick="openCity(event, 'one')" id="defaultOpen">Requests</button>
       <button class="tablinks" onclick="openCity(event, 'two')">Bookings</button>
       <button class="tablinks" onclick="openCity(event, 'three')">Edit Info</button>
       

        
      <div id="one" class="tabcontent">
  <h2>Requests</h2>
  <table class="table table-striped">
<tr>
<th scope="col">NAME</th>
<th scope="col">ADDRESS</th>
<th scope="col">DATE</th>
<th scope="col">TIME</th>
<th scope="col">PROBLEM</th>
<th scope="col">RESPONSE</th>
</tr>
<tr>

<?php foreach ($booking as $row){ ?>
<?php 
$id =(int) $row->user_id;
$query ="SELECT * from user where id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$user=$stmt->fetch();

?>
  <?php if($row->flag == 0){?>
            <td> <?php echo $user['name'];?></td>
            <td> <?php echo $user['address'];?></td>
            <td> <?php echo $row->date;?></td>
            <td> <?php echo $row->time;?></td>
            <td> <?php echo $row->problem;?></td>
            <td>
            <div class="btn-group mr-2" role="group" aria-label="First group">
             <form action="accept.php" method="POST">
             <input type="hidden"  name="user_id" value="<?php echo $user['id'];?>"></input>
             <input  type="submit" class="btn btn-primary btn-sm btn-secondary " name="submit" value="Accept"></input> 
            
             </form>
             &nbsp;
             <form action="decline.php" method="POST">
             <input type="hidden"  name="user_id" value="<?php echo $user['id'];?>"></input>
             <input  type="submit" class="btn btn-primary btn-sm btn-secondary" name="submit" value="Decline"></input> 
            
             </form>
           </div>
            </td>
             
            </tr>
            <?php }?>
            <?php }?>


</table>
</div>
<!-- bookings haru dekhana lai -->
<div id="two" class="tabcontent">
<table class="table table-striped">
<tr>
<th scope="col">NAME</th>
<th scope="col">ADDRESS</th>
<th scope="col">DATE</th>
<th scope="col">TIME</th>
<th scope="col">PROBLEM</th>
</tr>
<tr>
<?php foreach ($booking as $row){ ?>
<?php 
$id =(int) $row->user_id;
$query ="SELECT * from user where id=:id ";
$stmt = $pdo -> prepare($query);
$stmt->bindParam(':id',$id);
$stmt->execute();
$user=$stmt->fetch();

?>     <?php if($row->bookings == 1){?>
            <td> <?php echo $user['name'];?></td>
            <td> <?php echo $user['address'];?></td>
            <td> <?php echo $row->date;?></td>
            <td> <?php echo $row->time;?></td>
            <td> <?php echo $row->problem;?></td>  
            </tr>
            <?php }?>
            <?php }?>


</table>
</div>

<div id="three" class="tabcontent">
  <div class="div2">
  <form action="staff-update.php" method="POST">
   <div class="form-group">
      <h2><label for="inputlg">Update Details</label></h2>
      <h7><label for="inputlg">Leave blank to use existing detail</label></h7>
      <br>
      <label for="name">Name</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="name"  value="<?php echo $staff['name'];?>">
    </div>
    <div class="form-group">
    <label for="contact">Contact</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="contact_number"  value="<?php echo $staff['contact'];?>">
    </div>
    <div class="form-group">
    <label for="email">Email address</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="email" value="<?php echo $staff['email'];?>" >
    </div>
    <div class="form-group">
    <label for="Postal Code">Postal Code</label>
      <input class="form-control input-lg" id="inputlg" type="text"  name="postalcode"  value="<?php echo $staff['postalcode'];?>">
    </div>
    <div class="form-group">
    <label for="address">Address</label>
      <input class="form-control input-lg" id="inputlg" type="text" name="address"  value=<?php echo $staff['address'];?>>
    </div>
    <div class="form-group">
    <label for="password">Password</label>
      <input class="form-control input-lg" id="inputlg" type="password" name="password" placeholder="">
    </div>
    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update"></input> 
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
            <img class="card-img-top" src="../images/<?php echo($staff['image']); ?>" alt="Card image cap" height="300px;" width="300px;">
            </div>
              <div class="name">
              <?php echo $staff['name'];?>
        </div>
        
        </div>
        <div class="view" style="margin-left: 110px;">
      <p href="#" class="btn btn-primary btn-block"><?php echo $staff['occupation'];?></p>
      
  
      </div>
</div>