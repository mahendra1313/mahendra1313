<?php
//include 'addBlog.php';
require('db_connect.php');
require('../course_site/function.php');
?>

<?php require('header.php')?>

<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>   
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<div class="containe-fluid">
<div>

</div>	
	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
			
<!-- start table slider -->

		
		</div>	
		
		<center>
	
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Add New S.R. Entry</button>
			
				<a href="index.php?page=srReport" ><button type="submit" name="reports" class="btn btn-success">Reports</button></a>	
			
		</center>&nbsp;
		
<!-- start table slider -->

			<div >
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="ModalLabel1">New S.R. Entry</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
				  <form  name="team-form-BLOG" method="post" action="addSR.php" enctype="multipart/form-data">
                  <div class="form-group">
			            <label for="heading-text" class="form-control-label">Register No.</label>
					    <input type="text" class="form-control" placeholder="enter name" id="registerNo" name="registerNo" aria-describedby="basic-addon1">
			          </div>
                      <div class="form-group">
			            <label for="heading-text" class="form-control-label">S.R. No.</label>
					    <input type="text" class="form-control" placeholder="enter s.r. no." id="sr" name="sr" aria-describedby="basic-addon1">
			          </div>
                      <div class="form-group">
			            <label for="heading-text" class="form-control-label">Name</label>
					    <input type="text" class="form-control" placeholder="enter name" id="heading-text" name="name" aria-describedby="basic-addon1">
			          </div>
			          <div class="form-group">
			            <label for="heading-text" class="form-control-label">Father Name</label>
					    <input type="text" class="form-control" placeholder="enter father's name" id="fname" name="fname" aria-describedby="basic-addon1">
			          </div>
			          <div class="form-group">
			            <label for="content-text" class="form-control-label">Extra Details</label>
						<textarea class="form-control" id="contents" name="contents"  placeholder="Enter contents here..." cols="30" rows="10"></textarea>
  
					</div>   
					  	       
					  
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name = "add_SR_btn" >Add New S.R.</button>
			      </div>

				  </form>
			    </div>
			  </div>
			</div>
		</div>	
		
	

			<div>	
				<table class="table ">
				  <thead>
				    <tr>
				      <th>ID</th>
				      <th>Register No</th>
				      <th>S.R.No.</th>
				      <th>Name</th>
					  <th>Father Name</th>
                      <th>Extra Details</th>                      
					  <th>Posted On</th>
				      <th> Edit</th>
				      <th>Delete</th>
				    </tr>
				  </thead>
				  <tbody>
				  <tr>
					<?php
					 $query = $conn->query("SELECT * FROM srregister");
                        if($query->num_rows > 0)        
                        {
                            while($row = $query->fetch_assoc())
                            {
								//$imageURL = 'img/'.$row["image"];
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>                            
                                <td><?php  echo $row['registerNo']; ?></td>                                
                                <td><?php  echo $row['sr']; ?></td>                                
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['fname']; ?></td>
								<td><?php echo substr($row['contents'],0,10) . "..."; ?></td>
                              <td><?php  echo $row['created_at']; ?></td>
                                <td>
								<form action="srRegister_edit.php" method="post">
                                        <input type="hidden" name="srRegister_edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="srRegister_edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="srRegister_delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="srRegister_delete_btn" class="btn btn-danger"> DELETE</button>
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
				</table>
			</div>
			
<!-- end table slider -->

				
				<div >	
		
		</div>


				</div>
                
				<hr>
				
			</div>
			
		</div>
		</div>
	</div>

</div>

<?php require('scriptsAdmin.php')?>



<script>
   // ClassicEditor.create( document.querySelector( '#edit_texts' ) )
    ClassicEditor
        .create( document.querySelector( '#contents' ), {
			
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