<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
		//atribui ao array $routes no atributo home, a rota que ele pertence, o controlador resposavel
		//e qual acao o controlador deve tomar

		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);
		//atribui ao array $routes no atributo sobre_nos, a rota que ele pertence, o controlador resposavel
		//e qual acao o controlador deve tomar
		$this->setRoutes($routes);
	}
}

?>