<?php
class AdDashboard extends controller
{

	public $uniqueSlug;
	function __construct()
	{
		if(!$this->getSession('AdminId'))
		{
		
			
			$this->redirect('ADlogin');
		}
		$this->cateModel = $this->model('admin/adCategory');
		$this->blogModel =$this->model('user/blogModel');
		$this->userModel = $this->model('user/usermodel');
	}
	
	public function index()
	{
		$alluser=$this->userModel->allUsers();
		$allBlogs=$this->blogModel->AllBlogs();
		$data['user']=$alluser;
		$data['allBlog'] =count($allBlogs);

		$this->view('admin/index',$data);
	}
	
	// public function addCategory()
	// {
	// 	$this->view('admin/category');
	// }
	public function addSubCateGory()
	{
		$data['cateData']=$this->cateModel->Allcategory();
		$this->view('admin/Addsubcategory',$data);
	}
	

}

?>