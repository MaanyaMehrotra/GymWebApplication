<!DOCTYPE html>
<html>

<head>

<title>Trainer Home Page</title>

<link rel="stylesheet" href="pgcss.css">

</head>

<body style="background-color:whitesmoke;">

<header style="background-color:whitesmoke;" class="tpbtm">Welcome to Trainer Home Page</header>
<p class="tpbtm" style="background-color:whitesmoke;text-align:right;">Hi <?php session_start(); echo $_SESSION['user']; ?>|<a href="/1147119/Notification.php">Messages</a>|<a href="/1147119/Session.php">Logout</a></p>

<div class="sdbr">
<ul>
<a href="/1147119/Booking.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">Scheduled Bookings</li></a>
<a href="/1147119/Workout.php" class="lnk" style="color:ghostwhite;"><li style="color:lightslategrey;">My Workouts</li></a>
<a href="/1147119/Rank.php" class="lnk"><li style="color:lightslategrey;">Rank</li></a>
<a href="/1147119/leave.php" class="lnk"><li style="color:lightslategrey;">Leave</li></a>
<a href="/1147119/cpass.php" class="lnk"><li style="color:lightslategrey;">Change Password</li></a>
</ul>
</div>

<div>
</div>
<footer>&copy Fitness House</footer>
</body>

</html>