<!DOCTYPE html>
<html>

<head>

<title>Rank</title>

<link rel="stylesheet" href="pgcss.css">

<style>

table,th
{
        text-align:left;
        //border:1px solid grey;

}
td
{
        border:1px solid white;
}

</style>

</head>

<body style="background-color:whitesmoke;">

<header style="background-color:whitesmoke;" class="tpbtm">Welcome to Rank Page</header>
<p class="tpbtm" style="text-align:right;background-color:whitesmoke;">Hi <?php session_start(); echo $_SESSION['user']; /*echo $_SESSION['toggle_val'];*/ ?>|<a href="/1147119/Trainer.php">Home</a>|<a href="/1147119/Session.php">Logout</a></p>

<div class="sdbr">
<ul>
<a href="/1147119/Booking.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">Scheduled Bookings</li></a>
<a href="/1147119/Workout.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">My Workouts</li></a>
<a href="/1147119/Rank.php" class="lnk"><li style="color:white;">Rank</li></a>
<a href="/1147119/leave.php" class="lnk"><li style="color:lightslategrey;">Leave</li></a>
<a href="/1147119/cpass.php" class="lnk"><li style="color:lightslategrey;">Change Password</li></a>
</ul>
</div>

<div class="tbl">
<table style="width:100%;">
<?php
include("dbcon.php");
$q="select TrainerID,name,experience from Trainer_Details order by experience";
$q_check="select count(*) from Member_Details";
$res=mysqli_query($con,$q_check);
$row=mysqli_fetch_row($res);
if($row[0]!=0)
{
$res=mysqli_query($con,$q);
?>
<tr style="background-color:limegreen;color:white;">
<th>Id</th>
<th>Name</th>
<th>Experience</th>
<th>Rank</th>
</tr>
<?php
while($row=mysqli_fetch_row($res))
{
        if($row[1]==$_SESSION['user'])
        {
?>
<tr style="font-weight:bold;font-style:italic;">
<?php
        }
        else
        {
?>
<tr>
<?php
        }
?>
<td><?php echo "$row[0]";?></td>
<td><?php echo "$row[1]";?></td>
<td><?php echo "$row[2]";?></td>
<td><?php

if($row[2]>0 && $row[2]<3)
{
        echo "Beginner";
}
elseif($row[2]<=5)
{
        echo "Intermediate";
}
else
{
        echo "Expert";
}

?></td>
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