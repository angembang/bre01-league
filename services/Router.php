<?php

class Router
{
    private $blogController;

    public function __construct(BlogController $blogController)
    {
        $this->blogController = $blogController;
    }

    public function handleRequest($route)
    {
        if (!isset($route["route"])) {
            
            $player = isset($route["player"]) ? $route["player"] : null;
            $team = isset($route["team"]) ? $route["team"] : null;

            // Appelle à la méthode home du BlogController 
            $this->blogController->home();
        }
    }
}