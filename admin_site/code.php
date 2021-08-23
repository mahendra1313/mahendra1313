<?php



require('db_connect.php');
$targetDir = "img/";


if(isset($_POST['team_updatebtn']))
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
                $id = $_POST['edit_id'];
                //$logo = $_POST['edit_logo'];
                $name = $_POST['edit_name'];
                $post = $_POST['edit_post'];
                $description = $_POST['edit_description'];
            
                $insert = $conn->query("UPDATE team SET name='$name', post='$post', description='$description' , image='".$fileName."' WHERE id='$id' ");
            
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



if(isset($_POST['team_delete_btn']))
{
    $id = $_POST['team_delete_id'];

    $query = "DELETE FROM team WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=team'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=team');
    }    
}



if(isset($_POST['blogCategory_updatebtn']))
{
   
                $id = $_POST['edit_id'];
                $title = $_POST['edit_title'];
                     
            
                $insert = $conn->query("UPDATE category SET name='$title' WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The Category has been has been uploaded successfully.";
                    header('Location: index.php?page=blog');
                   
                } else {
                    $statusMsg = "The file has not been uploaded.";
                    header('Location: index.php?page=blog');
                }            
            
}



if(isset($_POST['blogCategory_delete_btn']))
{
    $id = $_POST['blogCategory_delete_id'];

    $query = "DELETE FROM category WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=blog');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=blog');
    }    
}


if(isset($_POST['blog_updatebtn']))
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
                $id = $_POST['edit_id'];
                //$logo = $_POST['edit_logo'];
                $title = $_POST['edit_title'];
                $texts = $_POST['edit_texts'];
                $category_id = $_POST['edit_category_id']; 
            
                $insert = $conn->query("UPDATE blog SET title='$title', contents='$texts', image='".$fileName."', category_id='$category_id' WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                    header('Location: index.php?page=blog');
                   
                } else {
                    $statusMsg = "The file has not been uploaded.";
                    header('Location: index.php?page=blog');
                }            
                     
            }
            else
            {
                $statusMsg = "Sorry! there was an error to uploads.";  
                header('Location: index.php?page=blog');
            }

        }

        else
        {
            $statusMsg = "Sorry ! only picture format or pdf is allowed to insert.";
            header('Location: index.php?page=blog');
        }
    }

   else
   {
    $statusMsg = "Please select file to upload.";
    header('Location: index.php?page=blog');
   }
    
}



if(isset($_POST['blog_delete_btn']))
{
    $id = $_POST['blog_delete_id'];

    $query = "DELETE FROM blog WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=blog');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=blog');
    }    
}




if(isset($_POST['view_banner_updatebtn']))
{
    if (!empty($_FILES["file"]["name"])) {
        $fileName =  basename($_FILES["file"]["name"]);
        $fileName1 =  basename($_FILES["file1"]["name"]);
        $fileName2 =  basename($_FILES["file2"]["name"]);
        $fileName3 =  basename($_FILES["file3"]["name"]);


        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');

        if(in_array($fileType, $allowTypes))
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
                $id = $_POST['edit_id'];
                //$logo = $_POST['edit_logo'];
                $address = $_POST['edit_address'];
                $name = $_POST['edit_name'];
                $no = $_POST['edit_no'];
            
                $insert = $conn->query("UPDATE tbl_banner SET school_name='".$name."', banner1='".$fileName1."',banner2='".$fileName2."',banner3='".$fileName3."', schoolno='$no',  logo='".$fileName."', address='$address'  WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                    header('Location: index.php?page=view_banner');
                   
                } else {
                    $statusMsg = "The file has not been uploaded.";
                    header('Location: index.php?page=view_banner');
                }            
                     
            }
            else
            {
                $statusMsg = "Sorry! there was an error to uploads.";  
                header('Location: index.php?page=view_banner');
            }

        }

        else
        {
            $statusMsg = "Sorry ! only picture format or pdf is allowed to insert.";
            header('Location: index.php?page=view_banner');
        }
    }

   else
   {
    $statusMsg = "Please select file to upload.";
    header('Location: index.php?page=view_banner');
   }
    
}



