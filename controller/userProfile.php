<?php 
class userProfile extends controller
{

	public function __construct()
	{
		if(!empty($this->getSession('userId')))
		{
			$this->userid=$this->getSession('userId');
		}
		else
		{
			$this->redirect('login');
		}
		$this->HelperFile('validation');
		$this->usermodel=$this->model('user/usermodel');
		$this->cateModel = $this->model('admin/addSubcategories');
		$this->userModel = $this->model('user/usermodel');
	}

	




	public function getAllCategory()
	{

		
		return $this->cateModel->fetchAllcategory();
	}
	public function getUserComponent()
	{
		if(!empty($this->getSession('userId')))
		{
			$this->id=$this->getSession('userId');
			return $this->usermodel->userData($this->id);
		}
	}

	public function index($userId)
	{
		$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();
		$data['userProfile'] = $this->userModel->userProfile($userId);

		$this->view('userview/userProfile',$data);
	}
	public function UpdateProfileForm($userId)
	{
		$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();
		$userProfile = $this->userModel->userProfile($userId);
		$data['userProfile'] = [
				'profileData' => $userProfile
		];
		$this->view('userview/updateProfileForm',$data);
	}
	public function updateProfile($userId)
	{
		if(isset($_POST['ProUpdate']))
		{
		$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();
		$userProfile = $this->userModel->userProfile($userId);
		$profileData = [
				'userName'=>cleanInput('userName'),
				'email'=>cleanInput('email'),
				'profile'=>$_FILES['profile']['name'],
				'profileData' => $userProfile,
				'userNameErr' =>'',
				'userEmailErr'=>'',
				'imgErr'=>''	
		];
		if($profileData['userName'] == '' )
		{
			$profileData['userNameErr'] = 'userName is empty';
		}
		else
		{
			if(checkname($profileData['userName'])== false)
			{
				$profileData['userNameErr'] = 'only space and letters required';
			}
		}
		if($profileData['email'] == '')
		{
			$profileData['userEmailErr'] = 'email is empty';
		}
		if(EmailValidation($profileData['email'])== false)
		{
			$profileData['userEmailErr'] = 'invalid EmailId';	
		}
		if(!empty($profileData['profile']))
		{
			echo $tmpname = $_FILES['profile']['tmp_name'];
			 $dir = __DIR__.'/../public/assets/userProfile/'.$profileData['profile'];



		}

		if($profileData['userNameErr'] == '' && $profileData['userEmailErr'] =='' && $profileData['imgErr'] == '')
		{
			$Data=[$profileData['userName'],$profileData['profile'],$profileData['email'],$userId];
			if($this->userModel->updateProfile($Data) == true)
			{
				if(isset($tmpname))
				{
					move_uploaded_file($tmpname,$dir);
					
					
				}
				$this->redirect('userProfile/index/',$userId);
				
			}
			else
			{
				echo 0;
			}

		}
		else
		{
			$data['userProfile'] = $profileData;
			$this->view('userview/updateProfileForm',$data);
		}

		}
		else
		{
			$this->redirect('login');
		}	

	}
}


?>