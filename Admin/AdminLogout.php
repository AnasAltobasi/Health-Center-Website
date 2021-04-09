<?php
include "../Connection_DataBase.php";

session_start();

session_unset();

session_destroy();

mysqli_close($conn);

header("Location: ../index.php");

?>
