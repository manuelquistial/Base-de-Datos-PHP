<?php

/**
 * @author gencyolcu
 * @copyright 2016
 */
session_start();
$id=$_GET["id"];

$_SESSION["choix"]=$id;
header("location:index.php");
?>