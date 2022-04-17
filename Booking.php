<!DOCTYPE html>
<html>

<head>

<title>Scheduled Bookings</title>

<link rel="stylesheet" href="pgcss.css">

<style>

table,th
{
        text-align:left;
        //border:1px solid black;

}
td
{
        border:1px solid white;
}

</style>

</head>

<body style="background-color:whitesmoke;">

<header style="background-color:whitesmoke;" class="tpbtm">Welcome to Schedule Page</header>
<p class="tpbtm" style="text-align:right;background-color:whitesmoke;">Hi <?php session_start(); echo $_SESSION['user']; /*echo $_SESSION['toggle_val'];*/ ?>|<a href="/1147119/Trainer.php">Home</a>|<a href="/1147119/Session.php">Logout</a></p>

<div class="sdbr">
<ul>
<a href="/1147119/Booking.php" class="lnk" style="color:ghostwhite;"><li style="color:white;">Scheduled Bookings</li></a>
<a href="/1147119/Workout.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">My Workouts</li></a>
<a href="/1147119/Rank.php" class="lnk"><li style="color:lightslategrey;">Rank</li></a>
<a href="/1147119/leave.php" class="lnk"><li style="color:lightslategrey;">Leave</li></a>
<a href="/1147119/cpass.php" class="lnk"><li style="color:lightslategrey;">Change Password</li></a>
</ul>
</div>

<div class="tbl">
<table style="width:100%;">
<?php
include("dbcon.php");
$q="select * from Member_Details where currenttrainerid='".$_SESSION['userid']."'";
$q_check="select count(*) from Member_Details";
$res=mysqli_query($con,$q_check);
$row=mysqli_fetch_row($res);
if($row[0]!=0)
{
$res=mysqli_query($con,$q);
?>
<tr style="background-color:limegreen;color:white;">
<th>Member Id</th>
<th>Member Name</th>
<th>Member Email</th>
<th>Member Phone</th>
<th>Member Age</th>
<th>Member Gender</th>
</tr>
<?php
while($row=mysqli_fetch_row($res))
{
?>
<tr>
<td><?php echo "$row[0]";?></td>
<td><?php echo "$row[1]";?></td>
<td><?php echo "$row[2]";?></td>
<td><?php echo "$row[3]";?></td>
<td><?php echo "$row[4]";?></td>
<td><?php echo "$row[5]";?></td>
</tr>
<?php
}
}
mysqli_close($con);
?>

</table>
</div>
<footer>&copy Fitness House</footer>
</body>

</html>