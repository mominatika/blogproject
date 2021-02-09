<?php

class category extends controller
{
	public function __construct()
	{
		if(empty($this->getSession('AdminId')))
		{
			$this->redirect('admin');
		}
		$this->HelperFile('validation');
		$this->cateModel = $this->model('admin/addSubcategories');
		$this->cateModel2= $this->model('admin/AdCategory');
	}
	public function index()	
	{
		$catelist=$this->cateModel->Allcategory();
		$this->view('admin/categoryTable',$catelist);

	}
	public function CategoryList()
	{
		$catelist=$this->cateModel->Allcategory();
		$this->view('admin/categoryTable',$catelist);
	}

	public function update_category($cate_id)
	{
		// echo $cate_id;
		
		// $cate_data['cateData']=$this->cateModel->fetchCategory($cate_id);
		$cate_data['AllcateData'] =$this->cateModel2->Allcategory();
		
			$fetch=$this->cateModel->fetchCategory($cate_id);
			$cate_data['upcateData']=[
				'cateData' => $fetch
			];
			$this->view('admin/updatecategory/',$cate_data);



	}

	public function updatecategory($cateid)
	{
		// echo $cateid;
		if(isset($_POST['UpdateCate']))
		{
			$fetch=$this->cateModel->fetchCategory($cateid);
			// print_r($fetch);

			$cateData = [
					'cateData' => $fetch,
					'category'=>cleanInput('category'),
					'categoryId'=>cleanInput('categoryid'),
					'slugName'=>cleanInput('cate_slug'),
					'categoryErr'=>'',
					'categoryIdErr'=>'',

			];
			if($cateData['category'] == "")
			{
				$cateData['categoryErr']= "write sub-subcategory";
			}
			else
			{
				$checkCatName=$this->cateModel2->checkCategory($cateData['category'],$cateid);
				if($checkCatName === false)
				{
					 $cateData['categoryErr'] = 'category is exist';
				}
				else
				{
					if(empty($cateData['slugName']))
					{
							$slug=$cateData['category'];
							 $slug=$this->slug($slug);
							$fetch=$this->cateModel->checkSlug($slug);
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
						$slug=$cateData['slugName'];
						$slug=$this->slug($slug);
						$fetch=$this->cateModel->checkSlug($slug);
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

			
			
			if($cateData['categoryErr'] == '' && $cateData['categoryIdErr'] == '')
			{
				$data = [$cateData['categoryId'],$this->uniqueSlug,$cateData['category'],$cateid];

						if($this->cateModel2->UpdateCategory($data))
						{
							$this->redirect('category/CategoryList/');
						}
						else{
							echo 'is not updated';
						}
			}
			else
			{
				$catedata['upcateData']=$cateData;
				$catedata['AllcateData'] =$this->cateModel2->Allcategory();
				$this->view('admin/updatecategory/',$catedata);
			}


		}	
		else
		{
			echo 0;
		}


	}

	public function checksubcategory($id)
	{
		return $this->cateModel->previewCateData($id);
	}
	public function previewcategory($id)
	{
		$data['catepreview'] = $this->checksubcategory($id);
		// print_r($data['catepreview']);
		$this->view('admin/categoryPreview',$data);	
		

	}
	public function catedelete()
	{
		$cateId=$_POST['deleteId'];
		// echo $_POST['id'];
		$deletecate=$this->cateModel->deleteCategory($cateId);

		if($deletecate == true)
		{
			echo $deletecate;
			// $this->redirect('category');
		}

		
	}
	public function deleteSubCate()
	{
		$subcatId=$_POST['id'];
		 $deletesubcate=$this->cateModel->deletesubCategory($subcatId);
		if($deletesubcate == true)
		{
			echo  $deletesubcate;
			
		}
		else
		{
			echo "wrong query";
		}

	}
}

?>