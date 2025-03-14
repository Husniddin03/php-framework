<?php
spl_autoload_register(function ($class) {
    // Namespace'ni katalog yo'liga o'zgartirish
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    
    // Fayl mavjud bo‘lsa, uni yuklaymiz
    if (file_exists($file)) {
        include_once $file;
    } else {
        die("Autoload error: Class '$class' not found in '$file'");
    }
});