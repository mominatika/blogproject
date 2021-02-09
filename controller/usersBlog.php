<?php 
class usersBlog extends controller
{
	public function __construct()
	{
		if(!empty($this->getSession('userId')))
		{
			$this->id=$this->getSession('userId');
		}
		else
		{
			$this->redirect('login');
		}
		$this->usermodel=$this->model('user/usermodel');
		$this->cateModel = $this->model('admin/addSubcategories');
		$this->blogmodel =$this->model('user/usersBlogModel');

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
	public function index()
	{
		
		$data['userdata'] =$this-> getUserComponent();
		$data['categories']=$this->getAllCategory();
		$data['userBlogs'] = $this->blogmodel->FetchUserBlog($this->id);
		
		
		$this->view('userview/userBlog',$data);
	
	}
		
	
	
}

?>