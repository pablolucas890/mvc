<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {

	public function index() {
		//caso a ação a ser tomada seja disparar o método index()...

		$produto = Container::getModel('Produto');
		//A class Container é informada de que o model a ser carregado deve ser o Produto
		//e a instancia da classe produto é realizada
		$produtos = $produto->getProdutos();
		//a variavel $produtos armazena o retorno do método getProdutos

		$this->view->dados = $produtos;
		//o array de produtos é então repassado para a view

		$this->render('index', 'layout1');
		//o método de renderização é então acionado passando como parametros a pagina 
		//e o layout a ser carregado e exibido
	}

	public function sobreNos() {

		$info = Container::getModel('Info');

		$informacoes = $info->getInfo();
		
		@$this->view->dados = $informacoes;

		$this->render('sobreNos', 'layout1');
	}

}


?>