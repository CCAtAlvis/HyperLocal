<?php

// try {
//    $dbh = new PDO('pgsql:host=localhost;port=5432;dbname=###;user=###;password=##');
//    echo "PDO connection object created";
// }
// catch(PDOException $e)
// {
//     echo $e->getMessage();
// }
pg_connect("host=localhost dbname=dbname user=username password=password")
    or die("Can't connect to database".pg_last_error());
?>
