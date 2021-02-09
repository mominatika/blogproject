<?php

class controller
{
	function __construct()
	{
		
	}	

	protected function view($view,$data=[])
	{
		$view = explode('/', $view);
		if(file_exists(__DIR__."/../view/".$view[0].'/'.$view[1].".php"))
		{
		require_once __DIR__."/../view/".$view[0].'/'.$view[1].".php";
		}
		else
		{

			echo $view[1] .' view file is not Exist';
		}

	}

	protected function model($model)
	{
		$model = explode('/', $model);
		if(file_exists(__DIR__.'/../model/'.$model[0].'/'.$model[1].'.php'))
		{
		require_once __DIR__.'/../model/'.$model[0].'/'.$model[1].'.php';
		return new $model[1];
		}
		else
		{
			echo $model . "model is not Exist";
		}
	}

	protected function redirect($path,$val=null)
	{
		if(!empty($val))
		{
			// echo ROOT.$path.$val;
			header('Location:'.ROOT.$path.$val);
		}
		else
		{
		header('Location:'.ROOT.$path);
		}
	} 

	protected function setSession($sessionName,$sessionValue)
	{
			if(!empty($sessionName) && !empty($sessionValue))
			{
				$_SESSION[$sessionName] = $sessionValue;
			}

	}

	protected function getSession($sessionName)
	{
			if(!empty($sessionName) && isset($_SESSION[$sessionName]))
			{
			return $_SESSION[$sessionName];
			}
	}

	protected function unsetsession($sessionName)
	{
		if(!empty($sessionName))
		{
			unset($_SESSION[$sessionName]);
		}
	}
	protected function sessiondestroy()
	{
		session_destroy();
	}

	protected function setflash($sessionName,$msg)
	{
		if(!empty($sessionName) && !empty($msg))
		{
			$_SESSION[$sessionName] = $msg;
		}
	}

	public function flash($sessionName,$className)
	{
		if(isset($sessionName) && isset($className) && isset($_SESSION[$sessionName]))
		{
			$msg = $_SESSION[$sessionName];
			echo "<div class='$className'>".$msg."</div>";
			unset($_SESSION[$sessionName]);
		}
	}

	public function HelperFile($fileName)
	{
		// echo __DIR__;
		require_once __DIR__."/../helpers/".$fileName.".php";	
	}


	

	

	public function slug($title)
	{
		$title= strtolower($title);
		$title = trim($title);
		$title = preg_replace('/[^A-Za-z0-9-]+/i', '-', $title);
		return $title;
	}

	

	public function convertdateTowords($date)
	{
		$time=strtotime($date);
        $time=date("d F Y l h:i:sa",$time); 
        return $time;
	}



}	

?>