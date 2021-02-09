<?php

class login extends controller
{
	
	function __construct()
	{
		$this->loginModel=$this->model('user/userlogin');
		$this->validationHelper =$this->HelperFile('validation');
	}
	function index()
	{
		$this->view('userview/login');
	}
	function doLogin()
	{
		extract($_POST);
		if(isset($_POST['login']))
		{
			$data =[
				'email' =>cleanInput('email'),
				'password'=>cleanInput('password'),
				'emailErr'=>'',
				'passwordErr'=>'',
				'statusErr'=>''

			];

			if(empty($data['email']))
			{
				$data['emailErr'] = 'Email is Required';
			}
			if(empty($data['password']))
			{
				$data['passwordErr'] = 'password is Required';
			}
			else
			{
				if($verify=$this->loginModel->login($data['email'],$data['password']))
				{

					if($verify['status'] === 'incorrect Email')
					{
						$data['emailErr'] = 'inncorect Email';
					}
					else if($verify['status'] === 'incorrect password')
					{
						$data['passwordErr'] = "incorrect password";
					}	
					else if($verify['status'] === 'inactive account')
					{
						 $data['statusErr'] ='your account is inactive'; 
						 $this->setflash('inactive',$data['statusErr']);
						
					}

				}

			}
			if($data['emailErr'] == '' && $data['passwordErr'] == '' &&$data['statusErr'] =="")
			{
				if($verify['status']  === 'ok')
				{
					$id=$verify['userId'];
					
					$this->setSession('userId',$id);
					$this->redirect('home');
				}
			}
			else
			{
				$this->view('userview/login',$data);
			}
		}	

	}
	public function logout()
	{
			$this->sessiondestroy();
			$this->redirect('home');
	}

	
}


?>