<?php

$_SESSION['id'] = NULL;
$_SESSION['nom'] = NULL;

session_destroy();

header("location:index.php")


?>