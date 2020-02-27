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

   $myfirstname = mysqli_real_escape_string($db,$_POST['firstName']);
   $mylastname = mysqli_real_escape_string($db,$_POST['lastName']);
   $myusername = mysqli_real_escape_string($db,$_POST['username']);
   $mypassword = mysqli_real_escape_string($db,$_POST['password']);
   $myemail = mysqli_real_escape_string($db,$_POST['email']);
   $myconfirmpassword = mysqli_real_escape_string($db,$_POST['confirmPassword']);
   $myprofilepicture = mysqli_real_escape_string($db,$_POST['profilePicture']);

   if($mypassword == $myconfirmpassword) {
       if ($myfirstname != '' && $mylastname != '' && $myusername != '' && $mypassword != '' && $myemail != '') {
            //Insert the info into database
            $exec = "INSERT INTO login_info (id, firstName, lastName, username, password, email, profilePicture)
            VALUES (DEFAULT, '$myfirstname', '$mylastname', '$myusername', '$mypassword', '$myemail', '$myprofilepicture')";
            //Making Sure It Worked
            if ($db->query($exec) === TRUE) {
              //Go to the welcome page (Soon to be the dashboard)
             header("Location: /pages/profile.php");
           } else {
            echo "Error: " . $exec . "<br>" . $db->error;
          }
       }
     else {
      $error = "Please fill in all fields";
     }
   }
   else {
      $error = "Your passwords do not match";
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
          <div id="signUpForm" class="signUpForm">
              <form action = "" method = "post">
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">First Name:</p>
                <input type = "text" name = "firstName" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Last Name:</p>
                <input type = "text" name = "lastName" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Username:</p>
                <input type = "text" name = "username" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Password:</p>
                <input type = "password" name = "password" class = "box" />
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Confirm Password:</p>
                <input type = "password" name = "confirmPassword" class = "box" />
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Email:</p>
                <input type = "email" name = "email" class = "box" />
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Upload Profile Picture:</p>
                <input type = "file" name = "profilePicture" class = "box" />
                <br>
                <input type="submit" value="Sign Up">
              </form>
              <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
          </div>
        </main>
   </body>
</html>
