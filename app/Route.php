<?php

    namespace app;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap{

        protected function initRoutes()
        {
            $routes['home'] = Array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index',
            );
            $routes['sobre_nos'] = Array(
                'route' => '/sobre_nos',
                'controller' => 'IndexController',
                'action' => 'sobreNos',
            );

            $this->setRoutes($routes);
        }

    }

?> 