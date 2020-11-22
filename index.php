 <?php
  session_start();
if(isset($_SESSION['staff_id'])){
  echo "<script>window.location.href ='staff/staff-page.php'</script>";
}
if(isset($_SESSION['user_id'])){
  echo "<script>window.location.href ='user/user-page.php'</script>";
}
?> 

<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>
<?php require_once"./inc/dbconn.php"?>

<?php 
$query ="SELECT * from services ";
$stmt = $pdo -> prepare($query);
$stmt->execute();
$services=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
<div class ="search-bar">
    <form class="form-inline my-2 my-lg-0" action="search.php" method="POST">
    <input class="form-control mr-sm-3" type="text" name="postalcode" placeholder="Postal code">
    <select name = "occupation"  class="form-control mr-sm-3" required>
    <option value = "">Select a service</option>
    <?php foreach ($services as $row){ ?>
            <option value = "<?php echo $row->services; ?>"> <?php echo $row->services;?></option>
            <?php }?>
            </select>
         &nbsp;  
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<div class="container">
     <h2 class="headings" style="padding-left:38%;">How it works</h2> 
    <div class="card-deck">
        <div class="card">
          <div class="card-body text-center">
            <p class="card-text">Find professional for help,</p>
            <p class="card-text"> for free</p>
            <p class="card-text"> at GharSewa</p>
            
            
          </div>
        </div>
        <div class="card" ">
          <div class="card-body text-center">
            <p class="card-text">Choose a Service</p>
            <p class="card-text">Book a Proffesional</p>
            <p class="card-text">Pick date and time</p>
            
          </div>
        </div>
        <div class="card">
          <div class="card-body text-center">
            <p class="card-text">Pay locally</p>
            
          </div>
        </div>
    </div>
</div>


<?php include('inc\foot.php')?>