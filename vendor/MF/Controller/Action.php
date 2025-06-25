<?php

    namespace MF\Controller;

    abstract class Action {

        protected $view;

        public function __construct()
        {
            $this->view = new \stdClass(); // Cria um objeto vazio para que seja possível passar dados para ele e ser exibido dentro das views
        }

        protected function render($view, $layout)
        {
            $this->view->page = $view;

            // Verifica se o layout passado existe, caso contrário só exibe os valores de dentro do 
            if (file_exists("../app/View/".$layout.".phtml"))
            {
                require_once "../app/View/".$layout.".phtml"; // Renderiza o layout
            }
            else 
            {
                $this->content();
            }
            
        }

        protected function content()
        {
            // Pegando o caminho da View pelo nome da classe do Controller, pois caso houver mais Controllers, o caminho seja alterado dinamicamente
            $classAtual = get_class($this); // Pega o caminho do arquivo que está a classe, no caso: app/Controller/IndexController
            $classAtual = str_replace('app\\Controller\\', '', $classAtual); // IndexController
            $classAtual = strtolower(str_replace('Controller', '', $classAtual)); // index

            require_once "../app/View/".$classAtual."/".$this->view->page.".phtml";
        }

    }

    // Atenção: Sempre que utilizamos um require, estamos "colando" o conteúdo desses arquivos no contexto onde está o require

?>