<?php
if(!defined('file'))
{
	die();
}


class admin extends controller
{

	function __construct()
	{

		if($this->getSession('AdminId'))
		{
		
			$this->redirect('AdDashboard');
		}
		

	}

	public function index()
	{
		echo $this->view('admin/login');

	}


	


}


?>