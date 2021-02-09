<?php

class userRegister extends controller
{
	public function __construct()
	{
		$this->signUpModel = $this->model('user/signUp'); 
		$this->HelperFile('validation');
		$this->HelperFile('email');
	}

	function index()
	{
		$this->view('userview/signUp');
		
	}
	function doSignUp()
	{
		

		if(isset($_POST['SignUp']))
		{
			$data=['UserName'=>cleanInput('username'),
				  'email'=>cleanInput('email'),
				  'password'=>cleanInput('pwd'),
				  'cnfpwd'=>cleanInput('cnfpwd'),
				  'UserNameErr'=>'',
				  'passwordErr'=>'',
				  'EmailErr'=>'',
				  'cnfpwdErr'=>''

		];
			if(empty($data['UserName']))
			{
				$data['UserNameErr']="Username is required";
			}
			else
			{
				// echo 1;
				if(checkname($data['UserName']) == false)
				{
					$data['UserNameErr'] = "only letters and space is required";
				}

			}

			if(empty($data['email']))
			{
				$data['EmailErr']="Email is required";
			}
			else
			{
				if(EmailValidation($data['email']) === false)
				{
					$data['EmailErr'] = "invalid Email";
				}
				else
				{
					if($this->signUpModel->checkEmail($data['email']) === false)
					{
						$data['EmailErr'] = "email is Exist";
					}
				}	
			}
			if(empty($data['password']))
			{
				$data['passwordErr']="password is required";

			}
			else
			{
				if(PasswordValidation($data['password'])== false)
				{
					$data['passwordErr']="Least 1 uppercase letter, at least 1 lowercase letter, at least one number, and at least one special char";

				}
				else
				{
					if($data['password'] !== $data['cnfpwd'])
					{
						$data['cnfpwdErr'] = "password is not matched";
					}
					
				}
			}
			if($data['UserNameErr']=="" && $data['EmailErr']=="" && $data['passwordErr']=="" && $data['cnfpwdErr'] == "")
			{

				$Signup=[$data['UserName'],$data['email'],md5($data['password'])];
				if($this->signUpModel->doRegister($Signup))
				{
					$this->setflash('signUpsuccess','registration successful');
					$this->redirect('userLogin/');

				}
				else
				{
					$this->setflash('signUpFail','registration Fail');
				}
			}
			else
			{
				$this->view('userview/signUp',$data);
			}


		}	
	}

	
}

?>