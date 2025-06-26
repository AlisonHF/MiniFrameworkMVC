<?php

    namespace app\Controller;

    // recursos do mini framework
    use MF\Model\Container;
    use MF\Controller\Action;
    // models
    use app\Model\Produto;
    use app\Model\Info;

    
    class IndexController extends Action {

        public function index()
        {
            $produto = Container::getModel('Produto');

            $produtos = $produto->getProdutos();

            $this->view->dados = $produtos;

            $this->render('index', 'layout1');
        } 

        public function sobrenos()
        {
            $info = Container::getModel('Info');
            
            $informacoes = $info->getInfo();

            $this->view->dados = $informacoes;

            $this->render('sobreNos', 'layout2');
        }
        
    }

?>