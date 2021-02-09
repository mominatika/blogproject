<?php 
class userLogin extends controller
{
	public function  __construct()
	{
		if(!empty($this->getSession('userId')))
		{
			$this->redirect('home');
		}
		
	}

	public function index()
	{
		$this->view('userview/login');
	}
}

?>