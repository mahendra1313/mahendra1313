<?php

require('db_connect.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require('header.php')?>
<br><br>
<center><h4 class="m-0 font-weight-bold text-primary">View Banners Details</h4></center>
<body>

        

                
				<hr>
			
        <?php

$query = $conn->query("SELECT * FROM tbl_banner");
//$query_run = mysqli_query($conn, $query);
?>
<div>	


<div class="container">
		<div class="row">
			<div >
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New Gallery</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     
                     <div class="card-body">
						        	<form action="" method="post" enctype="multipart/form-data">
							
                        <div class="form-group">
                            <label>School Name</label>
                            <input type="text" name="name"  class="form-control" placeholder="Enter School Name">
                        </div>
                        <div class="form-group">
                            <label>School Number</label>
                            <input type="text" name="number" class="form-control" placeholder="Enter School Number details">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control"placeholder="Enter Address">
                        </div>
                        

								<div class="form-group">
									<label>Upload Logo</label>
								<input type="file" name="img1" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Banner1</label>
								<input type="file" name="img2" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Banner2</label>
								<input type="file" name="img3" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Banner3</label>
								<input type="file" name="img4" class="form-control">
								</div>
							  <div class="modal-footer">
			       
			        <button type="submit" class="btn btn-primary" name = "submit" >Add Header Details </button>
			      </div>
							</form>
						</div>
				  </form>
			    </div>
			  </div>
			</div>
		</div>	
		
</div>


<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Header Details</button>
			
				<div >	
        </div>
<br>
  <table class="table ">
    <thead>
      <tr>
        <th>ID</th>
        <th>School Name</th>
        <th>School Number</th>
        <th>School ADDRESS</th>
        <th>LOGO</th>
      <th>BANNER1</th>
      <th>BANNER2</th>
      <th>BANNER3</th>
        <th> Edit</th>
        <th> Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php
                  if($query->num_rows > 0)        
                  {
                      while($row = $query->fetch_assoc())
                      {
          $imageURL4 = 'img/'.$row["logo"];
          $imageURL1 = 'img/'.$row["banner1"];
          $imageURL2 = 'img/'.$row["banner2"];
          $imageURL3 = 'img/'.$row["banner3"];
                  ?>
                      <tr>
                          <td><?php  echo $row['id']; ?></td>
                          <td><?php  echo $row['school_name']; ?></td>
                          <td><?php  echo $row['schoolno']; ?></td>
                          <td><?php  echo $row['address']; ?></td>
                          <td><img src="<?php echo $imageURL4; ?>" alt ="" width="50px"/></td>
                          
                          <td><img src="<?php echo $imageURL1; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL2; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL3; ?>" alt ="" width="50px"/></td>

                          <td>
                              <form action="view_banner_edit.php" method="post">
                                  <input type="hidden" name="view_banner_edit_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="view_banner_edit_btn" class="btn btn-success"> EDIT</button>
                              </form>
                          </td>
                          <td>
                              <form action="code.php" method="post">
                                  <input type="hidden" name="view_banner_delete_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="view_banner_delete_btn" class="btn btn-success"> Delete</button>
                              </form>
                          </td>
                      </tr>
                  <?php
                      } 
                  }
                  else {
                      echo "No Record Found";
                  }
                  ?>

       </tr>
  </table>
</div>
</div>

			</div>
			
		</div>
		</div>
	</div>

</div>




<?php 
if(isset($_POST['submit']))
{
	include 'db_connect.php';
	
	$location="img/";
 
  $name=$_POST['name'];
  $school_no=$_POST['number'];
  $address=$_POST['address'];

	$file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];
	$file2=$_FILES['img2']['name'];
	$file_tmp2=$_FILES['img2']['tmp_name'];
	$file3=$_FILES['img3']['name'];
	$file_tmp3=$_FILES['img3']['tmp_name'];
	$file4=$_FILES['img4']['name'];
	$file_tmp4=$_FILES['img4']['tmp_name'];


//	$data=[];
	//$data=[$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8];
	//$images=implode(' ',$data);


	$query="insert into tbl_banner (school_name,banner1,banner2,banner3,schoolno,logo,address) values('$name' , '".$file2."','".$file3."', '".$file4."', '$school_no', '".$file1."', '$address')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
		move_uploaded_file($file_tmp3, $location.$file3);
		move_uploaded_file($file_tmp4, $location.$file4);

		echo "success";
	}
	else
	{
		echo "failed";
	}
}

?>

<?php require('scriptsAdmin.php')?>
</body>
</html>