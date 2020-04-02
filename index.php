<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('pages/html/index.html');
   include("pages/config.php");
   session_start();
   // Check connection
    if (mysqli_connect_errno())
    {
        echo "Database connection failed.";
    }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM login_info WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

        $_SESSION['login_firstName'] = $row["firstName"];
        $_SESSION['login_lastName'] = $row["lastName"];
        $_SESSION['login_email'] = $row['email'];
        $_SESSION['login_profilePicture'] = $row['profilePictureData'];
        $_SESSION['login_user'] = $row['username'];


        header("Location: /pages/profile.php");
        exit;

      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
   echo $doc->saveXML();
?>
