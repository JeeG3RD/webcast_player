<?php
require_once("../vendor/autoload.php");

spl_autoload_register(function ($class) {
    
    // project-specific namespace prefix
    $prefix = 'Twig';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/tools/Twig_3/Twig/';
    
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    
    // get the relative class name
    $relative_class = substr($class, $len);
    
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('_', '/', $relative_class) . '.php';
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

if (is_dir($_SERVER["DOCUMENT_ROOT"]."/streaming/templates")) {
    $loader = new \Twig\Loader\FilesystemLoader("../templates");
    $twig = new \Twig\Environment($loader, [
        'cache' => 'cache',
        'auto_reload' => true
        ]);
}