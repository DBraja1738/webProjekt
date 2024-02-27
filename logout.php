<?php

session_start();
//izbrisi sve session varijable
$_SESSION=array();

session_destroy();

header("Location: index.html");
exit();
?>