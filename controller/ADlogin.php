<?php

class ADlogin extends controller
{

		function __construct()
		{
			
			if($this->getSession('AdminId'))
			{
				$this->redirect('AdDashboard');
			}
			
			$this->HelperFile('validation');

			$this->AdminModel=$this->model('admin/adminLogin');
		}
		public function index()
		{
			$this->view('admin/login');
		}

	public function doLogin()
	{

		if(isset($_POST['login']))
		{
		
		$LoginData=[
		 	'AdminEmail' =>cleanInput('Ademail'),
		 	'adPwd' =>cleanInput('Adpassword'),
		 	'adEmail_Err' => '',
		 	'adPwdErr' =>'',
		 ]; 


		if(empty($LoginData['AdminEmail']))
		{
			$LoginData['adEmail_Err'] = 'email is empty';
		}
		

		if(empty($LoginData['adPwd']))
		{
			$LoginData['adPwdErr'] = 'password is empty';
		}
		else
		{
				$data=[$LoginData['AdminEmail'],$LoginData['adPwd']];
				$login=$this->AdminModel->adminDOLogin($data);
				if($login['status'] === 'incorrect Email')
				{
					 $LoginData['adEmail_Err'] = 'email is incorrect';
				}
				else if($login['status'] == 'incorrect password')
				{
						$LoginData['adPwdErr']="incorrect password";		
				}

		}

		if($LoginData['adEmail_Err'] ==""  &&  $LoginData['adPwdErr'] == "")
		{
				if($login['status'] === 'ok')
				{
						$this->setSession('AdminId',$login['data']);

						$this->redirect('AdDashboard');

				}
		}
		else{

			$this->view('admin/login',$LoginData);
		}
		
			 
		
	}
	else
	{
		$this->redirect('ADlogin');
	}

	}

	public function logout()
	{
		// echo 1;
		$this->sessiondestroy();
		$this->redirect('admin');
	}
}


?>