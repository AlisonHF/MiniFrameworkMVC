<?php

    namespace MF\Init;

    // Classe abstrata para setar a classe Route com métodos e funções funcionais, separando o conteúdo delas.
    abstract class Bootstrap {
        
        private $routes;

        abstract protected function initRoutes();

        public function __construct()
        {
            $this->initRoutes();
            $this->run($this->getUrl());
        }

        public function getRoutes()
        {
            return $this->routes;
        }

        public function setRoutes(array $routes)
        {
            $this->routes = $routes;
        }

        protected function run($url)
        {
            foreach($this->getRoutes() as $path => $route)
            {
                if ($url == $route['route'])
                {
                    $class = "app\\Controller\\".ucfirst($route['controller']); // app\Controller\IndexController

                    $controller = new $class;
                    $action = $route['action'];
                    $controller->$action(); // Rode a função index ou sobrenos, pegando pelo action de cada route.
                }
            }
        }

        public function getUrl() 
        {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>