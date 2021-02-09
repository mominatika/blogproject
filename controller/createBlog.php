<?php

class createBlog extends controller
{
	public function __construct()
	{
		if(!empty($this->getSession('userId')))
		{
			$this->id=$this->getSession('userId');
		}

		$this->HelperFile('validation');
		$this->usermodel=$this->model('user/usermodel');
		$this->cateModel = $this->model('admin/addSubcategories');
		$this->blogmodel =$this->model('user/blogmodel');

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
		$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();
		$this->view('userview/addText',$data);
	}

	public function createBlog()
	{
		if(isset($_POST['createBlog']))
		{
			$blogData=[
					'title' =>cleanInput('title'),
					'category'=>cleanInput('category'),
					'preview'=>cleanInput('preview'),
					'subcategory'=>cleanInput('subcategory'),
					'blogText'=>trim($_POST['editor']),
					'blogImg'=>$_FILES['blogimage']['name'],
					'subcategoryErr'=>'',
					'titleErr'=>'',
					'categoryErr'=>'',
					'blogImgErr'=>'',
					'previewErr'=>'',
					'blogTextErr'=>'',
					'blogImgErr'=>''

		];


			if(empty($blogData['title']))
			{
				$blogData['titleErr']="title is empty";
			}
			else
			{

				if($this->blogmodel->checkblogTitle($blogData['title'],$this->id) === false)
				{
					$blogData['titleErr'] = 'Title is used';
				}
				else
				{
					 $slug = $blogData['title'];
					$slug=$this->slug($slug);
					 if($fetch=$this->blogmodel->checkblogslug($slug))
					 {
					 	
					 	  $this->uniqueSlug=$slug .= '-'.time();
					
						 	
					 }
					 else
					 {
					 	 $this->uniqueSlug =  $slug;
					 }

				}
				
			}
				
			if(empty($blogData['category']) && $blogData['category'] == 0)
			{
				$blogData['categoryErr'] = 'select category';
			}
			else
			{
				if(is_numeric($blogData['category'] == false))
				{
					$blogData['categoryErr'] = 'select valid value';

				}
				else
				{
							$data['categories']=$this->getAllCategory();
							foreach ($data['categories'] as $value) {
								$id[]=$value->id;
							}

							if(!in_array($blogData['category'],$id))
							{
								$blogData['categoryErr'] ='category is not Exist';
							}
							
				}
				if($blogData['subcategory'] == '')
				{
					$blogData['subcategoryErr'] = 'subcategory is empty';
				}
				else
				{
					if(!is_numeric($blogData['subcategory']))
					{
						$blogData['subcategoryErr']= 'invalid value';
					}
					
				}
				


			}

			if(empty($blogData['blogText']))
			{
					$blogData['blogTextErr'] = 'write blog';				
			}
			
			if(empty($blogData['preview']))
			{
				$blogData['previewErr'] = 'select preview type';

			}

			if(isset($blogData['blogImg']))
			{
				$tmpname=$_FILES['blogimage']['tmp_name'];
				$allowdImgExtension =array('jpg','jpeg','png','gif');
				$file_extension = pathinfo($blogData['blogImg'], PATHINFO_EXTENSION);
				if(!in_array($file_extension, $allowdImgExtension))
				{
					$blogData['blogImgErr'] ='only jpg,png,gif file is allowed';
				}	

				
				$dir = __DIR__."/../public/assets/blogImges/".$blogData['blogImg'];
			}





			if($blogData['titleErr'] == '' && $blogData['categoryErr'] == '' && $blogData['subcategoryErr']=='' && $blogData['blogImgErr'] == '' && $blogData['previewErr']=='' && $blogData['blogTextErr'] == '' && $blogData['blogImgErr'] == '')
			{

				if($blogData['blogImg']=='')
				{
					$blogImg = ' - ';
				}
				else
				{
					$blogImg = $blogData['blogImg'];
				}

					$insertData=[$this->id,$blogData['title'],$this->uniqueSlug,$blogData['subcategory'],$blogData['blogText'],$blogImg,$blogData['preview']];
					if($this->blogmodel->InsertBlogData($insertData) === true)
					{
						if(isset($tmpnam))
						{
							move_uploaded_file($tmpname,$dir);
							
						}
						$this->redirect('usersBlog');
					}
			}
			else
			{

				$data['userdata'] =$this-> getUserComponent();
				$data['categories']=$this->getAllCategory();
				$data['blogData']=$blogData;
				$this->view('userview/addText',$data);
			}


		}
		

	}

