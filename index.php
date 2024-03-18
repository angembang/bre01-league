<?php

// charge l'autoload de composer
require "vendor/autoload.php";

// charge le contenu du .env dans $_ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Instancier le contrôleur
$blogController = new BlogController();

// Instancier le routeur
$route = new Router($blogController);
// Passer la superglobale $_GET à la méthode handleRequest du routeur
$route -> handleRequest($_GET);
