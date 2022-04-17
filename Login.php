<!DOCTYPE html>
<html>

<head>
<title>Login</title>
<style>
header
{
        background-color:blue;
        color:white;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        text-align:center;
        padding: 0% 0% 2vw 0%;
        font-size: 3vw;
}
div
{
        //background-color:orange;
        width:100%;
        height:8vw;
}
table
{
        background-color:white;
        padding: 1vw;
        margin:auto;
}
footer
{
        position:fixed;
        bottom:0;
        left:0;
        width:100%;
        background-color:blue;
        color:white;
        text-align:center;
        padding: 2vw 0% 0% 0%;
        font-size: 3vw;
}
</style>
</head>

<body>

<header>Welcome to Fitness House</header>
<p style="text-align:center;font-size:35px;padding:90px 0px 0px 0px;"><b>Login</b></p>
<div>

<form action="validation.php" method="post">
<table>
<tr>
<td><b>Username</b></td>
<td><input type="text" name="usr" placeholder="Enter Username"></td>
</tr>

<tr>
<td><b>Password</b></td>
<td><input type="password" name="pass" placeholder="Enter Password" minlength=3></td>
</tr>

<tr>
<td><b>Role</b></td>
<td>
<select name="role">
<option selected hidden disabled>--select--</option>
<option>Admin</option>
<option>Member</option>
<option>Trainer</option>
</select>
</td>
</tr>

<tr>
<td><input type="submit" name="submit" value="Login" style="background-color:green;color:white"></td>
<td><input type="reset" value="Reset" style="background-color:orange;color:white"></td>
</tr>

</table>
</form>
</div>
<?php
session_start();
if(isset($_SESSION['alert']))
{
?>
        <p style="background-color:whitesmoke;font-size:25px"><?php echo $_SESSION['alert']; unset($_SESSION['alert']); ?></p>
<?php
}
?>
<footer>&copy Fitness House</footer>

</body>

</html>