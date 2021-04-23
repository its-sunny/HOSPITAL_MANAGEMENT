<?php
session_start();
include("dbconnection.php");
if(!isset($_SESSION['patientid']))
{
	echo "<script>window.location='patientlogin.php';</script>";
}
include("headers.php");

$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatientappointment = mysqli_query($con,$sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      
      <li  class="first">Patient Account</li>
    </ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Hey, <strong><?php echo $rspatient[patientname]; ?></strong> :Welcome To City Hospital Patient Portal</h1>
    <h1>You have Registered on <?php echo $rspatient[admissiondate]; ?> <?php echo $rspatient[admissiontime]; ?></h1>

  </div>
</div>

    <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>