<?php
$doc = new DOMDocument();

$doc->loadHTMLFile('html/signup.html');
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
          $sql = "SELECT * FROM login_info WHERE email = '$myemail' or username = '$myusername'";
          $result = mysqli_query($db,$sql);

          if (mysqli_num_rows($result)==0) {
            //Insert the info into database
            $exec = "INSERT INTO login_info (id, firstName, lastName, username, password, email, profilePicture)
            VALUES (DEFAULT, '$myfirstname', '$mylastname', '$myusername', '$mypassword', '$myemail', '$myprofilepicture')";
            //Making Sure It Worked
            if ($db->query($exec) === TRUE) {
              //Create a datatable for people you're following
              $followingTable = "$myusername following";
              $db->query("CREATE TABLE `".$followingTable."` (
                id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )");

              //Create a datatable for people who follow you
              $followerTable = "$myusername followers";
              $db->query("CREATE TABLE `".$followerTable."` (
                id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )");

              //Create a datatable for projects
              $projectTable = "$myusername projects";
              $db->query("CREATE TABLE `".$projectTable."` (
                id INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                owner VARCHAR(100) NOT NULL,
                title VARCHAR(50) NOT NULL,
                description VARCHAR(5000),
                photo1 VARCHAR(255),
                photo2 VARCHAR(255),
                photo3 VARCHAR(255),
                photo4 VARCHAR(255),
                photo5 VARCHAR(255),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )");

              //Go to the welcome page (Soon to be the dashboard)
             header("Location: profile.php");
           }
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
echo $doc->saveXML();
?>
