<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[patientid]))
	{
		$lastinsid =$_SESSION[patientid];
	}
	
	
		$sql ="INSERT INTO appointment(patientid,appointmentdate,app_reason,status,departmentid,doctorid) values('$lastinsid','$_POST[appointmentdate]','$_POST[app_reason]','Pending','$_POST[department]','$_POST[doct]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Appointment record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	
}

if(isset($_SESSION[patientid]))
{
$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);
$readonly = " readonly";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add New Appointment</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
  
 <?php
if(isset($_POST[submit]))
{
	
		if(isset($_SESSION[patientid]))
		{
			echo "<h2>Appointment taken successfully.. </h2>";
			echo "<p>Appointment record is in pending process. Kinldy check the appointment status. </p>";
			echo "<p> <a href='viewappointment.php'>View Appointment record</a>. </p>";			
		}
			
}
else
{
 ?>
   <form method="post" action="" name="frmpatapp">
    <table width="532" border="3">
      <tbody>
        <tr>
          <td width="34%">Patient Name</td>
          <td width="66%"><input type="text" name="patiente" id="patiente" value="<?php echo $rspatient[patientname];  ?>"  <?php echo $readonly; ?> ></td>
        </tr>
        <tr>
          <td height="62">Address</td>
          <td><textarea name="textarea" id="textarea" <?php echo $readonly; ?>><?php echo $rspatient[address];  ?></textarea></td>
        </tr>
        <tr>
          <td>City</td>
          <td><input type="text" name="city" id="city" value="<?php echo $rspatient[city];  ?>" <?php echo $readonly; ?> ></td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobileno" id="mobileno" value="<?php echo $rspatient[mobileno];  ?>" <?php echo $readonly; ?> ></td>
       
        </tr>
<?php
		  if(!isset($_SESSION[patientid]))
		  {        
?>
        <tr>
          <td>Login-ID</td>
          <td><input type="text" name="loginid" id="loginid" value="<?php echo $rspatient[loginid];  ?>" <?php echo $readonly; ?> ></td>
        </tr>

        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" value="<?php echo $rspatient[patientname];  ?>" <?php echo $readonly; ?> ></td>
        </tr>
<?php
		  }
?>
        <tr>
          <td>Gender</td>
          <td>
          <?php 
		  if(isset($_SESSION[patientid]))
		  {
			  echo $rspatient[gender];
		  }
		  else
		  {
		  ?>
              <select name="select6" id="select6">
              <option value="">Select</option>
                <?php
                $arr = array("Male","Female");
                foreach($arr as $val)
                {
                    echo "<option value='$val'>$val</option>";
                }
                ?>
              </select>
			<?php
		  	}
		  	?>
          </td>
         
        </tr>
        <tr>
          <td>DOB</td>
          <td><input type="date" name="dob" id="dob" value="<?php echo $rspatient[dob]; ?>" <?php echo $readonly; ?> ></td>
        </tr>
        <tr>
          <td><strong>Enter Appointment Date</strong></td>
          <td><input type="date" required min="<?php echo date("Y-m-d"); ?>" name="appointmentdate" id="appointmentdate"></td>
        </tr>          
        <tr>
          <td><strong>Department</strong></td>
          <td>
          <select name="department" id="department" onchange="loaddoctor(this.value)">
          <option value="">Select department</option>
          <?php
		  	$sqldept = "SELECT * FROM department ";
			$qsqldept = mysqli_query($con,$sqldept);
			while($rsdept = mysqli_fetch_array($qsqldept))
			{
			echo "<option value='$rsdept[departmentid]'>$rsdept[departmentname]</option>";
			}
		  ?>
          </select>
          </td>
        </tr>   
		<tr>
          <td>Doctor</td>
          <td><select name="select6" id="select6">
            <option value="">Select</option>
            <?php
            $sqldoctor= "SELECT * FROM doctor INNER JOIN department ON department.departmentid=doctor.departmentid ";
      $qsqldoctor = mysqli_query($con,$sqldoctor);
      while($rsdoctor = mysqli_fetch_array($qsqldoctor))
      {
        if($rsdoctor[doctorid] == $rsedit[doctorid])
        {
          echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorname] ( $rsdoctor[departmentname] ) </option>";
        }
        else
        {
          echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorname] ( $rsdoctor[departmentname] )</option>";        
        }
      }
      ?>
          </select></td>
        </tr>   
        <tr>
          <td><strong>Appointment reason</strong></td>
          <td><textarea name="app_reason" required></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
<?php
}
?>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
