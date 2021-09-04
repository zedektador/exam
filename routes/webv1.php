<?php

$router->group(["prefix" => "v1"], function() use ($router) {
     $router->group(["prefix" => "promotion"], function () use ($router) {
         $router->post("add", ["uses" => "PromotionController@add"]);
     });

     $router->group(["prefix" => "entrant"], function () use ($router) {
         $router->post("winning-moment/{promotion-uuid}", ["uses" => "EntrantController@winning"]);
         $router->post("chance/{promotion-uuid}", ["uses" => "EntrantController@chance"]);
     });
});

