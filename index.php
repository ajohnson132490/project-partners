<?php
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

      $sql = "SELECT id FROM login_info WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("Location: /pages/welcome.php");
        exit;

      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>

   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="resources/styles.css">
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
          <div class="titleBlock">
            <div class="description">
              <h1 style="text-align:center">Project Partners</h1>
              <h3 style= "text-align:center">Finding the Larry Page to your Sergey Brin</h3>
            </div>
            <div class="logInForm">
              <form action = "" method = "post">
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Username:</p>
                <input type = "text" name = "username" class = "box"/>
                <br>
                <p style="font-size: 150%; padding: 0; margin: 0; align-self: left;">Password:</p>
                <input type = "password" name = "password" class = "box" />
                <br><br>
                <input type="submit" value="Log In">
                <div style = "font-size:11px; margin-top:10px">Not a member? <a href="pages/signup.php">Sign up</a></div>
              </form>
              <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error;?></div>
            </div>
        </div>
        </main>

   </body>
</html>
