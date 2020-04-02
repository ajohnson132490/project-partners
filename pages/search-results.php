<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('html/profile.html');
   include('session.php');

   //Getting the data for the current project
   $ownr = $_SESSION['login_user'];
   $prjct = "$ownr projects";

    // Create a result Box
    for ($x = $row_cnt; $x >= $row_cnt; $x--) {

    $resultInsert = $doc->getElementById("results");

    $sql = "SELECT * FROM `$prjct` WHERE id=$x";
    $result = mysqli_query($db,$sql2);
    $row = mysqli_fetch_array($result2,MYSQLI_ASSOC);

    //Insert a project Box
    $resultBox = $doc->createElement('div');
    $resultBox->setAttribute("class","resultBox");
    $project_element_title = $doc->createElement('p', $row2["title"]);
    $project_element_description = $doc->createElement('p', $row2["description"]);

    $projectInsert->appendChild($projectBox);
    $projectBox->appendChild($project_element_title);
    $projectBox->appendChild($project_element_description);

    }

    echo $doc->saveXML();
?>
