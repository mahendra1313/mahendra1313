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
        <h2 class="m-0 font-weight-bold text-primary"> EDIT View Notes Details </h2>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['notes_edit_btn']))
        {
            $id = $_POST['notes_edit_id'];
            
            $query = "SELECT * FROM notesclass WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label>Class</label>
                            <input type="text" name="edit_class" value="<?php echo $row['class'] ?>"
                                class="form-control" placeholder="Enter Class">
                        </div>
                        <div class="form-group">
                            <label>Subject Name</label>
                            <input type="text" name="edit_subject_name" value="<?php echo $row['subject_name'] ?>"
                                class="form-control" placeholder="Enter Subject Name">
                        </div>

                        <div class="form-group">
                            <label>Descriptions</label>
                            <input type="text" name="edit_content" value="<?php echo $row['content'] ?>" class="form-control"
                                placeholder="Enter Descriptions">
                        </div>
                        

                        <div class="form-group">
                            <label> Upload Notes </label>
                            <input type="file" name="file" value="<?php echo $row['upload'] ?>" class="form-control"
                                placeholder="Select notes File">
                        </div>

                        
             
                        <a href="index.php?page=notes" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="notes_updatebtn" class="btn btn-primary"> Update </button>

                    </form>
                    <?php
            }
        }
    ?>
    </div>
</div>
</div>

</div>

</body>
</html>