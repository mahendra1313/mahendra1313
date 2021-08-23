<?php
require('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

<script src="js/bootstrap.min.js"></script>
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" ></script>
<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
	
<script>
		$(document).ready(function() {
    $('#teamShow').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

	</script>
</head>


<body>
    
<div class="container">
<div class="alert alert-danger mt-3">
       <center> <h4>S.R. Reports</h4></center>
    </div>
<table id="teamShow" class="display" style="width:100%">
        <thead>
            <tr>
            <th>ID</th>
				      <th>Register No</th>
				      <th>S.R.No.</th>
				      <th>Name</th>
					  <th>Father Name</th>
                      <th>Extra Details</th>                      
					  <th>Posted On</th>
               
            </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM srregister";
        $q=mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($q)){
          //  $imageURL = 'img/'.$data["image"];
?>
            <tr>
            <td><?php  echo $data['id']; ?></td>
            <td><?php  echo $data['registerNo']; ?></td>
            <td><?php  echo $data['sr']; ?></td>
            <td><?php  echo $data['name']; ?></td>
            <td><?php  echo $data['fname']; ?></td>
            <td><?php  echo $data['contents']; ?></td>
            <td><?php  echo $data['created_at']; ?></td>
          
            </tr>
            <?php
        }
        
        ?>
            
        </tbody>
        <tfoot>
            <tr>
            <th>ID</th>
				      <th>Register No</th>
				      <th>S.R.No.</th>
				      <th>Name</th>
					  <th>Father Name</th>
                      <th>Extra Details</th>                      
					  <th>Posted On</th>
               
            </tr>
        </tfoot>
    </table>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;
</body>
</html>