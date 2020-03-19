<?php
include("config.php");
session_start();
// Check connection
 if (mysqli_connect_errno())
 {
     echo "Database connection failed.";
 }

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $owner = $_SESSION['login_user'];
   $mytitle = mysqli_real_escape_string($db,$_POST['title']);
   $mydescription = mysqli_real_escape_string($db,$_POST['description']);
   $myphoto1 = mysqli_real_escape_string($db,$_POST['photo1']);
   $myphoto2 = mysqli_real_escape_string($db,$_POST['photo2']);
   $myphoto3 = mysqli_real_escape_string($db,$_POST['photo3']);
   $myphoto4 = mysqli_real_escape_string($db,$_POST['photo4']);
   $myphoto5 = mysqli_real_escape_string($db,$_POST['photo5']);

    //Insert the info into database
    $exec = "INSERT INTO project_list (id, owner, title, description, photo1, photo2, photo3, photo4, photo5)
    VALUES (DEFAULT, '$owner', '$mytitle', '$mydescription', '$myphoto1', '$myphoto2', '$myphoto3', '$myphoto4', '$myphoto5')";
    //Making Sure It Worked
    if ($db->query($exec) === TRUE) {
      //Go to the welcome page (Soon to be the dashboard)
      header("Location: /pages/profile.php");
    } else {
      echo "Error: " . $exec . "<br>" . $db->error;
      }
    }
?>

<html>

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../resources/styles.css">
     <title>Project Partners</title>
   </head>

   <body bgcolor = "#FFFFFF">
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
       </div>
     </header>

        <main>
              <form action = "" method = "post">
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Title:</p>
                <input type = "text" name = "title" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Description</p>
                <input type = "text" name = "description" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Upload Pictures</p>
                <input type = "file" name = "photo1" class = "box"/>
                <input type = "file" name = "photo2" class = "box"/>
                <input type = "file" name = "photo3" class = "box"/>
                <input type = "file" name = "photo4" class = "box"/>
                <input type = "file" name = "photo5" class = "box"/>
                <br>

                <input type="submit" value="Create">
              </form>
              <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
        </main>
   </body>
</html>
