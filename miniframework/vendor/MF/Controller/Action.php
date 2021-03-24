<?php

namespace MF\Controller;

abstract class Action {

	protected $view;

	public function __consctruct() {
		$this->view = new stdClass();
	}

	protected function render($view, $layout) {
		//este método recebe do controlador a view já com os dados preenchidos e a string
		//que determina o layout a ser carregado
		$this->view->page = $view;

		if(file_exists("../App/Views/".$layout.".phtml")) {
			//caso o layout exista ele é carregado
			require_once "../App/Views/".$layout.".phtml";
		} else {
			//caso nao exista apenas o metodo content é chamado
			$this->content();
		}
	}

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));
		//pega o nome da classe atual após uma serie de formatações de strings
		//e a partir desta classe a view correspondente é carregada
		require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
	}
}

?>