	public function subcategory()
	{
		
		if(isset($_POST['id']))
		{
				$id=$_POST['id'];
			  $data=$this->getsubcate($id);
			  

		}
		else
		{
			$this->redirect('createBlog');
		}
	}
	public function  getsubcate($id)
	{
		$data['catepreview'] = $this->cateModel->allsubcategory($id);
		$this->view('userview/selectsubcategory',$data);
	}


	public function updateBlogForm($slug)
	{
			$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();

			$upblogData = $this->blogmodel->getUpdateFormData($slug);
			$data['uploadedData'] = [
				
				'uploadedData'=>$upblogData,
				'titleErr'=>'',
					'categoryErr'=>'',
					'subcategoryErr'=>'',
					'blogTextErr'=>'',
					'previewErr'=>''


			];
			
			$this->view('userview/updateBlog',$data);

	}

	public function UpdateBlog($BlogSlug)
	{
		// echo $BlogSlug;
				$data['userdata'] =$this->getUserComponent();
		$data['categories']=$this->getAllCategory();
			$upblogData = $this->blogmodel->getUpdateFormData($BlogSlug);
		
			if(isset($_POST['updateBlog']))
			{
			$uploadedData = [
					'title' => cleanInput('title'),
					'category'=>cleanInput('parent'),
					'preview'=>cleanInput('preview'),
					'subcategory'=>cleanInput('subcategory'),
					'blogText'=>trim($_POST['editor']),
					'blogImg'=>$_FILES['blogimage']['name'],

					'uploadedData'=>$upblogData,
					'titleErr'=>'',
					'categoryErr'=>'',
					'subcategoryErr'=>'',
					'blogTextErr'=>'',
					'previewErr'=>''

			];
			// print_r($uploadedData);
			// echo "<br>";
			if(empty($uploadedData['title']))
			{
				$uploadedData['titleErr'] = 'title is empty';
				
			}
			else
			{
				if($this->blogmodel->checkUpdateblogTitle($BlogSlug,$uploadedData['title']) === false)
				{
					// echo 1;
					$uploadedData['titleErr'] = 'Title is used';
				}
				else
				{
					$slug = $uploadedData['title'];
					$slug=$this->slug($slug);
					 if($fetch=$this->blogmodel->checkblogslug($slug) == true)
					 {
					 	 $this->uniqueSlug=$slug .= '-'.time();
					 	
					 }
					 else
					 {
					 	$this->uniqueSlug =  $slug;
					 }

				}

			}

			if(empty($uploadedData['category']) && $uploadedData['category'] == 0)
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


			if($uploadedData['titleErr'] == "" && $uploadedData['categoryErr'] == "" && $uploadedData['subcategoryErr'] == "" && $uploadedData['blogTextErr'] == "" && $uploadedData['previewErr'] == "")
			{
				$data = [$uploadedData['title'],$this->uniqueSlug,$uploadedData['subcategory'],$uploadedData['blogText'],$uploadedData['blogImg'],$uploadedData['preview'],$BlogSlug];
				// print_r($data);
				$this->blogmodel->updateBlog($data);
				if($this->blogmodel->updateBlog($data) == true)
				{
					// echo 1;
					if(move_uploaded_file($tmpname,$dir))
					{
						echo 'image is  updated';
					}
					else
					{
						echo 'image is not updated';
					}
				}
				$this->redirect('usersBlog');
			}
			else
			{
				$data['uploadedData'] =$uploadedData;
				$this->view('userview/updateBlog',$data);
			}
			
		}
		else
		{
			echo 1;
		}

	}

	public function  DeleteBlog($blogslug)
	{
		if($this->blogmodel->deletePost($blogslug))
		{
			$this->redirect('usersBlog');
		}
		else
		{
			echo 'fail';
		}

	}
}

?>