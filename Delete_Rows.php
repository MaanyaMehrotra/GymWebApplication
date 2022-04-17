<?php
session_start();
include("dbcon.php");
if(isset($_POST['delete_button']))
{
        if(isset($_POST['del']))
        {
                $str=implode(',',$_POST['del']);
                $qry="delete from TrainerWorkout_Allocation where AllocationID IN($str)";
                if($res=mysqli_query($con,$qry))
                {
                        $_SESSION['alert']="Successfully Deleted";
                        header("location: Workout.php");
                }
        }
        else
        {
                $_SESSION['alert']="Select atleast one check box";
                header("location: Workout.php");
        }
}
elseif(isset($_POST['add']))
{
        $_SESSION['toggle_val']++;
        if($_SESSION['toggle_val']%2==1)
        {
                $_SESSION['toggle']=0;
        }
        else
        {
                $_SESSION['toggle']=1;
        }
        header("location: Workout.php");
}
?>