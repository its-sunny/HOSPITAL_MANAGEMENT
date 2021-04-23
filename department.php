<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	
	$sql ="INSERT INTO department(departmentname,description) values('$_POST[departmentname]','$_POST[textarea]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Department record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}


?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add New Department </li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Fill In The Department Record</h1>
    <form method="post" action="" name="frmdept">
    <table width="418" border="3">
      <tbody>
        <tr>
          <td width="34%">Department Name</td>
          <td width="66%"><input type="text" name="departmentname" id="departmentname" reqiured value="<?php echo $rsedit[departmentname]; ?>" /></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="textarea" id="textarea" cols="45" rows="5" required><?php echo $rsedit[description] ; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>
