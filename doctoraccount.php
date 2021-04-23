<?php
session_start();
if(!isset($_SESSION['doctorid']))
{
	echo "<script>window.location='doctorlogin.php';</script>";
}
include("headers.php");
$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$_SESSION[doctorid]' ";
$qsqldoctor = mysqli_query($con,$sqldoctor);
$rsdoctor = mysqli_fetch_array($qsqldoctor);
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Doctor Account</li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Welcome <strong><?php echo $rsdoctor[doctorname]; ?></strong>, To City Hospital Doctor's Portal </h1>
     <h1>Number of Appointment Records : 
    <?php
	$sql = "SELECT * FROM appointment ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>
    <h1>Number of Patient Records : 
    <?php
	$sql = "SELECT * FROM patient ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>
   </div>
</div>

    <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>