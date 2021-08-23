<?php

require('db_connect.php');
?>

<html lang="en">
<?php require('head.php')?>
<?php require('header.php')?>
<?php require('../course_site/function.php');?>

<?php 


if($conn)
{
    //echo "Database Connected";
}
else
{
  echo "Database Not Connected";
}

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
    echo '
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title bg-danger text-white"> Database Connection Failed </h1>
                            <h2 class="card-title"> Database Failure</h2>
                            <p class="card-text"> Please Check Your Database Connection.</p>
                            <a href="#" class="btn btn-primary">:( </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
}

?>

<body>
    <br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8">


        <?php

if(isset($_POST['srRegister_edit_btn']))
{
    $id = $_POST['srRegister_edit_id'];
    
    $query = "SELECT * FROM srregister WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    foreach ($query_run as $row) {
        ?>

<form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">				        
<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        </div>

                      <div class="form-group">
                     <label>Register No.</label>
                     <input type="text" name="edit_registerNo" value="<?php echo $row['registerNo'] ?>" class="form-control" placeholder="Enter Register No.">
                     </div>
                    <div class="form-group">
			            <label for="heading-text" class="form-control-label">S.R. No.</label>
					    <input type="text" class="form-control" value="<?php echo $row['sr'] ?>" placeholder="enter s.r. no." id="edit_sr" name="edit_sr" aria-describedby="basic-addon1">
			          </div>
                      <div class="form-group">
			            <label for="heading-text" class="form-control-label">Name</label>
					    <input type="text" class="form-control" value="<?php echo $row['name'] ?>" placeholder="enter name" id="edit_name" name="edit_name" aria-describedby="basic-addon1">
			          </div>
			          <div class="form-group">
			            <label for="heading-text" class="form-control-label">Father Name</label>
					    <input type="text" class="form-control" value="<?php echo $row['fname'] ?>" placeholder="enter father's name" id="edit_fname" name="edit_fname" aria-describedby="basic-addon1">
			          </div> 
                    <div class="form-group">
                     <label for="text">Extra Details</label>
                     <textarea class="form-control" id="edit_texts" name="edit_texts" cols="30" rows="10"><?php echo $row['contents'] ?></textarea>
                    </div>

 
                         <a href="index.php?page=srRegister" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="sr_updatebtn" class="btn btn-primary"> Update </button>


</form>

<?php
    }
    }
?>
        </div>
    </div>
</div>





<script>
   // ClassicEditor.create( document.querySelector( '#edit_texts' ) )
    ClassicEditor
        .create( document.querySelector( '#edit_texts' ), {
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
            },
            toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo', 'numberedList', 'bulletedList' ,'link' ]

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