<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    
    //==============================================
    // ROUTER
    //==============================================

    $router = new AltoRouter();

    $router->setBasePath( $_SERVER['BASE_URI'] );

    //--------------------------------------------
    // Routes
    //--------------------------------------------

    $router->map( "GET", "/", [ 
      "method"     => "home", 
      "controller" => "App\Controllers\MainController" 
    ], "main-home" );

    $router->map( "GET", "/read/[i:id]", [ 
      "method"     => "read", 
      "controller" => "App\Controllers\CardController" 
    ], "card-read" );

    $router->map( "GET", "/add", [ 
      "method"     => "form", 
      "controller" => "App\Controllers\CardController" 
    ],"card-add" );

    $router->map( "POST", "/add", [ 
      "method"     => "record", 
      "controller" => "App\Controllers\CardController" 
    ],"card-create" );
    
    $router->map( "GET", "/edit/[i:id]", [ 
      "method"     => "form", 
      "controller" => "App\Controllers\CardController" 
    ], "card-edit");

    $router->map( "POST", "/edit/[i:id]", [ 
      "method"     => "record", 
      "controller" => "App\Controllers\CardController" 
    ], "card-update");


    $match = $router->match();

    //==============================================
    // DISPATCHER
    //==============================================
    $dispatcher = new Dispatcher($match, ErrorController::class . '::err404');

    $dispatcher->setControllersNamespace('App\Controllers');
    
    $dispatcher->dispatch();