if(isset($_POST['aboutUs_updatebtn']))
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
                $id = $_POST['edit_id'];
                //$logo = $_POST['edit_logo'];
              
                $name = $_POST['edit_name'];
               
            
                $insert = $conn->query("UPDATE about_us SET texts='".$name."', image='".$fileName."' WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                    header('Location: index.php?page=aboutUs');
                   
                } else {
                    $statusMsg = "The file has not been uploaded.";
                    header('Location: index.php?page=aboutUs');
                }            
                     
            }
            else
            {
                $statusMsg = "Sorry! there was an error to uploads.";  
                header('Location: index.php?page=aboutUs');
            }

        }

        else
        {
            $statusMsg = "Sorry ! only picture format or pdf is allowed to insert.";
            header('Location: index.php?page=aboutUs');
        }
    }

   else
   {
    $statusMsg = "Please select file to upload.";
    header('Location: index.php?page=aboutUs');
   }
    
}



if(isset($_POST['contact_updatebtn']))
{
    if (!empty($_FILES["file"]["name"])) {
        $fileName =  basename($_FILES["file"]["name"]);
        $fileName2 =  basename($_FILES["file2"]["name"]);
        $fileName3 =  basename($_FILES["file3"]["name"]);


        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');

        if(in_array($fileType, $allowTypes))
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
            {
                $id = $_POST['edit_id'];
               
                $pname = $_POST['edit_pname'];
                $pmobile = $_POST['edit_pmobile'];
                $pemail = $_POST['edit_pemail'];
                $dname = $_POST['edit_dname'];
                $dmobile = $_POST['edit_dmobile'];
                $demailid = $_POST['edit_demailid'];
                $vname = $_POST['edit_vname'];
                $vmobile = $_POST['edit_vmobile'];
                $vemailid = $_POST['edit_vemailid'];
            
                $insert = $conn->query("UPDATE tbl_contact SET pname='".$pname."', pmobile='".$pmobile."',pemail='".$pemail."',dname='".$dname."', dmobile='".$dmobile."',demailid='".$demailid."', vname='".$vname."', vmobile='".$vmobile."',vemailid='".$vemailid."',pic1='".$fileName."',pic2='".$fileName2."',pic3='".$fileName3."'  WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                    header('Location: index.php?page=Contact');
                   
                } else {
                    $statusMsg = "The file has not been uploaded.";
                    header('Location: index.php?page=Contact');
                }            
                     
            }
            else
            {
                $statusMsg = "Sorry! there was an error to uploads.";  
                header('Location: index.php?page=Contact');
            }

        }

        else
        {
            $statusMsg = "Sorry ! only picture format or pdf is allowed to insert.";
            header('Location: index.php?page=Contact');
        }
    }

   else
   {
    $statusMsg = "Please select file to upload.";
    header('Location: index.php?page=Contact');
   }
    
}



if(isset($_POST['gallery_delete_btn']))
{
    $id = $_POST['gallery_delete_id'];

    $query = "DELETE FROM tbl_gallery WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=gallery');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=gallery');
    }    
}



if(isset($_POST['aboutUs_delete_btn']))
{
    $id = $_POST['aboutUs_delete_id'];

    $query = "DELETE FROM about_us WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=aboutUs');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=aboutUs');
    }    
}

if(isset($_POST['counter_delete_btn']))
{
    $id = $_POST['counter_delete_id'];

    $query = "DELETE FROM tbl_counter WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=counter');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=counter');
    }    
}



if(isset($_POST['view_banner_delete_btn']))
{
    $id = $_POST['view_banner_delete_id'];

    $query = "DELETE FROM tbl_banner WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=view_banner');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=view_banner');
    }    
}



if(isset($_POST['sr_updatebtn']))
{
    $id = $_POST['edit_id'];
                $registerNo = $_POST['edit_registerNo'];
                $sr = $_POST['edit_sr'];
                $name = $_POST['edit_name'];
                $fname = $_POST['edit_fname'];
                $texts = $_POST['edit_texts']; 
            
                $insert = $conn->query("UPDATE srregister SET registerNo='$registerNo', sr='$sr',name='$name', fname='$fname', contents='$texts'WHERE id='$id' ");
            
                if ($insert) {
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
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

        
 



if(isset($_POST['srRegister_delete_btn']))
{
    $id = $_POST['srRegister_delete_id'];

    $query = "DELETE FROM srregister WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?page=srRegister');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: index.php?page=srRegister');
    }    
}



?>