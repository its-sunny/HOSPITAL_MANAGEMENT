<?php
session_start();
if(!isset($_SESSION['adminid']))
{
	echo "<script>window.location='adminlogin.php';</script>";
}
include("dbconnection.php");
include("headers.php");
?>
<div class="wrapper col2">
  <div id="breadcrumb">

<div class="dropdown">
<strong>Admin Dashboard</strong>
</div>


  </div>
</div>
<div class="wrapper col4">


  <div id="container">
  	
   <h1 style="color:rgba(0,4,70,1.00)"> &nbsp; Database Records</h1>
   
   
   
    </h1>
       
    <h1>Number of Department Records : 
    <?php
	$sql = "SELECT * FROM department";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>
     <h1>Number of Doctor Records : 
    <?php
	$sql = "SELECT * FROM doctor ";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_num_rows($qsql);
	?>
    </h1>
    <h1>Number of Patient Records:
    	<?php
    	$sql="SELECT * FROM patient ";
    	$qsql= mysqli_query($con,$sql);
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