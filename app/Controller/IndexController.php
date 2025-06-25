<?php

    namespace app\Controller;

    use MF\Controller\Action;

    class IndexController extends Action {

        public function index()
        {
            $this->view->dados = Array('Celular', 'Computador');
            $this->render('index', 'layout1');
        } 

        public function sobrenos()
        {
            $this->view->dados = Array('Tablet', 'Notebook');
            $this->render('sobreNos', 'layout2');
        }
        
    }

?>