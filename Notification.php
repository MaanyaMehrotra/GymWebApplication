<!DOCTYPE html>
<html>

<head>

<title>Notification Page</title>

<link rel="stylesheet" href="pgcss.css">

<style>

.msg
{
	background-color:grey;
	border-radius:10px;
	width:25%;
	border-sizing:border-box;
	padding: 10px 10px 10px 10px;
	text-align:justify;
	color:white;
	font-size:20px;
}

</style>

</head>

<body style="background-color:whitesmoke;">

<header style="background-color:whitesmoke;" class="tpbtm">Welcome to Trainer Home Page</header>
<p class="tpbtm" style="background-color:whitesmoke;text-align:right;">Hi <?php session_start(); echo $_SESSION['user']; ?>|<a href="/1147119/Session.php">Logout</a></p>

<div class="sdbr">
<ul>
<a href="/1147119/Booking.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">Scheduled Bookings</li></a>
<a href="/1147119/Workout.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">My Workouts</li></a>
<a href="/1147119/Rank.php" class="lnk"><li style="color:lightslategrey;">Rank</li></a>
<a href="/1147119/leave.php" class="lnk"><li style="color:lightslategrey;">Leave</li></a>
<a href="/1147119/cpass.php" class="lnk"><li style="color:lightslategrey;">Change Password</li></a>
</ul>
</div>

<div class="tbl" style="background:url(/1147119/ChatBg.jpg);height:31vw;overflow:auto;margin-bottom: 5px">
<?php
include("dbcon.php");
$qry='SELECT `Message`,`Sender`,DATE_FORMAT(clock,"%d/%m %H:%i") FROM Chat_Details';
$qry_chk="SELECT count(*) FROM Chat_Details";
$res=mysqli_query($con,$qry_chk);
$row=mysqli_fetch_row($res);
if($row[0]!=0)
{
	$res=mysqli_query($con,$qry);
	while($row=mysqli_fetch_row($res))
	{
		if($row[1]==$_SESSION['user'])
		{
?>
			<p class="msg" style="margin: 10px 0px 10px 72%;"><span style="color:Yellow;"><?php echo "$row[1]"; ?></span><br><?php echo "$row[0] "; ?><span style="float:right;"><?php echo "$row[2]"; ?></span><br><br></p>
<?php
		}
		else
		{
?>
			<p class="msg" style="margin-left: 10px;"><span style="color:Yellow;"><?php echo "$row[1]"; ?></span><br><?php echo "$row[0] "; ?><span style="float:right;"><?php echo "$row[2]"; ?></span><br></p>
<?php
		}
	}
}
else
{
?>
	<p class="msg" style="text-align:center;margin: auto;width:98%;">No messages</p>
<?php
}
?>

</div>
<div class="tbl">
<form action="Chat_Ins.php" method="POST">
<input type="text" name="msg" style="background-color:mediumseagreen;color:white;border-radius:5px;width:92%;font-size:20px;">
<input type="submit" value="Send" style="background-color:seagreen;color:white;font-size:20px;">
</form>
</div>
<footer>&copy Fitness House</footer>
</body>

</html>