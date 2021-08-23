<?php


require('../course_site/data.php');
?>
<?php require('header.php')?>


<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			

<!-- start table slider -->
<div class="container">
		<div class="row">
			
</div>


		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
			<div class="card">
				
			<table class="table ">
			  <thead>
			    <tr>
			      <th>ID</th>
				  <th>Principal Name</th>
			      <th>P Mobile No.</th>
			      <th>P Email</th>
			      <th>Principal Picture</th>	
                  <th>Vice P Name</th>
			      <th>Vice P Mobile No.</th>
			      <th>Vice P Email</th>
			      <th>Vice P Picture</th>	
                  <th>SDMC HeadName</th>
			      <th>SDMC Head Mobile No.</th>
			      <th>SDMC Head Email</th>
			      <th>SDMC Head Picture</th>			     
			      <th> Edit</th>
			       
			      
			    </tr>
			  </thead>
			  <tbody>
			  <tr>
					 
                            <tr>
                                <td><?php  echo $pid ?></td>                               
                                <td><?php  echo $pname ?></td>
                                <td><?php  echo $pmobile ?></td>
                                <td><?php  echo $pemail?></td>
                                <td><img src="<?php echo $pic1; ?>" alt ="" width="50px"/></td>
                                <td><?php  echo $dname ?></td>
                                <td><?php  echo $dmobile ?></td>
                                <td><?php  echo $demailid ?></td>
                                <td><img src="<?php echo $pic2; ?>" alt ="" width="50px"/></td>
                                <td><?php  echo $vname ?></td>
                                <td><?php  echo $vmobile ?></td>
                                <td><?php  echo $vemailid ?></td>
                                <td><img src="<?php echo $pic3; ?>" alt ="" width="50px"/></td>


                                <td>
								<form action="Contact_edit.php" method="post">
                                        <input type="hidden" name="contact_edit_id" value="<?php echo $pid ?>">
                                        <button type="submit" name="contact_edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                
								   </tr>
                        
                      

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
