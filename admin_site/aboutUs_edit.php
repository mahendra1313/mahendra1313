<?php

require('db_connect.php');
?>

<html lang="en">
<?php require('head.php')?>
<?php require('header.php')?>
<body>

<?php 
if($conn)
{
  //  echo "Database Connected";
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
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h2 class="m-0 font-weight-bold text-primary"> EDIT About Us Details </h2>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['aboutUs_edit_btn']))
        {
            $id = $_POST['aboutUs_edit_id'];
            
            $query = "SELECT * FROM about_us WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" id="edit_name" name="edit_name" cols="30" rows="10"><?php echo $row['texts'] ?></textarea>
                   
                        </div>
                                             

                        <div class="form-group">
                            <label> Signature </label>
                            <input type="file" name="file" value="<?php echo $row['image'] ?>" class="form-control"
                                placeholder="Select signature file">
                        </div>

                                   
                        <a href="index.php?page=aboutUs" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="aboutUs_updatebtn" class="btn btn-primary"> Update </button>

                    </form>
                    <?php
            }
        }
    ?>
    </div>
</div>
</div>

</div>

<script>
   // ClassicEditor.create( document.querySelector( '#edit_texts' ) )
    ClassicEditor
        .create( document.querySelector( '#edit_name' ), {
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