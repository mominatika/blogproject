<?php
class addSubCategory extends controller
{
	
	public function __construct()
	{
		if(!$this->getSession('AdminId'))
		{
		
			
			$this->redirect('ADlogin');
		}
		$this->HelperFile('validation');
		$this->cateModel = $this->model('admin/adCategory');
		$this->SubCatmodel=$this->model('admin/addSubcategories');

	} 
	public function index()
	{
		$data['cateData']=$this->cateModel->Allcategory();
		$this->view('admin/Addsubcategory',$data);
	}
	public function insertCate()
	{
		if(isset($_POST['CreateSubCat']))
		{
			
		
			$subcate = [
			'subcategory'=>cleanInput('subcategory'),
			'category'=>cleanInput('category'),
			'slugName'=>cleanInput('subcate_slug'),
			'subcategoryErr'=>'',
			'categoryErr'=>'',
			'slugNameErr'=>''

		];

		// $data['subcate']['subcategory'];

		if(empty($subcate['subcategory']))
		{
			$subcate['subcategoryErr'] = 'write subcategory';
		}
		else
		{



			echo $checkSubCatName=$this->SubCatmodel->checkcate($subcate['subcategory']);
			if($checkSubCatName === false)
			{
				$subcate['subcategoryErr'] = 'subcategory is exist';
			}
			else
			{
				if(empty($subcate['slugName']))
				{
						$slug=$subcate['subcategory'];
						 $slug=$this->slug($slug);
						$fetch=$this->SubCatmodel->checkSlug($slug);
						if($fetch === true)
						{
							$this->uniqueSlug =$slug;
						}
						else
						{
							$this->uniqueSlug = $slug .= "-".time();
						}
						

				}
				else
				{
						$slug=$subcate['slugName'];
						$slug=$this->slug($slug);
						$fetch=$this->SubCatmodel->checkSlug($slug);
						if($fetch === true)
						{
							$this->uniqueSlug =$slug;	
						}
						else
						{
							$this->uniqueSlug = $slug .= "-".time();
						}
						

				}
			}
		}

		
		if(!is_numeric($subcate['category']))
		{

			$subcate['categoryErr']= 'invalid value';

		}


		if($subcate['subcategoryErr'] == '' && $subcate['categoryErr'] == '')
		{


			$data = [$subcate['category'],$this->uniqueSlug,$subcate['subcategory']];
			if($this->SubCatmodel->insertCategory($data))
			{
				// echo 'category is created';
					// $subcateId = $subcate['category'];

					$this->redirect('category/CategoryList');
			}
			else
			{
				echo 0;
			}
			// echo 1;
		}
		else
		{
			$data['subcate'] = $subcate;
			$data['cateData']=$this->cateModel->Allcategory();
			$this->view('admin/Addsubcategory',$data);
		}

			// echo $subdata['subcategory'];

				// print_r($data);
		}
		
	}
	
	public function subcategory()
	{
		$data['subcategory']=$this->SubCatmodel->allsubcategory();
		// print_r($sub);
		$this->view('userview/selectsubcategory',$data);
	}


}

?>