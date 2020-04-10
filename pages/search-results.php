<?php
   $doc = new DOMDocument();

   $doc->loadHTMLFile('html/search-results.html');
   include('session.php');

   $query = $_GET['search'];
   $sql = "SELECT * FROM login_info WHERE username = '$query'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    echo $row['username'];

    echo $doc->saveXML();
?>
