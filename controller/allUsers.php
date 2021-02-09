<?php
class allUsers extends controller
{
	public function __construct()
	{

		if(!empty($this->getSession('AdminId')))
		{
			$this->userid=$this->getSession('AdminId');
		}
		else
		{
			$this->redirect('ADlogin');
		}
		$this->HelperFile('validation');
			$this->blogmodel =$this->model('user/usersBlogModel');
		$this->blogmodel2 = $this->model('user/blogmodel');
		$this->userModel = $this->model('user/usermodel');
		$this->cateModel = $this->model('admin/addSubcategories');
	}


	public function index()
	{

	}
	public function getAllCategory()
	{
		return $this->cateModel->fetchAllcategory();	
	}
	public function AllUsers()
	{
		$data=$this->userModel->allUsers();
		$this->view('admin/AlluserTable',$data);
	}

	public function userProfile($userId)
	{
		$userProfile=$this->userModel->userProfile($userId);
		$this->view('admin/userprofile',$userProfile);
		
		

	}
	public function userPost($slug)
	{
		$data=$this->blogmodel2->getUpdateFormData($slug);
		// print_r($data);
			// $data = $this->blogmodel->FetchUserBlog($userId);
		$this->view('admin/usersBlog',$data);
		
	}
	public function userPostTable($userId)
	{
		$data = $this->blogmodel->FetchUserBlog($userId);
		$this->view('admin/userPostable',$data);
	}
	public function updateBlogform($slug)
	{
		$data['categories']=$this->getAllCategory();
		$upblogData = $this->blogmodel2->getUpdateFormData($slug);
		$data['upblogData'] = [
				'uploadedData' => $upblogData,
				'titleErr'=>'',
					'categoryErr'=>'',
					'subcategoryErr'=>'',
					'blogTextErr'=>'',
					'previewErr'=>''
		];

		$this->view('admin/UpdateBlog',$data);

	}
	public function updateBlog($Blogslug)
	{
		$data['categories']=$this->cateModel->fetchAllcategory();
		$upblogData = $this->blogmodel2->getUpdateFormData($Blogslug);
		$uploadedData = [
				'title' => cleanInput('title'),
					'category'=>cleanInput('parent'),
					'preview'=>cleanInput('preview'),
					'subcategory'=>cleanInput('subcategory'),
					'blogText'=>trim($_POST['editor']),
					

					'uploadedData' => $upblogData,
					'titleErr'=>'',
					'categoryErr'=>'',
					'subcategoryErr'=>'',
					'blogTextErr'=>'',
					'previewErr'=>''
		];
// echo '<pre>';print_r($_FILES);die;
		if($_FILES['blogimage']['name']){
			$uploadedData['blogImg'] = $_FILES['blogimage']['name'];
		}

		if(empty($uploadedData['title']))
			{
				$uploadedData['titleErr'] = 'title is empty';
				
			}
			else
			{
				if($this->blogmodel2->checkUpdateblogTitle($Blogslug,$uploadedData['title']) === false)
				{
					$uploadedData['titleErr'] = 'Title is used';
				}
				else
				{
					$slug = $uploadedData['title'];
					$slug=$this->slug($slug);
					 if($fetch=$this->blogmodel2->checkblogslug($slug) == true)
					 {
					 	 $this->uniqueSlug=$slug .= '-'.time();
					 	
					 }
					 else
					 {
					 	 $this->uniqueSlug =  $slug;
					 }

				}

			}


			if(empty($uploadedData['category']) && $uploadedData['category'] == 0 && $uploadedData['category'] == '')
			{
				$uploadedData['categoryErr'] = 'select category';
			}
			else
			{
				if(is_numeric($uploadedData['category'] == false))
				{
					$uploadedData['categoryErr'] = 'select valid value';

				}
				else
				{
							$id= array();
							$data['categories']=$this->getAllCategory();
							foreach ($data['categories'] as $value) {
								$id[]=$value->id;
							}

							if(!in_array($uploadedData['category'],$id))
							{
								$uploadedData['categoryErr'] ='category is not Exist';
							}
							if($uploadedData['subcategory'] == '')
							{
								$uploadedData['subcategoryErr'] = 'subcategory is empty';
							}
							else
							{
								if(!is_numeric($uploadedData['subcategory']))
								{
									$uploadedData['subcategoryErr']= 'invalid value';
								}
								
							}
										


				}



			}
			if(empty($uploadedData['blogText']))
			{
					$uploadedData['blogTextErr'] = 'write blog';				
			}
			
			if(empty($uploadedData['preview']))
			{
				$uploadedData['previewErr'] = 'select preview type';

			}
			if(!empty($uploadedData['blogImg']))
			{
				
				$tmpname = $_FILES['blogimage']['tmp_name'];
				$allowdImgExtension =array('jpg','jpeg','png','gif');
				$file_extension = pathinfo($uploadedData['blogImg'], PATHINFO_EXTENSION);
				if(!in_array($file_extension, $allowdImgExtension))
				{
					$blogData['blogImgErr'] ='only jpg,png,gif file is allowed';
				}	
				$dir = __DIR__."/../public/assets/blogImges/".$uploadedData['blogImg'];
				
			}



			if($uploadedData['titleErr'] == "" && $uploadedData['categoryErr'] == "" && $uploadedData['blogTextErr']=="" && $uploadedData['previewErr']=="")
			{
					$data = [$uploadedData['title'],$this->uniqueSlug,$uploadedData['subcategory'],$uploadedData['blogText'],$uploadedData['blogImg'],$uploadedData['preview'],$Blogslug];
					// print_r($data);
					if($this->blogmodel2->updateBlog($data) == true)
					{
						// echo 1;
						if(isset($tmpname))
						{
							if(move_uploaded_file($tmpname,$dir))
							{
								echo 'image is  updated';
							}
							else
							{
								echo 'image is not updated';
							}

						}
						
					}
					// echo $this->uniqueSlug;
					$this->redirect('AllUsers/userPost/',$this->uniqueSlug);




			}
			else
			{
				$data['upblogData']=$uploadedData;
				$this->view('admin/UpdateBlog',$data);
			}

	}

	


}


?>