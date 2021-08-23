<?php
require('../course_site/function.php');
 require('db_connect.php');
$statusMsg = "";

if($conn)
{
   echo "Database Connected yes...";

    $targetDir = "img/";

    if(isset($_POST['add_SR_btn']))
    {
    
       
                    $registerNo = $_POST['registerNo'];
                    $sr = $_POST['sr'];
                    $name = $_POST['name'];
                    $fname = $_POST['fname'];
                    $contents = $_POST['contents'];
                    //$date = $_POST['created_at'];  
                   
                    

                    $insert = $conn->query("INSERT INTO srregister (registerNo,sr, name, fname,contents) VALUES ('$registerNo','$sr', '$name','$fname', '$contents' )");
                
                    if ($insert) {
                        $statusMsg = "The file  has been uploaded successfully.";
                        header('Location: index.php?page=srRegister');
                       
                    } else {
                        $statusMsg = "The file has not been uploaded.";
                        header('Location: index.php?page=srRegister');
                    }            
                         
                }
                else
                {
                    $statusMsg = "Sorry! there was an error to uploads.";  
                    header('Location: index.php?page=srRegister');
                }

            }

            else
            {
                $statusMsg = "Sorry ! Database is not added";
                header('Location: index.php?page=srRegister');
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
