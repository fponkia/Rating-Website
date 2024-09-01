<?php

// $uri = "mysql://avnadmin:AVNS_adblRjpdBDLOf_-yb1D@mysql-c4bd69a-joke-rating-website.g.aivencloud.com:11937/defaultdb?ssl-mode=REQUIRED";

// $fields = parse_url($uri);

// build the DSN including SSL settings

$db_user = "avnadmin";
$db_pwd = "AVNS_adblRjpdBDLOf_-yb1D";
$conn = "mysql:";
$conn .= "host=mysql-c4bd69a-joke-rating-website.g.aivencloud.com";
$conn .= ";port=11937";
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert='D:/absolute/path/to/ssl/certs/ca.pem'";

try {
    $db = new PDO($conn, "avnadmin", "AVNS_adblRjpdBDLOf_-yb1D");

    $stmt = $db->query("SELECT VERSION()");
    // print($stmt->fetch()[0]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}