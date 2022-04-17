<?php
session_start();
include("dbcon.php");
/*$wkt=$_POST['wkt_name'];
$id=$_POST['tr_id'];
echo "$id";
echo "$wkt";

*/
if(isset($_POST['add_col']))
{
        $id=$_POST['tr_id'];
        $wkt=$_POST['wkt_name'];
        $q="select `WorkoutID` FROM `Workout_Details` where `WorkoutName`='".$wkt."'";

        $res=mysqli_query($con,$q);
        $row=mysqli_fetch_row($res);
        $val=$row[0];
        $q_check="select count(*) from `TrainerWorkout_Allocation` where `Trainerid`='".$id."' and `WorkoutID`='".$val."'";
        $qry="insert into `TrainerWorkout_Allocation`(`TrainerId`,`WorkoutID`) values('".$id."','".$val."')";
        $res=mysqli_query($con,$q_check);
        $row=mysqli_fetch_row($res);
        if($row[0]==0)
        {
                if($res=mysqli_query($con,$qry))
                {
                        $_SESSION['alert']="Workout Added Successfully";
                        header("location: Workout.php");
                }
        }
        else
        {
                $_SESSION['alert']="Workout Already Added";
                header("location: Workout.php");
        }
}

?>