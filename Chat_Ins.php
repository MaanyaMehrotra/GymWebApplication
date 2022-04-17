<?php
session_start();
include("dbcon.php");
$sender=$_SESSION['user'];
$message=$_POST['msg'];
$q="INSERT INTO Chat_Details(`Sender`,`Message`) VALUES('".$sender."','".$message."')";
if($res=mysqli_query($con,$q))
{
	header("location: Notification.php");
}
else
{
?>
	<p>Failed</p>
<?php
}
?>