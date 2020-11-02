<?php
require_once("../init/_init.php");

$arrayFiles = array();

foreach ($_SESSION["files"] as $index => $file) {
    $arrayFiles[$index]["id"] = hash("md5", $file);
    $arrayFiles[$index]["video"] = $file;
}


echo $twig->render("head.html");
echo $twig->render("player.html", ["files" => $arrayFiles]);