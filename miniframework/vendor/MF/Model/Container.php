<?php

namespace MF\Model;

use App\Connection;

class Container {

	public static function getModel($model) {
		//este método retorna a classe relacionada ao model que ele recebeu
		$class = "\\App\\Models\\".ucfirst($model);
		
		$conn = Connection::getDb();

		return new $class($conn);
	}
}


?>