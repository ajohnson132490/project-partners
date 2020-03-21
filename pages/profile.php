<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('html/profile.html');
   include('session.php');

   //Getting the data for the current project
   $ownr = $_SESSION['login_user'];
   $prjct = "$ownr projects";
   $sql = "SELECT * FROM `$prjct`";
   $result = mysqli_query($db,$sql);
   $row_cnt = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


    ///Project Side Bar
    // Create an insertion point for the Projects element
    $projectInsert = $doc->getElementById("projects");

    // Create a project Box
    for ($x = $row_cnt; $x > 0; $x--) {

    $sql2 = "SELECT * FROM `$prjct` WHERE id=$x";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

    //Insert a project Box
    $projectBox = $doc->createElement('div');
    $projectBox->setAttribute("class","projectBox");
    $project_element_title = $doc->createElement('p', $row2["title"]);
    $project_element_description = $doc->createElement('p', $row2["description"]);

    $projectInsert->appendChild($projectBox);
    $projectInsert->appendChild($project_element_title);
    $projectInsert->appendChild($project_element_description);

    }

    ///Inserting User data to display
    //Creating an insertion point for the user data
    $bannerInsert = $doc->getElementById("welcomeBanner");
    $fNameInsert = $doc->getElementById("fNameSpace");
    $lNameInsert = $doc->getElementById("lNameSpace");
    $emailInsert = $doc->getElementById("emailSpace");
    $profilePictureInsert = $doc->getElementById("profilePictureSpace");

    $bannerInsert->appendChild($doc->createElement('h1', $_SESSION["login_user"]));
    $fNameInsert->appendChild($doc->createElement('p', $_SESSION["login_firstName"]));
    $lNameInsert->appendChild($doc->createElement('p', $_SESSION["login_lastName"]));
    $emailInsert->appendChild($doc->createElement('p', $_SESSION["login_email"]));
    $profilePictureInsert->appendChild($doc->createElement('img', $_SESSION["login_profilePicture"]));

    echo $doc->saveXML();
?>
