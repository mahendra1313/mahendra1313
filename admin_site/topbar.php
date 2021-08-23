<?php
require('db_connect.php');
$query = $conn->query("SELECT * FROM about_us"); 
$data = $query->fetch_assoc();
	$query1 = $conn->query("SELECT * FROM contact_me"); 
  if ($query1->num_rows > 0) {
      $row = $query1->fetch_assoc();
      $imageURL = 'img/'.$row["logo"];
  }

?>
<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>
<?php require('../course_site/data.php');?>
<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  	<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
        <img src="<?php echo $logo; ?>" alt ="" width="75px" alt="logo">
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white">
        <large><b>Admin | <?php echo $school_name; ?></b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>