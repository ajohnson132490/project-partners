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


    // Create a project Box
    $limit = $row_cnt - 6;
    for ($x = $row_cnt; $x > $limit; $x--) {
    $projectInsert = $doc->getElementById("projects");

    $sql2 = "SELECT * FROM `$prjct` WHERE id=$x";
    $result2 = mysqli_query($db,$sql2);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

    //Insert a project Box
    $projectBox = $doc->createElement('div');
    $projectBox->setAttribute("class","projectBox");
    $project_element_title = $doc->createElement('p', $row2["title"]);
    $project_element_description = $doc->createElement('p', $row2["description"]);

    $projectInsert->appendChild($projectBox);
    $projectBox->appendChild($project_element_title);
    $projectBox->appendChild($project_element_description);

    }

    ///Inserting User data to display
    //Creating an insertion point for the user data
    $fNameInsert = $doc->getElementById("fNameSpace");
    $profilePictureInsert = $doc->getElementById("profilePictureSpace");

    $userData = "SELECT * FROM login_info WHERE username = '$ownr'";
    $dataResult = mysqli_query($db,$sql);
    $userDataRow = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $fNameInsert->appendChild($doc->createElement('p', $_SESSION["login_firstName"]));
    $profilePictureInsert->appendChild($doc->createElement('img', $_SESSION["login_profilePicture"]));

    echo $doc->saveXML();
?>
