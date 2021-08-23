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

			<div>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
				  <form  name="team-form" method="post" action="addCategory.php" enctype="multipart/form-data">
			         
			          <div class="form-group">
			            <label for="heading-text" class="form-control-label">Blog Category Name</label>
					    <input type="text" class="form-control" placeholder="heading" id="heading-text" name="title" aria-describedby="basic-addon1">
			          </div>
			            
					  	       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name = "add_blogCategory_btn" >Add New Category</button>
			      </div>

				  </form>
			    </div>
			  </div>
			</div>
		</div>	
		
		<center>
	
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Category</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Add New Blog</button>
		<a href="index.php?page=blogReport" ><button type="submit" name="reports" class="btn btn-success">Reports</button></a>	
				
	</center>&nbsp;
		<div>	
				<table class="table ">
				  <thead>
				    <tr>
				      <th>ID</th>				      
				      <th>Category</th>				     
				      <th> Edit</th>
				      <th>Delete</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php
				  $query2 = $conn->query("SELECT * FROM Category");
                        if($query2->num_rows > 0)        
                        {
                            while($row = $query2->fetch_assoc())
                            {
								
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                
                                <td>
								<form action="blogCategory_edit.php" method="post">
                                        <input type="hidden" name="blogCategory_edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="blogCategory_edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="blogCategory_delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="blogCategory_delete_btn" class="btn btn-danger"> DELETE</button>
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


<!-- start table slider -->

			<div >
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="ModalLabel1">New Blog</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>

			      <div class="modal-body">
				  <form  name="team-form-BLOG" method="post" action="addBlog.php" enctype="multipart/form-data">
			          <div class="form-group">
			            <label for="select" class="form-control-label">select Image</label>
						
			            <input type="file" class="form-control  btn-primary" id="file" name="file">
			          </div>
					  <div class="form-floating">
 
</div>
			          <div class="form-group">
			            <label for="heading-text" class="form-control-label">TITLE</label>
					    <input type="text" class="form-control" placeholder="heading" id="heading-text" name="title" aria-describedby="basic-addon1">
			          </div>
			          <div class="form-group">
			            <label for="content-text" class="form-control-label">Contents</label>
						<textarea class="form-control" id="texts" name="texts"  placeholder="Enter contents here..." cols="30" rows="10"></textarea>
  
					</div>   
					  	       
					  <div class="form-group">
					  
			            <label for="content-text" class="form-control-label">Select Post Category</label>
					   <select class="form-control" name="category_id" id="category_id">
					   <?php
							$categories = getAllCategory($conn);
							print_r($categories);
							foreach($categories as $ct){
									?>

								<option value="<?=$ct['id']?>"><?=$ct['name']?></option>
								<?php
							}
							?>


					   </select>
			          </div> 
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name = "add_blog_btn" >Add New Blog</button>
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
				      <th>Picture</th>
				      <th>Title</th>
				      <th>Contents</th>
					  <th>Category</th>
					  <th>Posted On</th>
				      <th> Edit</th>
				      <th>Delete</th>
				    </tr>
				  </thead>
				  <tbody>
				  <tr>
					<?php
					 $query = $conn->query("SELECT * FROM blog");
                        if($query->num_rows > 0)        
                        {
                            while($row = $query->fetch_assoc())
                            {
								$imageURL = 'img/'.$row["image"];
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><img src="<?php echo $imageURL; ?>" alt ="" width="100px"/></td>
                                <td><?php  echo $row['title']; ?></td>
								<td><?php echo substr($row['contents'],0,10) . "..."; ?></td>
                              
								<td><?=getCatogory($conn, $row['category_id'])?></td>
								<td><?php  echo $row['created_at']; ?></td>
                                <td>
								<form action="blog_edit.php" method="post">
                                        <input type="hidden" name="blog_edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="blog_edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="blog_delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="blog_delete_btn" class="btn btn-danger"> DELETE</button>
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
        .create( document.querySelector( '#texts' ), {
			
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