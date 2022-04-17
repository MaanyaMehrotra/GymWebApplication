<?php
session_start();
include("dbcon.php");
if(isset($_POST['submit']))
{
        if($_POST['usr']!=""&&$_POST['pass']!=""&&$_POST['role']!="#")
        {
                $usrnm=$_POST['usr'];
                $pass=$_POST['pass'];
                $role=$_POST['role'];
                $usr_regx="/^[a-zA-Z]+$/";
                $pass_regx="/^[a-z0-9]*[@#!_%$][a-z0-9]*$/";
                /*$qry="select `TrainerID`,`password`,`name` from `Trainer_Details` where `name`='".$usrnm."'";
                $qry_check="select count(*) from `Trainer_Details` where `name`='".$usrnm."'";
              */if(preg_match($usr_regx,$usrnm))
                {
                        if(preg_match($pass_regx,$pass))
                        {
                                if($role=="Trainer")
                                {
                                                $qry="select `TrainerID`,`password`,`name` from `Trainer_Details` where `name`='".$usrnm."'";
                                                $qry_check="select count(*) from `Trainer_Details` where `name`='".$usrnm."'";
                                                $res=mysqli_query($con,$qry_check);
                                                $row=mysqli_fetch_row($res);
                                                //echo "$row[0]";
                                                if($row[0]!=0)
                                                {
                                                        $res=mysqli_query($con,$qry);
                                                        $row=mysqli_fetch_row($res);
                                                        if($row[1]==$pass)
                                                        {
                                                                $_SESSION['user']= $row[2];
                                                                $_SESSION['userid']= $row[0];
                                                                $_SESSION['toggle_val']=1;
                                                                $_SESSION['toggle']=0;
                                                                //echo "Hi ".$_SESSION['user'];
                                                                header("location: Trainer.php");
                                                        }
                                                        else
                                                        {
                                                                $_SESSION['alert']="Please enter the correct Password!";
                                                                header("location: Login.php");
                                                        }
                                                }
                                                else
                                                {
                                                        $_SESSION['alert']="You are not authorized to login as a Trainer!";
                                                        header("location: Login.php");
                                                }
                                  }
                                elseif($role=="Member")
                                  {
                                        $qry="select `MemberID`,`password`,`username` from `Member_Details` where `username`='".$usrnm."'";
                                        $qry_check="select count(*) from `Member_Details` where `username`='".$usrnm."'";
                                        $res=mysqli_query($con,$qry_check);
                                        $row=mysqli_fetch_row($res);
                                        if($row[0]>0)
                                        {
                                                $qry="select `MemberID`,`password`,`username` from `Member_Details` where `username`='".$usrnm."'";
                                                $res=mysqli_query($con,$qry);
                                                $row=mysqli_fetch_row($res);
                                                if($row[1]==$pass)
                                                {
                                                        //echo "Logged in successfully";
                                                        $_SESSION['user']=$row[2];
                                                        header("location:mhome.php");
                                                }
                                                else
                                                {
                                                        $_SESSION['alert']="Please enter the correct Password!";
                                                        header("location: Login.php");
                                                }
                                        }
                                        else
                                        {
                                                $_SESSION['alert']="You are not authorized to login as a Member!";
                                                header("location: Login.php");
                                        }
                                   }
                                elseif($role="Admin")
                                   {
                                        if($usrnm=="Admin")
                                        {
                                                if($pass=="Admin@FH123")
                                                {
                                                        header("location: ahome.php");
                                                }
                                                else
                                                {
                                                        $_SESSION['alert']="Please enter the correct Password!";
                                                        header("location: Login.php");
                                                }
                                        }
                                        else
                                        {
                                                $_SESSION['alert']="You are not authorized to login as an Admin!";
                                                header("location: Login.php");
                                        }
                                   }
                        }
                        else
                        {
                                $_SESSION['alert']="Enter valid Password";
                                header("location: Login.php");
                        }
                }
                else
                {
                        $_SESSION['alert']="Enter valid username";
                        header("location: Login.php");
                }
        }
        else
        {
                $_SESSION['alert']="Please fill all the fields!";
                header("location: Login.php");
        }
}
?>