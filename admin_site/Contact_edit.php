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
        <h2 class="m-0 font-weight-bold text-primary"> EDIT Contact Us Details </h2>
    </div>
    <div class="card-body">
    <?php

        if(isset($_POST['contact_edit_btn']))
        {
            $id = $_POST['contact_edit_id'];
            
            $query = "SELECT * FROM tbl_contact WHERE id='$id' ";
            $query_run = mysqli_query($conn, $query);

            foreach($query_run as $row)
            {
                ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
				        

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label> IMAGE </label>
                            <input type="file" name="file" value="<?php echo $row['pic1'] ?>" class="form-control"
                                placeholder="Select Image File">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="edit_pname" value="<?php echo $row['pname'] ?>" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <input type="text" name="edit_pmobile" value="<?php echo $row['pmobile'] ?>"
                                class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="text" name="edit_pemail" value="<?php echo $row['pemail'] ?>"
                                class="form-control" placeholder="Enter Emailid">
                        </div>


                        
                        <div class="form-group">
                            <label> IMAGE </label>
                            <input type="file" name="file2" value="<?php echo $row['pic2'] ?>" class="form-control"
                                placeholder="Select Image File">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="edit_dname" value="<?php echo $row['dname'] ?>" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <input type="text" name="edit_dmobile" value="<?php echo $row['dmobile'] ?>"
                                class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="text" name="edit_demailid" value="<?php echo $row['demailid'] ?>"
                                class="form-control" placeholder="Enter Emailid">
                        </div>

                        
                        <div class="form-group">
                            <label> IMAGE </label>
                            <input type="file" name="file3" value="<?php echo $row['pic3'] ?>" class="form-control"
                                placeholder="Select Image File">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="edit_vname" value="<?php echo $row['vname'] ?>" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <input type="text" name="edit_vmobile" value="<?php echo $row['vmobile'] ?>"
                                class="form-control" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                            <label>Email Id</label>
                            <input type="text" name="edit_vemailid" value="<?php echo $row['vemailid'] ?>"
                                class="form-control" placeholder="Enter Emailid">
                        </div>
                        <a href="index.php?page=Contact" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="contact_updatebtn" class="btn btn-primary"> Update </button>

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