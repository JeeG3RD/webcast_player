<?php

include_once("/init/_init.php");

if (!isset($_SESSION["playlist"])) {
    header("location: ./pages/playlist.php");
} else {
    header("location: ./pages/stream.php");
}