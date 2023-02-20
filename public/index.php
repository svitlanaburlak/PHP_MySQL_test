<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    
    //==============================================
    // ROUTER
    //==============================================

    $router = new AltoRouter();

    $router->setBasePath( $_SERVER['BASE_URI'] );

    $router->map( "GET", "/", [ 
      "method"     => "home", 
      "controller" => "App\Controllers\MainController" 
    ], "main-home" );

    //--------------------------------------------
    // Routes
    //--------------------------------------------

    // $router->map( "GET", "/list", [ 
    //   "method"     => "list", 
    //   "controller" => "App\Controllers\CardController" 
    // ], "card-list" );

    $router->map( "POST", "/create", [ 
      "method"     => "create", 
      "controller" => "App\Controllers\CardController" 
    ],"card-create" );

    $router->map( "GET", "/read/[i:card_id]", [ 
      "method"     => "read", 
      "controller" => "App\Controllers\CardController" 
    ], "card-read" );
    
    $router->map( "PATCH", "/update/[i:card_id]", [ 
      "method"     => "update", 
      "controller" => "App\Controllers\CardController" 
    ], "card-update");


    $matchingRouteInfos = $router->match();

    //==============================================
    // DISPATCHER
    //==============================================

    if( $matchingRouteInfos === false )
    {
      http_response_code( 404 );
      exit( "404 Not Found" );
    }

    $controllerToInstantiate = $matchingRouteInfos['target']['controller'];
    $methodToCall            = $matchingRouteInfos['target']['method'];

    $controller = new $controllerToInstantiate();

    $controller->$methodToCall( $matchingRouteInfos['params'] );