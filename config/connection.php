<?php
    $DB_DSN = 'mysql:dbname=acms;host=127.0.0.1';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'acms';
    $DB_HOST = '127.0.0.1';

    $host = $_SERVER['HTTP_HOST'];
    $protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
    $url = "$protocol://$host/acms";

    try {
        $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }