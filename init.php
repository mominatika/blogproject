<?php
	
	define('file',true);
	require_once  __DIR__.'/classes/config.php';

	function __autoload($class)
	{

		if(file_exists(__DIR__.'/classes/'.$class.'.php'))
		{
			require_once __DIR__.'/classes/'.$class.'.php';	
		}
		else
		{
			echo 'file is not exist';
		}


		
	}
	$route = new route;



?>