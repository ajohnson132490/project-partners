<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('html/search-results.html');
   include('session.php');


    $query = $_GET['search'];

    $sqls = "SELECT * FROM login_info";
    $usrResult = mysqli_query($db,$sqls);
    $user = mysqli_fetch_array($usrResult,MYSQLI_ASSOC);
    $user_cnt = mysqli_num_rows($usrResult);

   for ($z = 0; $z < 1000; $z++) {

    $sqls2 = "SELECT * FROM login_info WHERE id = '$z'";
    $usrResult2 = mysqli_query($db,$sqls2);
    $user2 = mysqli_fetch_array($usrResult2,MYSQLI_ASSOC);
    $user_cnt2 = mysqli_num_rows($usrResult2);

    if ($user2["username"] != "") {
        $currentCheck = $user2["username"];
        $userDataBase = "$currentCheck projects";
        $sql2 = "SELECT * FROM $userDataBase WHERE title LIKE '%{$query}%'";
        $result2 = mysqli_query($db,$sql2);
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $row_cnt2 = mysqli_num_rows($result2);

        echo $sql2;
        echo $row_cnt2;

        for ($y = 0; $y < $row_cnt2; $y++) {

        $resultsInsert = $doc->getElementById("results");

        //Insert a results Box
            $resultsBox = $doc->createElement('div');
            $resultsBox->setAttribute("class","resultsBox");
            $results_element_title = $doc->createElement('p', $row2["title"]);
            $results_element_description = $doc->createElement('p', $row2["description"]);

            $resultsInsert->appendChild($resultsBox);
            $resultsBox->appendChild($results_element_title);
            $resultsBox->appendChild($results_element_description);

        }
    }

   }



    $sql = "SELECT * FROM login_info WHERE username LIKE '%{$query}%'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row_cnt = mysqli_num_rows($result);

        // Create a results Box
    for ($x = 0; $x < $row_cnt; $x++) {
    $resultsInsert = $doc->getElementById("results");

    //Insert a results Box
    $resultsBox = $doc->createElement('div');
    $resultsBox->setAttribute("class","resultsBox");
    $results_element_firstName = $doc->createElement('p', $row["firstName"]);
    $results_element_lastName = $doc->createElement('p', $row["lastName"]);

    $resultsInsert->appendChild($resultsBox);
    $resultsBox->appendChild($results_element_firstName);
    $resultsBox->appendChild($results_element_lastName);

    }

    echo $doc->saveXML();
?>
