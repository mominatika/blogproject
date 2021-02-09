<?php
if(!defined('file'))
{
	die();
}

class home extends controller
{
	public $id;

	function __construct()
	{


		$this->cateModel = $this->model('admin/adCategory');
		$this->usermodel=$this->model('user/usermodel');
		$this->blogmodel = $this->model('user/blogmodel');


	}
	function index()
	{

		if(!empty($this->getSession('userId')))
		{
			// echo $this->getSession('userId');
			$this->id=$this->getSession('userId');
			$data['userdata']=$this->usermodel->userData($this->id);
		}
		else
		{
			// echo 0;
		}
		$data['categories'] = $this->cateModel->Allcategory();
		$data['allBlogs'] = $this->blogmodel->HomepageBlog();
		$this->view('userview/index',$data);
	}

}


?>