<?php

require('db_connect.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require('header.php')?>
<br><br>
<center><h4 class="m-0 font-weight-bold text-primary">Notes Details</h4></center>
<body>

        

                
				<hr>
			
        <?php

$query = $conn->query("SELECT * FROM notesclass");
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
			        <h5 class="modal-title" id="exampleModalLabel">New Notes Entry</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     
                     <div class="card-body">
						        	<form action="" method="post" enctype="multipart/form-data">
							
                        <div class="form-group">
                            <label>Class</label>
                            <input type="text" name="class"  class="form-control" placeholder="Enter Class">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject_name" class="form-control" placeholder="Enter Subject">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="content" class="form-control"placeholder="Enter description about notes.">
                        </div>
                        

								<div class="form-group">
									<label>Upload notes file</label>
								<input type="file" name="img1" class="form-control">
								</div>
								<div class="modal-footer">
			       
			        <button type="submit" class="btn btn-primary" name = "submit" >Add Notes</button>
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Notes Details</button>
			
				<div >	
        </div>
<br>
  <table class="table ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Content</th>
        <th>Notes File</th>
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
         // $imageURL = 'img/'.$row["upload"];
                 ?>
                      <tr>
                          <td><?php  echo $row['id']; ?></td>
                          <td><?php  echo $row['class']; ?></td>
                          <td><?php  echo $row['subject_name']; ?></td>
                          <td><?php  echo $row['content']; ?></td>
                          <td><?php  echo $row['upload']; ?></td>
                         
                          <td>
                              <form action="notes_edit.php" method="post">
                                  <input type="hidden" name="notes_edit_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="notes_edit_btn" class="btn btn-success"> EDIT</button>
                              </form>
                          </td>
                          <td>
                              <form action="code.php" method="post">
                                  <input type="hidden" name="notes_delete_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="notes_delete_btn" class="btn btn-success"> Delete</button>
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
	
	$location="../course_site/upload/";
 
  $class=$_POST['class'];
  $subject_name=$_POST['subject_name'];
  $content=$_POST['content'];


	$file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];



	$query="insert into notesclass (class,subject_name,content,upload) values('$class' , '$subject_name','$content' , '".$file1."')";
	$fire=mysqli_query($conn,$query);
	if($fire)
	{
		move_uploaded_file($file_tmp1, $location.$file1);
		
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