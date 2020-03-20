<?php
   $doc = new DOMDocument();

   $doc->loadHTML('<html>

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
       <p>First Name: </p>
       <p>Last Name: </p>

       <div class="projectBar" id="projectsBar">
       <p id="projects">Insert Point</p>
       </div>



    </main>
   </body>
</html>');
   include('session.php');

   //Getting the data for the current project
   $ownr = $_SESSION['login_user'];
   $prjct = "$ownr projects";
   $sql = "SELECT * FROM `$prjct`";
   $result = mysqli_query($db,$sql);
   $row_cnt = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

       // Create a paragraph element
    $insert = $doc->getElementById("projects");
  
    // Create a project Box
    for ($x = $row_cnt; $x > 0; $x--) {

    $sql2 = "SELECT * FROM `$prjct` WHERE id=$x";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

    //Insert a project Box
    $project_element = $doc->createElement('p', $row2["title"]);
    $insert->appendChild($project_element);
    }
    echo $doc->saveXML();
?>
