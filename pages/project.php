<?php
   include('session.php');

   //Getting the data for the current project
   $ownr = $_SESSION['login_user'];
   $prjct = $_POST['current_project'];
   $sql = "SELECT * FROM project_list WHERE owner = '$ownr' and title = '$prjct'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   //Local Project data
   $mytitle = $row["title"];
   $mydescription = $row["description"]


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
           <p style="font-size:275%; color:blue; margin-top:62.5%;">+</p>
         </div>
       </div>
     </header>
     <main>
       <p>First Name: <?php echo $mytitle?></p>
       <p>Last Name: <?php echo $mydescription?></p>

  

    </main>
   </body>
</html>
