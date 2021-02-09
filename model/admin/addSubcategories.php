<?php


class addSubcategories extends database
{
	
	public function checkSlug($slug)
	{
		if($this->query('SELECT  `slugName`  FROM `category` WHERE `slugName`= ?',[$slug]))
		{
			if($row=$this->rowCount() > 0)
			{
				
				if($fetch=$this->fetchAll())
				{
					return $fetch;
				}
				else
				{
					return  0;
				}
			}
			else
			{
				return true;

			}
		}
		else
		{
			// echo 0;
		}

	}

	public function checkSubCategorySlug($slug)
	{

		if($this->query("SELECT * FROM `subcategory` WHERE `subCateSlugName`=?",[$slug]))
		{
			if($this->rowCount() > 0)
			{
				if($fetch =$this->fetchAll())
				{
					return $fetch;
				}
			}
			else
			{
				return true;
			}
		}
		else
		{
			echo 'wrong query';
		}
	}	

	public function checkcate($cate)
	{
		if($this->query('SELECT  `category`  FROM `category` WHERE `category`= ?',[$cate]))
		{
			if($row=$this->rowCount() > 0)
			{
				return false;		
			}
			else
			{
				return true;
			}

		}
		else
		{

		}
	}
	public function insertCategory($data)
	{
		// print_r($data);
		if($this->query("INSERT INTO `category`(`parent`, `slugName`, `category`) VALUES (?,?,?)",$data))
		{
			return true;
			
		}
		else
		{
			echo 'wrong query';
		}

	}


	public function Allcategory()
	{
		if($this->query("SELECT * FROM `category`   WHERE parent = ? ORDER BY `created_at`",[0]))
		{

			return $fetch=$this->fetchAll();
		}
		else
		{
			echo 0;
		}

	}

	public function previewCateData($id)
	{
		// if($this->query("SELECT *  FROM `category` WHERE `parent`= ? ",[$id]))
		
		if($this->query("SELECT c.*,(SELECT category FROM category WHERE id = c.parent ) as parentcat FROM `category`as c WHERE c.parent =?",[$id]))
		{
			if($this->rowCount()>0)
			{
				if($catedata=$this->fetchAll())
				{
					return $catedata;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	public function fetchCategory($id)
	{
		if($this->query("SELECT *  FROM `category` WHERE `id`=?",[$id]))
		{
			if($fetch=$this->fetchAll())
			{
				return $fetch;
			}
		}
		else
		{
			echo 'wrong query';
		}
	}
	public function fetchAllcategory()
	{
		if($this->query("SELECT * FROM category WHERE id IN (SELECT parent FROM category)"))
		{
			if($this->rowCount()>0)
			{
				if($Allcategory=$this->fetchAll())
				{
					return $Allcategory;
				}
			}
		}
		else
		{
			echo 'wrong query';
		}
	}

	public function allsubcategory($id)
	{
		if($this->query('SELECT * FROM `category` WHERE parent = ?',[$id]))
		{

			if($this->rowCount()>0)
			{
				if($subcate=$this->fetchAll())
			{
				echo json_encode($subcate);
			}
			else
			{
				echo 1;
			}
			}
			else
			{
				$data=[];
				echo json_encode($data);
			}
			
		}
		else
		{
			echo "wrong query";
		}
	}
	public function deleteCategory($cateId)
	{
		// echo $cateId;
		if($this->query("DELETE  FROM `category` WHERE id=?",[$cateId]))
		{
			if($this->query("DELETE c, p FROM `category` as c LEFT  JOIN post as p ON p.subcateName = c.id  WHERE c.parent = ?",[$cateId]))
			{
				// echo 'all deleted';
				return true;

			}
			else
			{
				echo 'nott';
			}
		}
		else
		{
			echo 'wrong query';
		}

	}

	public function deletesubCategory($subcateid)
	{
		// echo $subcateid;
		if($this->query("DELETE c, p FROM `category` as c LEFT  JOIN post as p ON p.subcateName = c.id  WHERE c.id = ?",[$subcateid]))
		{
			return true;
		}
		else
		{
			echo 'wrong query';
		}

	}
}

?>