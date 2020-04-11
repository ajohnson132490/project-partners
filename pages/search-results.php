<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('html/search-results.html');
   include('session.php');

<<<<<<< HEAD

    $query = $_GET['search'];
    $sql = "SELECT * FROM login_info WHERE username LIKE '$query'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row_cnt = mysqli_num_rows($result);

        // Create a results Box
    $limit = $row_cnt - 6;
    for ($x = $row_cnt; $x > $limit; $x--) {
    $resultsInsert = $doc->getElementById("results");

    //Insert a results Box
    $resultsBox = $doc->createElement('div');
    $resultsBox->setAttribute("class","resultsBox");
    $results_element_title = $doc->createElement('p', $row["title"]);
    $results_element_description = $doc->createElement('p', $row["description"]);

    $resultsInsert->appendChild($resultsBox);
    $resultsBox->appendChild($results_element_title);
    $resultsBox->appendChild($results_element_description);

    }
=======
   $query = $_GET['search'];
   $sql = "SELECT * FROM login_info WHERE username = '$query'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    echo $row['username'];
>>>>>>> 60438b9640299384bfef81ac698a1b56c400b072

    echo $doc->saveXML();
?>
