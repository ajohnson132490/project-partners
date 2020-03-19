<?php
   include('session.php');

   $ownr = $_SESSION['login_user'];
   $sql = "SELECT * FROM project_list WHERE owner = '$ownr'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<html>

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../resources/styles.css">
     <title>Project Partners</title>
   </head>

   <body>
     <header>
       <div class="menu">
         <div class="menuItem" id="Logo">
           <p>Logo</p>
         </div>
         <div class="menuItem" id="Home">
           <p>Home</p>
         </div>
         <div class="menuItem" id="Dashboard">
           <p>Dashboard</p>
         </div>
         <div class="menuItem" id="Other">
           <p>Something Else</p>
         </div>
         <div class="menuItem" id="Profile">
           <p>Profile</p>
         </div>
         <div class="menuItem" id="Create">
           <p style="font-size:275%; color:blue;"><a href="new-project.php">+</a></p>
         </div>
       </div>
     </header>
     <main>
       <div id = "projectBar" class="projectBar">
         <?php echo $row[0] ?>
       </div>
       <h1>Welcome <?php echo $_SESSION['login_user']; ?></h1>
       <p>First Name: <?php echo $_SESSION['login_firstName']?></p>
       <p>Last Name: <?php echo $_SESSION['login_lastName']?></p>
       <p>Email: <?php echo $_SESSION['login_email']?></p>
       <p>Profile Picture: <?php echo $_SESSION['login_profilePicture']?></p>
       <h2><a href = "logout.php">Sign Out</a></h2>
     </main>
   </body>
   <script src="../resources/global.js"></script>

</html>
