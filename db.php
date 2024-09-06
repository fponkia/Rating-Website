<?php

// $uri = "mysql://avnadmin:AVNS_adblRjpdBDLOf_-yb1D@mysql-c4bd69a-joke-rating-website.g.aivencloud.com:11937/defaultdb?ssl-mode=REQUIRED";

// $fields = parse_url($uri);

// build the DSN including SSL settings

$db_user = "avnadmin";
$db_pwd = "AVNS_adblRjpdBDLOf_-yb1D";
$attr = "mysql:";
$attr .= "host=mysql-c4bd69a-joke-rating-website.g.aivencloud.com";
$attr .= ";port=11937";
$attr .= ";dbname=defaultdb";
$attr .= ";sslmode=verify-ca;sslrootcert='D:/absolute/path/to/ssl/certs/ca.pem'";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($attr, "avnadmin", "AVNS_adblRjpdBDLOf_-yb1D");

    $stmt = $db->query("SELECT VERSION()");
    // print($stmt->fetch()[0]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}