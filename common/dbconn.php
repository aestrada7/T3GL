<?php
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
    $dotenv->load();

    $defaultLeagueId = 72;
    include('common/utils.php');
    
    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);

    $utils = new Utils();
    $utils->setDB($db);
    include_once('common/common.php');
?>
