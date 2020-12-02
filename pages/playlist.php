<?php
require_once("../init/_init.php");

$arrayFiles = array();
$videoFiles = scandir("../storage/videos");

if (isset($_POST["playlistFile"])) {
    $_SESSION["files"] = $_POST["playlistFile"];
    $_SESSION["file_index"] = 0;
    $_SESSION["playing"] = false;
    header("location: player.php");
}

foreach ($videoFiles as $file) {
    if ($file != "." && $file != "..") {
        $arrayFiles[] = $file;
    }
}

echo $twig->render("head.html");

echo $twig->render("playlist.html", ["files" => $arrayFiles]);

echo $twig->render("foot.html");