<?php

require('db_connect.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require('header.php')?>
<br><br>
<center><h4 class="m-0 font-weight-bold text-primary">View Gallery Details</h4></center>
<body>

        

                
				<hr>
			
        <?php

$query = $conn->query("SELECT * FROM tbl_gallery");
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
									<label>Upload Image 1</label>
								<input type="file" name="img1" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 2</label>
								<input type="file" name="img2" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 3</label>
								<input type="file" name="img3" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 4</label>
								<input type="file" name="img4" class="form-control">
								</div>
							
                <div class="form-group">
									<label>Upload Image 5</label>
								<input type="file" name="img5" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 6</label>
								<input type="file" name="img6" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 7</label>
								<input type="file" name="img7" class="form-control">
								</div>
								<div class="form-group">
									<label>Upload Image 8</label>
								<input type="file" name="img8" class="form-control">
								</div>
							  <div class="modal-footer">
			       
			        <button type="submit" class="btn btn-primary" name = "submit" >Add Gallery </button>
			      </div>
							</form>
						</div>
				  </form>
			    </div>
			  </div>
			</div>
		</div>	
		<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="Employee">delete Employee</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		        <form action="">
		          <div class="form-group">
				     <input type="hidden" class="form-control" id="delete_id">
		          </div>
                <center>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-info">delete Employee </button>
		        </center>
		        <br>
		        <hr>
		        </form>
		      
		    </div>
    </div>
</div>


<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Gallery</button>
			
				<div >	
        </div>
  <table class="table ">
    <thead>
      <tr>
        <th>ID</th>
        <th>TOTAL STUDENTS</th>
        <th>TOTAL TEACHER</th>
        <th>LAB</th>
        <th>LIBRARY</th>
      <th>GROUND</th>
      <th>GARDEN</th>
      <th>PICTURE1</th>
      <th>PICTURE2</th>
      <th> DELETE</th>
       </tr>
    </thead>
    <tbody>
      <tr>
      <?php
                  if($query->num_rows > 0)        
                  {
                      while($row = $query->fetch_assoc())
                      {
          $imageURL1 = 'img/'.$row["total_students_pic"];
          $imageURL2 = 'img/'.$row["total_teacher_pic"];
          $imageURL3 = 'img/'.$row["total_lab_pic"];
          $imageURL4 = 'img/'.$row["total_library_pic"];
          $imageURL5 = 'img/'.$row["total_ground_pic"];
          $imageURL6 = 'img/'.$row["total_garden_pic"];
          $imageURL7 = 'img/'.$row["pic1"];
          $imageURL8 = 'img/'.$row["pic2"];
                  ?>
                      <tr>
                          <td><?php  echo $row['id']; ?></td>
                          <td><img src="<?php echo $imageURL1; ?>" alt ="" width="50px"/></td>                          
                          <td><img src="<?php echo $imageURL2; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL3; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL4; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL5; ?>" alt ="" width="50px"/></td>                          
                          <td><img src="<?php echo $imageURL6; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL7; ?>" alt ="" width="50px"/></td>
                          <td><img src="<?php echo $imageURL8; ?>" alt ="" width="50px"/></td>

                          <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="gallery_delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="gallery_delete_btn" class="btn btn-danger"> DELETE</button>
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
	$file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];
	$file2=$_FILES['img2']['name'];
	$file_tmp2=$_FILES['img2']['tmp_name'];
	$file3=$_FILES['img3']['name'];
	$file_tmp3=$_FILES['img3']['tmp_name'];
	$file4=$_FILES['img4']['name'];
	$file_tmp4=$_FILES['img4']['tmp_name'];


	$file5=$_FILES['img5']['name'];
	$file_tmp5=$_FILES['img5']['tmp_name'];
	$file6=$_FILES['img6']['name'];
	$file_tmp6=$_FILES['img6']['tmp_name'];
	$file7=$_FILES['img7']['name'];
	$file_tmp7=$_FILES['img7']['tmp_name'];
	$file8=$_FILES['img8']['name'];
	$file_tmp8=$_FILES['img8']['tmp_name'];

//	$data=[];
	//$data=[$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8];
	//$images=implode(' ',$data);


	$query="insert into tbl_gallery (total_students_pic,total_teacher_pic,total_lab_pic,  total_library_pic,total_ground_pic,total_garden_pic,pic1, pic2) values('".$file1."', '".$file2."','".$file3."', '".$file4."','".$file5."', '".$file6."','".$file7."', '".$file8."')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		move_uploaded_file($file_tmp2, $location.$file2);
		move_uploaded_file($file_tmp3, $location.$file3);
		move_uploaded_file($file_tmp4, $location.$file4);

    move_uploaded_file($file_tmp5, $location.$file5);
		move_uploaded_file($file_tmp6, $location.$file6);
		move_uploaded_file($file_tmp7, $location.$file7);
		move_uploaded_file($file_tmp8, $location.$file8);
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