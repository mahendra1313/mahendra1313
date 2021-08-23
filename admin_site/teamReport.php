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
       <center> <h4>Team Reports</h4></center>
    </div>
<table id="teamShow" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Post</th>
                <th>Description</th>              
               
            </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM team";
        $q=mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($q)){
            $imageURL = 'img/'.$data["image"];
?>
            <tr>
            <td><?php  echo $data['id']; ?></td>
            <td><img src="<?php echo $imageURL; ?>" alt ="" width="50px"/></td>
            <td><?php  echo $data['name']; ?></td>
            <td><?php  echo $data['post']; ?></td>
            <td><?php  echo $data['description']; ?></td>
           
            </tr>
            <?php
        }
        
        ?>
            
        </tbody>
        <tfoot>
            <tr>
            <th>Id</th>
                <th>Name</th>
                <th>Post</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </tfoot>
    </table>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;
</body>
</html>