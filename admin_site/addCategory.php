<?php
require('db_connect.php');
if($conn)
{
   // echo "Database Connected yes...";

   

    if(isset($_POST['add_blogCategory_btn']))
    {
    
                 $title = $_POST['title'];
                   
                    $insert = $conn->query("INSERT INTO Category (name) VALUES ('$title')");
                
                    if ($insert) {
                       // $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                       header('Location: index.php?page=Blog');
                       
                    } else {
                        $statusMsg = "The file has not been uploaded.";
                        header('Location: index.php?page=Blog');
                    }            
                         
                }
               

            
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
