<?php 
/**
 * 
 */
class adminupuser extends controller
{
	
	public function __construct()
	{
			if(empty($this->getSession('AdminId')))
			{
				$this->redirect('admin');
			}
		$this->userModel = $this->model('user/usermodel');
	}
	public function index()
	{
		

	}
	public function userupproform($userId)
	{
		$userProfile = $this->userModel->userProfile($userId);
		
		$this->view('admin/userProfileupForm',$userProfile);	
	}
	public function userProfileupdate($userId)
	{
		if(isset($_POST['status']))
		{
			$status = $_POST['status'];
		}
		$update = $this->userModel->updateAdminUserStatus($_POST['status'],$userId);

	}
}



?>