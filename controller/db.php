<?php
$db_autho_user = "root";
$db_autho_pass = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=hyperlocal', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

// try {
//     $dbh = new PDO('mysql:host=localhost;dbname=hyperlocal', "root", "");
//     foreach($dbh->query('SELECT * from login') as $row) {
//         var_dump($row);
//     }
//     $dbh = null;
// } catch (PDOException $e) {
//     print "Error!: " . $e->getMessage() . "<br/>";
//     die();
// }

?>
