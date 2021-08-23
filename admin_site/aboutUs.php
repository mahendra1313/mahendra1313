<?php

require('db_connect.php');?>

<!DOCTYPE html>
<html lang="en">
<?php require('header.php')?>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>   
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<div class="containe-fluid">
<div>

<br><br>
<center><h4 class="m-0 font-weight-bold text-primary">About UsDetails</h4></center>
<body>

        

                
				<hr>
			
        <?php

$query = $conn->query("SELECT * FROM about_us");
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
			        <h5 class="modal-title" id="exampleModalLabel">New About Us Entry</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			     
                     <div class="card-body">
						        	<form action="" method="post" enctype="multipart/form-data">
							
                        <div class="form-group">
                            <label>Message</label>
                           <textarea class="form-control" id="name" name="name"  placeholder="Enter contents here..." cols="30" rows="10"></textarea>
  
                        </div>
                       

								<div class="form-group">
									<label>Upload Signature Image</label>
								<input type="file" name="img1" class="form-control">
								</div>
							  <div class="modal-footer">
			       
			        <button type="submit" class="btn btn-primary" name = "submit" >Add About Us Details </button>
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New About Us Details</button>
			
				<div >	
        </div>
<br>
  <table class="table ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Message From Principal</th>
        <th>Signature</th>
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
          $imageURL1 = 'img/'.$row["image"];
                ?>
                      <tr>
                          <td><?php  echo $row['id']; ?></td>
                          <td><?php  echo $row['texts']; ?></td>
                          <td><img src="<?php echo $imageURL1; ?>" alt ="" width="50px"/></td>
                          
                         
                          <td>
                              <form action="aboutUs_edit.php" method="post">
                                  <input type="hidden" name="aboutUs_edit_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="aboutUs_edit_btn" class="btn btn-success"> EDIT</button>
                              </form>
                          </td>
                          <td>
                              <form action="code.php" method="post">
                                  <input type="hidden" name="aboutUs_delete_id" value="<?php echo $row['id']; ?>">
                                  <button type="submit" name="aboutUs_delete_btn" class="btn btn-success"> Delete</button>
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
  
	$file1=$_FILES['img1']['name'];
	$file_tmp1=$_FILES['img1']['tmp_name'];


	$query="insert into about_us (texts,image) values('$name' , '".$file1."')";
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


<script>
   // ClassicEditor.create( document.querySelector( '#edit_texts' ) )
    ClassicEditor
        .create( document.querySelector( '#name' ), {
			
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: ['ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' , 'numberedList', 'bulletedList' ,'link']
			
,
			link: {
            // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
            addTargetToExternalLinks: true,

            // Let the users control the "download" attribute of each link.
            decorators: [
                {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'download'
                    }
                }
            ]
        }

		} )
		
        .catch( function( error ) {
            console.error( error );
        } );

    </script>
</body>
</html>