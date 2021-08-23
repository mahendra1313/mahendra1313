<?php
require('db_connect.php');
require('../course_site/function.php');
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
    $('#feedbackShow').DataTable( {
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
       <center> <h6>Feedback Reports</h6></center>
    </div>
<table id="feedbackShow" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Post Id</th>              
               
            </tr>
        </thead>
        <tbody>

        <?php
        $query = "SELECT * FROM comments";
        $q=mysqli_query($conn, $query);
        while($data = mysqli_fetch_assoc($q)){
           // $imageURL = 'img/'.$data["image"];
?>
            <tr>
            <td><?php  echo $data['id']; ?></td>
            <td><?php  echo $data['name']; ?></td>
            <td><?php  echo $data['comment']; ?></td>
            <td><?=getPostName($conn, $data['post_id'])?></td>
           
            </tr>
            <?php
        }
        
        ?>
            
        </tbody>
        <tfoot>
        <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Comment</th>
                <th>Post</th>              
               
            </tr>
        </tfoot>
    </table>
</div>
&nbsp;&nbsp;
</body>
</html>