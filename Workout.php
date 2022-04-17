<!DOCTYPE html>
<html>

<head>

<title>My Workouts</title>

<link rel="stylesheet" href="pgcss.css">

<style>

table,th,td
{
        text-align:left;
        border:1px solid black;
        //padding:10px 0px 10px 10px;

}

</style>

</head>

<body style="background-color:whitesmoke;">

<header style="background-color:whitesmoke;" class="tpbtm">Welcome to My Workouts Page</header>
<p class="tpbtm" style="text-align:right;background-color:whitesmoke;">Hi <?php session_start(); echo $_SESSION['user']; /*echo $_SESSION['toggle_val'];*/ ?>|<a href="/1147119/Trainer.php">Home</a>|<a href="/1147119/Session.php">Logout</a></p>


<div class="sdbr">
<ul>
<a href="/1147119/Booking.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">Scheduled Bookings</li></a>
<a href="/1147119/Workout.php" class="lnk" style="color:ghostwhite;"><li style="color:white;">My Workouts</li></a>
<a href="/1147119/Rank.php" class="lnk"><li style="color:lightslategrey;">Rank</li></a>
<a href="/1147119/leave.php" class="lnk"><li style="color:lightslategrey;">Leave</li></a>
<a href="/1147119/cpass.php" class="lnk"><li style="color:lightslategrey;">Change Password</li></a>
</ul>
</div>

<div class="tbl">
<form action="Delete_Rows.php" method="POST">
<?php
include("dbcon.php");
$q="select A.AllocationID, A.Trainerid, B.WorkoutName from TrainerWorkout_Allocation A inner join Workout_Details B on A.WorkoutID=B.WorkoutID order by A.AllocationID";
$q_check="select count(*) from TrainerWorkout_Allocation";
$res=mysqli_query($con,$q_check);
$row=mysqli_fetch_row($res);
$flag=$row[0];
if($row[0]!=0)
{
?>

        <table style="border:none;width:100%;">
        <tr style="background-color:limegreen;color:white;">
        <th style="border:white;">Allocation Id</th><th style="border:white;">Trainer Id</th><th style="border:white;">Workout Name</th><th style="border:white;">Choose</th>
        </tr>

<?php
        $res=mysqli_query($con,$q);
        while($row=mysqli_fetch_row($res))
        {
?>
        <tr style="border:none;">
        <td style="border:1px solid white;"> <?php echo "$row[0]"; ?></td><td style="border:1px solid white;"> <?php echo "$row[1]"; ?></td><td style="border:1px solid white;"> <?php echo "$row[2]"; ?></td><td style="border:1px solid white;"> <input type="checkbox" name="del[]" value="<?php echo "$row[0]"; ?>"> </td>
        </tr>
<?php
        }
?>
        </table>
<?php
        if($_SESSION['toggle']==1)
        {
?>
        <input type="submit" name="delete_button" value="Delete" style="background-color:grey;border-radius:4px;color:white;">
<?php
        }
        else
        {
?>
        <input type="submit" name="delete_button" value="Delete" style="background-color:limegreen;border-radius:4px;color:white;">
<?php
        }
}
if($flag==0)
{
        if($_SESSION['toggle']==1)
        {
?>
                <input type="submit" name="add" value="Add a Workout" style="background-color:grey;border-radius:4px;color:white;">
<?php
        }
        else
        {
?>
                <input type="submit" name="add" value="Add a Workout" style="background-color:limegreen;border-radius:4px;color:white;">
<?php
        }
}
else
{
        if($_SESSION['toggle']==1)
        {
?>
                <input type="submit" name="add" value="Add" style="background-color:grey;border-radius:4px;color:white;">
<?php
        }
        else
        {
?>
                <input type="submit" name="add" value="Add" style="background-color:limegreen;border-radius:4px;color:white;">
<?php
        }
}
?>
</form>


<?php
if($_SESSION['toggle']==1)
{
?>
<p style="text-align:center;font-weight:bold;font-size:20px;">Add Workout</p>
<table style="margin:auto;">
<tr>
<form action="Insert_Row.php" method="POST">
<td>Trainer Id</td><td><input type="text" name="tr_id" value="<?php echo $_SESSION['userid']; ?>" readonly style="color:white;background-color:grey;"></td>
</tr>
<tr>
<td>Workout Name</td>
<td>
<select name="wkt_name">
<option selected hidden disabled>--select a Workout--</option>
<?php
$q="select WorkoutName from Workout_Details";
$res=mysqli_query($con,$q);
while($row=mysqli_fetch_row($res))
{
?>
<option><?php echo "$row[0] <br>"; ?></option>
<?php
}
?>

</select>
</td>
</tr>
</table>

<div style="text-align:center;">
<input type="submit" name="add_col" value="Add Workout" style="background-color:limegreen;border-radius:4px;color:white;">
</div>
</form>
<?php
mysqli_close($con);
}
?>
</div>
<?php
if(isset($_SESSION['alert']))
{
?>
<p class="tpbtm" style="background-color:whitesmoke;"><?php echo $_SESSION['alert']; unset($_SESSION['alert']);?></p>
<?php
}
?>
<footer>&copy Fitness House</footer>
</body>
</html>