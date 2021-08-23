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
        <h2 class="m-0 font-weight-bold text-primary"> EDIT View Banner Details </h2>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['view_banner_edit_btn']))
        {
            $id = $_POST['view_banner_edit_id'];
            
            $query = "SELECT * FROM tbl_banner WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label>School Name</label>
                            <input type="text" name="edit_name" value="<?php echo $row['school_name'] ?>"
                                class="form-control" placeholder="Enter School Name">
                        </div>
                        <div class="form-group">
                            <label>School Number</label>
                            <input type="text" name="edit_no" value="<?php echo $row['schoolno'] ?>"
                                class="form-control" placeholder="Enter School Number details">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control"
                                placeholder="Enter Address">
                        </div>
                        

                        <div class="form-group">
                            <label> LOGO </label>
                            <input type="file" name="file" value="<?php echo $row['logo'] ?>" class="form-control"
                                placeholder="Select Logo File">
                        </div>

                        <div class="form-group">
                            <label> Banner1 </label>
                            <input type="file" name="file1" value="<?php echo $row['banner1'] ?>" class="form-control"
                                placeholder="Select Banner1 File">
                        </div>

                        <div class="form-group">
                            <label> Banner2 </label>
                            <input type="file" name="file2" value="<?php echo $row['banner2'] ?>" class="form-control"
                                placeholder="Select Banner2 File">
                        </div>

                        <div class="form-group">
                            <label> Banner3 </label>
                            <input type="file" name="file3" value="<?php echo $row['banner3'] ?>" class="form-control"
                                placeholder="Select Banner3 File">
                        </div>

             
                        <a href="index.php?page=view_banner" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="view_banner_updatebtn" class="btn btn-primary"> Update </button>

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