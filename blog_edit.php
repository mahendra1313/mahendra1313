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

if(isset($_POST['blog_edit_btn']))
{
    $id = $_POST['blog_edit_id'];
    
    $query = "SELECT * FROM blog WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    foreach ($query_run as $row) {
        ?>

<form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">				        
<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
        </div>

        <div class="form-group">
               <label>Title</label>
               <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control" placeholder="Enter Title">
        </div>
 
  <div class="form-group">
    <label for="text">Contents</label>
    <textarea class="form-control" id="edit_texts" name="edit_texts" cols="30" rows="10"><?php echo $row['contents'] ?></textarea>
  </div>

  <div class="form-group">
					  <label for="content-text" class="form-control-label">Select Post Category</label>
                      <small><p><?=getCatogory($conn, $row['category_id'])?></p></small>
                    
                      <select class="form-control" name="edit_category_id" id="edit_category_id" >
                     <?php
                          $categories = getAllCategory($conn);
        print_r($categories);
        foreach ($categories as $ct) {
            ?>

                              <option value="<?=$ct['id']?>"><?=$ct['name']?></option>
                              <?php
        } ?>


                     </select>
                    </div> 

                    
                    <div class="form-group">
                            <label> IMAGE </label>
                         <?php    $imageURL = 'img/'.$row["image"];   ?>      
                            <input type="file" name="file" value="<?php echo $row['image'] ?>" class="form-control"
                                placeholder="Select Image File">
                        </div>

                        <a href="index.php?page=Blog" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="blog_updatebtn" class="btn btn-primary"> Update </button>


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