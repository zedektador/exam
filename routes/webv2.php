<?php

$router->group(["prefix" => "v2"], function() use ($router) {

    $router->group(["middleware" => "auth:merchant", "prefix" => "cms/estore"], function() use ($router){

    });

    $router->group(["middleware" => "merchant-token", "prefix" => "customer/estore"], function() use ($router) {
        $router->group(["middleware" => "auth:customer"], function() use ($router) {


        });
    });

    $router->group(["middleware" => "auth:employee", "prefix" => "merchant/estore"], function() use ($router) {

    });

    $router->get("/version", ["as" => "version", "uses" => "CartController@view"]);

});

