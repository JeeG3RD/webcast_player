<?php

$loader = new \Twig\Loader\FilesystemLoader("../templates");

$twig = new \Twig\Environment($loader, [
    'cache' => '../../templates/compilation_cache',
]);