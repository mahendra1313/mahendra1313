<?php
require('db_connect.php');

$statusMsg = "";
if($conn)
{
   // echo "Database Connected yes...";

    $targetDir = "img/";

    if(isset($_POST['add_employee_btn']))
    {
    
        if (!empty($_FILES["file"]["name"])) {
            $fileName =  basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif','pdf');

            if(in_array($fileType, $allowTypes))
            {
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
                {
                    $name = $_POST['name'];
                    $post = $_POST['post'];
                    $description = $_POST['description'];
                    $insert =  $conn->query("INSERT INTO team (name,post,description, image) VALUES ('$name','$post','$description', '".$fileName."')");
                
                    if ($insert) {
                        $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                        header('Location: index.php?page=team');
                       
                    } else {
                        $statusMsg = "The file has not been uploaded.";
                        header('Location: index.php?page=team');
                    }            
                         
                }
                else
                {
                    $statusMsg = "Sorry! there was an error to uploads.";  
                    header('Location: index.php?page=team');
                }

            }

            else
            {
                $statusMsg = "Sorry ! only picture format or pdf is allowed to insert.";
                header('Location: index.php?page=team');
            }
        }

       else
       {
        $statusMsg = "Please select file to upload.";
        header('Location: index.php?page=team');
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
