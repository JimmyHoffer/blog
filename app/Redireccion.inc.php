<?php 
Class Redireccion{
	public static function redirigir($url){
		//metodo header para redirigir a una dirección url, parametro boolean que indica si queremos que se reescriba la dirección y el codigo 301 indica redirección.
		header('Location:'.$url, true, 301);
		exit();//metodo para salir una vez redirigido
 	}
}

?>

