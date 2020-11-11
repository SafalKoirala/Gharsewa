<?php include('inc\head.php')?>
<?php include('inc\nav.php')?>

<!-- total services:<br>
total staffs:<br>
total users:<br>
<br>
///////////////////////////////////////////////////////<br>
user reviews ra staff reviews haru
ya batw select garda indx page ko reviews update huney
///////////////////////////////////////////////////////<br>
euta form<br>
<br>
admin details:<br>
name:<br>
email: dynamically footer ma  update hena milne  email <br>
contact:dynamically footer ma  update hena milne  contact<br>
registration date:database batw timestamp rakhdiney 
///////////////////////////////////////////////////////<br>
-->
<div class="row">
  <div class="col-sm-3"  style="background-color:blue;">
    <h2>Users</h2><br>
    <h3>22</h3>
    
  </div>
  <div class="col-sm-3"  style="background-color:orange;">
    <h2>Staffs</h2><br>
    <h3>44</h3>
  </div>
  <div class="col-sm-3"  style="background-color:blue;">
     
     <h2>Total Services</h2><br>
    <h3>10</h3> 
  </div>
</div>

<div class="container">
<div class="card  mx-auto mt-3">
        <div class="card-header">Update your about us content</div>
        
        <div class="card-body ">
 

     <div class="form-group">
         <label for="vat" class=" form-control-label"> Add Description</label>
         <textarea type="text" name="pagedes" id="pagedes" required="true"class="form-control"></textarea></div>
                       
                     </div>
                    
                     <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                             <i class="fa fa-dot-circle-o"></i> Update
                         </button></p>
                      
                 </div>
                 </form>
</div>
          
        </div>
      </div>
</div>
<div class="container">
<div class="card  mx-auto mt-3">
        <div class="card-header">Reviews</div>
        <div class="card-body"> 
          Choose which reviews you want others to see
          <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>     
                  <th>Review </th>
                  <th>Action</th>
                
                </tr>
                </thead>
                  <!-- php  
//                   $sql="SELECT * from tbl"; //table name
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// $cnt=1;
// if($query->rowCount() > 0)
// {
// foreach($results as $row)
// {               ?>
                
//                 <tr>
//                   <td><php echo htmlentities($cnt);?></td>
//                   <td><php  echo htmlentities($row->Category);?>
//                   </td>
//                   <td><php  echo htmlentities($row->CreationDate);?></td>
//                   <td> < href="edit-category-detail.php?editid=<php echo htmlentities ($row->ID);?>">ADD</td> //ya add button hunu parxa
                  
//                 </tr>
                              
                php $cnt=$cnt+1;}} ?>  -->
              </table>
        </div>
      </div>
</div>




