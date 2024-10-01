<?php
session_start();
session_unset();
session_destroy();
setcookie("user_id", 0, time() - 3600, "/");
header("Location: homepage.php");

exit();
?>
