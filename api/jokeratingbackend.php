<?php

session_start();

require_once("db.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

try{
    $db = new PDO($attr, $db_user, $db_pwd, $options);
    $query = "SELECT * FROM Users_Info WHERE user_id = '$_COOKIE["user_id"]'";

    $result = $db -> query($query);

    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["first_name"] = $row["first_name"];
    $_SESSION["last_name"] = $row["last_name"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["username"] = $row["username"];
    $_SESSION["avatar"] = $row["avatar"];
    $_SESSION["dob"] = $row["dob"];

}catch(PDOException $e){
    throw new Exception($e -> getMessage(), (int)$e -> getCode());
}

$rating = $_GET["rating"];
$uid = $_SESSION["user_id"];
$joke_id = $_SESSION["joke_id"];

$jsonArray = array();

try{
    $db = new PDO($attr, $db_user, $db_pwd, $options);

    $query = "SELECT COUNT(*) FROM User_Ratings WHERE user_id = '$uid' AND joke_id = '$joke_id'";
    $result = $db -> query($query);
        
    if($result -> fetchColumn(0)){
        $query = "UPDATE User_Ratings SET rating = '$rating' WHERE user_id = '$uid' AND joke_id = '$joke_id'";
        $result = $db -> exec($query);
    
        $jsonArray[] = $rating;
    }

    $query = "SELECT AVG(User_Ratings.rating) AS Average_Rating FROM User_Ratings LEFT JOIN Joke_Posts ON (User_Ratings.joke_id = Joke_Posts.joke_id) WHERE Joke_Posts.joke_id = '$joke_id' GROUP BY Joke_Posts.joke_id";
    $result = $db -> query($query);
    $match = $result -> fetchColumn(0);

    $jsonArray[] = $match;

    echo json_encode($jsonArray);
    
    $db = null;
    $query = null;
    $result = null;

}
catch(PDOException $e){
    throw new PDOException($e -> getMessage(), (int) $e-> getCode());
}


?>