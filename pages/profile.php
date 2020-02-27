<?php
   include('session.php');
?>
<html>

   <head>
      <title>Welcome</title>
   </head>

   <body>
    <h1>Welcome <?php echo $_SESSION['login_user']; ?></h1>
    <p>First Name: <?php echo $_SESSION['login_firstName']?></p>
    <p>Last Name: <?php echo $_SESSION['login_lastName']?></p>
    <p>First Email: <?php echo $_SESSION['login_email']?></p>
    <p>First Profile Picture: <?php echo $_SESSION['login_profilePicture']?></p>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
