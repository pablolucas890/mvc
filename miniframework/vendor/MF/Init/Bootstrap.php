<?php

namespace MF\Init;

abstract class Bootstrap {
	private $routes;

	abstract protected function initRoutes(); 

	public function __construct() {
		$this->initRoutes();//cria as rotas
		$this->run($this->getUrl());//passa ao metodo rum, a url formatada pelo metodo getUrl
	}

	public function getRoutes() {//retorna as rotas
		return $this->routes;
	}

	public function setRoutes(array $routes) {//seta as rotas
		$this->routes = $routes;
	}

	protected function run($url) {
		foreach ($this->getRoutes() as $key => $route) {
			//com o auxílio da url formatada, este for percorre todo o array de rotas
			if($url == $route['route']) {
				//e caso a rota que o usuario digitou na url seja igual à alguma rota
				//encontrada no array...
				$class = "App\\Controllers\\".ucfirst($route['controller']);
				//o php cria de maneira dinamica uma classe para a rota selecionada...
				$controller = new $class;
				//instancia tal rota...
				$action = $route['action'];
				//seleciona qual ação aquela rota deve tomar...
				$controller->$action();
				//e passa pro controlador, a ação que ele deve realizar
			}
		}
	}

	protected function getUrl() {//método para formatar a url
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}
}

?>