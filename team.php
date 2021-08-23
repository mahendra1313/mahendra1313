<?php
include 'addTeam.php';
require('db_connect.php');
?>
<?php require('header.php')?>


<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			

<!-- start table slider -->
<div class="container">
		<div class="row">
			<div >
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form  name="team-form" method="post" action="addTeam.php" enctype="multipart/form-data">
			          <div class="form-group">
			            <label for="select" class="form-control-label">select img</label>
			            <input type="file" class="form-control  btn-primary" id="file" name="file">
			          </div>
			          <div class="form-group">
			            <label for="heading-text" class="form-control-label">Name</label>
					    <input type="text" class="form-control" placeholder="name" id="heading-text" name="name" aria-describedby="basic-addon1">
			          </div>
			          <div class="form-group">
			            <label for="content-text" class="form-control-label">Post</label>
					    <input type="text" class="form-control" placeholder="post" id="content-text" name="post" aria-describedby="basic-addon1">
			          </div>
			           <div class="form-group">
			            <label for="content-text" class="form-control-label">Description</label>
					    <textarea class="form-control" placeholder="Enter description here..." name="description"  id="floatingTextarea2" style="height: 100px"></textarea>
  						 
					</div>
			         
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name = "add_employee_btn" >Add Employee </button>
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


		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add To Employee</button>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?page=teamReport" ><button type="submit" name="reports" class="btn btn-success">Reports</button></a>	
				<div >	
			<table class="table ">
			  <thead>
			    <tr>
			      <th>ID</th>
				  <th>Image</th>
			      <th>Name</th>
			      <th>Post</th>
			      <th>Description</th>			     
			      <th> Edit</th>
			      <th>Delete</th>
			      
			    </tr>
			  </thead>
			  <tbody>
			  <tr>
					  <?php
					  $query = $conn->query("SELECT * FROM team");
	
                        if($query->num_rows > 0)        
                        {
                            while($row = $query->fetch_assoc())
                            {
								$imageURL = 'img/'.$row["image"];
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><img src="<?php echo $imageURL; ?>" alt ="" width="50px"/></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['post']; ?></td>
                                <td><?php  echo $row['description']; ?></td>
                                <td>
								<form action="team_edit.php" method="post">
                                        <input type="hidden" name="team_edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="team_edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="team_delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="team_delete_btn" class="btn btn-danger"> DELETE</button>
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
                
				<hr>
				
			</div>
			
		</div>
		</div>
	</div>

</div>

<?php require('scriptsAdmin.php')?>
