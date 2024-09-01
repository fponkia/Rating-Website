<?php

$uri = "mysql://avnadmin:AVNS_adblRjpdBDLOf_-yb1D@mysql-c4bd69a-joke-rating-website.g.aivencloud.com:11937/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert='D:/absolute/path/to/ssl/certs/ca.pem'";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    $stmt = $db->query("SELECT VERSION()");
    print($stmt->fetch()[0]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}