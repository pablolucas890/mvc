<?php

	//ini_set('error_reporting', 'E_STRICT');

	require_once "../vendor/autoload.php";
	//inclui o arquivo de autoload do composer, isto é, o carregamento dos scripts são feitos
	//por este arquivo e não pelo local de origem do arquivo

	$route = new \App\Route;
	//Instacia do objeto route que se refere a classe de rotas que é reponsavel por mostrar aos
	//controladores quais scripts devem ser carregados pelas rotas e quais acoes eles devem tomar
?>