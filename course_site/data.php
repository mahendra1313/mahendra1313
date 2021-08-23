
 <?php 
 require('connection.php');   
$query="select * from tbl_banner";
$result= mysqli_query($connection,$query);
while ($row = mysqli_fetch_array($result)) {
$schoolno =  $row['schoolno'];
$school_name =  $row['school_name'];
$banner1 =  '../admin_site/img/'.$row['banner1'];
$banner2 = '../admin_site/img/'. $row['banner2'];
$banner3 =  '../admin_site/img/'.$row['banner3'];
$logo    = '../admin_site/img/'. $row['logo'];
$address =  $row['address'];
}  

$query="select * from tbl_counter";
$result= mysqli_query($connection,$query);
while ($row = mysqli_fetch_array($result)) {

$total_studens =  $row['total_students'];
$total_students_pic =  '../admin_site/img/'.$row['total_students_pic'];

$total_teacher =  $row['total_teacher'];
$total_teacher_pic =  '../admin_site/img/'.$row['total_teacher_pic'];

$total_lab =  $row['total_lab'];
$total_lab_pic =  '../admin_site/img/'.$row['total_lab_pic'];

$total_library =  $row['total_library'];
$total_library_pic =  '../admin_site/img/'.$row['total_library_pic'];

$total_ground =  $row['total_ground'];
$total_ground_pic =  '../admin_site/img/'.$row['total_ground_pic'];

$total_garden =  $row['total_garden'];
$total_garden_pic =  '../admin_site/img/'.$row['total_garden_pic'];

}  


$query1="select * from tbl_gallery";
$result1= mysqli_query($connection,$query1);
while ($roww = mysqli_fetch_array($result1)) {

$total_students_pic1 =  '../admin_site/img/'.$roww['total_students_pic'];


$total_teacher_pic1 =  '../admin_site/img/'.$roww['total_teacher_pic'];


$total_lab_pic1 = '../admin_site/img/'. $roww['total_lab_pic'];


$total_library_pic1 = '../admin_site/img/'. $roww['total_library_pic'];


$total_ground_pic1 =  '../admin_site/img/'.$roww['total_ground_pic'];


$total_garden_pic1 =  '../admin_site/img/'.$roww['total_garden_pic'];

$picc1  = '../admin_site/img/'.$roww['pic1'];
$picc2 = '../admin_site/img/'.$roww['pic2'];

}

$query="select * from tbl_contact";
$result= mysqli_query($connection,$query);
while ($row1 = mysqli_fetch_array($result)) {
$pid =  $row1['id'];
$pname =  $row1['pname'];
$pmobile =  $row1['pmobile'];
$pemail =  $row1['pemail'];
$dname =  $row1['dname'];
$dmobile =  $row1['dmobile'];
$demailid       =  $row1['demailid'];
$vname =  $row1['vname'];
$vmobile =  $row1['vmobile'];
$vemailid    =  $row1['vemailid'];
$pic1 =  '../admin_site/img/'.$row1['pic1'];
$pic2 = '../admin_site/img/'. $row1['pic2'];
$pic3    =  '../admin_site/img/'.$row1['pic3'];
}  
?>