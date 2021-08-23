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
<div class="container-fluid">

<!-- DataTales Example -->
<div >
    <div>
        <h2 class="m-0 font-weight-bold text-primary"> EDIT Team Details </h2>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['team_edit_btn']))
        {
            $id = $_POST['team_edit_id'];
            
            $query = "SELECT * FROM team WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
				        

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label> IMAGE </label>
                            <input type="file" name="file" value="<?php echo $row['image'] ?>" class="form-control"
                                placeholder="Select Image File">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <input type="text" name="edit_post" value="<?php echo $row['post'] ?>"
                                class="form-control" placeholder="Enter Post">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="edit_description" value="<?php echo $row['description'] ?>"
                                class="form-control" placeholder="Enter Decriptions about member">
                        </div>
                        <a href="index.php?page=team" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="team_updatebtn" class="btn btn-primary"> Update </button>

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