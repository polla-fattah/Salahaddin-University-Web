<?php
session_start();
$url="index.htm";
session_destroy();
header("Location:$url");

?>
