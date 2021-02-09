<?php 

class route
{

			public $controller = 'home';
			public $method= 'index';
			public $param=[];

	function __construct()
	{
			
			$url=$this->route();

			if(!empty($url))
			{
				

					if(file_exists( __DIR__.'/../controller/'.$url[0].'.php'))
					{
					require_once __DIR__.'/../controller/'.$url[0].'.php';
					$this->controller = $url[0];
					unset($url[0]);
					}
					else
					{
						echo $url[0] .' page is not Found';
					}
				

				
			}
			// echo __DIR__;
			require_once __DIR__.'/../controller/'.$this->controller.'.php';

				$this->controller = new $this->controller;
			if(isset($url[1]) && !empty($url[1]))
			{
				if(method_exists($this->controller, $url[1]))
				{

					$this->method = $url[1];
					unset($url[1]); 
				}				
				else
				{
					echo 'method is not exits';
				}

			}

			if(isset($url[2]) && !empty($url[2]))
			{
				$this->param = $url;
			}
			else
			{
				$this->param = [];
			}

			call_user_func_array([$this->controller,$this->method], $this->param);
	}

	private function route()
	{
		if(isset($_GET['url']))
		{

			$url = $_GET['url'];
		$url = rtrim($url);
		$url=filter_var($url,FILTER_SANITIZE_URL);
			$url =explode('/', $url);
			return $url;	
		}
		
	}
}


?>