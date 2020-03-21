<?php
$doc = new DOMDocument();

$doc->loadHTMLFile('html/new-project.html');
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
   $prjct = "$owner projects";
   $mytitle = mysqli_real_escape_string($db,$_POST['title']);
   $mydescription = mysqli_real_escape_string($db,$_POST['description']);
   $myphoto1 = mysqli_real_escape_string($db,$_POST['photo1']);
   $myphoto2 = mysqli_real_escape_string($db,$_POST['photo2']);
   $myphoto3 = mysqli_real_escape_string($db,$_POST['photo3']);
   $myphoto4 = mysqli_real_escape_string($db,$_POST['photo4']);
   $myphoto5 = mysqli_real_escape_string($db,$_POST['photo5']);

    //Insert the info into database
    $exec = "INSERT INTO `$prjct` (id, owner, title, description, photo1, photo2, photo3, photo4, photo5)
    VALUES (DEFAULT, '$owner', '$mytitle', '$mydescription', '$myphoto1', '$myphoto2', '$myphoto3', '$myphoto4', '$myphoto5')";
    //Making Sure It Worked
    if ($db->query($exec) === TRUE) {
      //Go to the welcome page (Soon to be the dashboard)
      header("Location: /pages/profile.php");
    } else {
      echo "Error: " . $exec . "<br>" . $db->error;
      }
    }
    echo $doc->saveXML();
?>
