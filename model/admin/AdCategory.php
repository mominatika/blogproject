<?php
class AdCategory extends database
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
	public function checkcate($cate)
	{
		if($this->query('SELECT  `category`  FROM `category` WHERE `category`= ?',[$cate]))
		{
			if($row=$this->rowCount() > 0)
			{
				return true;		
			}
			else
			{
				return false;
			}

		}
		else
		{

		}
	}



	public function insertCategory($data)
	{
		
		if($this->query("INSERT INTO `category`(`slugName`, `category`) VALUES (?,?)",$data))
		{
			return 1;
		}
		else
		{
			return 0;
		}


	}
	
	

	public function fetchCategory($cate_id)
	{
		if($this->query("SELECT * FROM `category` WHERE id=?",[$cate_id]))
		{
			if($fetch=$this->fetch())
			{
				return $fetch;
			}
		}
		else
		{
			echo 0;
		}
	}

	public function checkCategory($cate,$cateId)
	{
		
		if($this->query('SELECT `category` FROM `category` WHERE `category` = ?  AND  `id` !=  ? ',[$cate,$cateId]))
		{
			if($this->rowCount() >0)
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
			
			return false;
		}
	}

	
	public function UpdateCategory($data)
	{
		print_r($data);
	
		if($this->query("UPDATE `category` SET  `parent`= ? ,`slugName`= ?,`category`= ? WHERE `id` = ? ",$data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function previewCateData($id)
	{
		if($this->query("SELECT * FROM `subcategory` as sub INNER JOIN `category` as cat on sub.parentCate_id = cat.id WHERE cat.id= ?  ORDER BY sub.subcatecreated_at DESC  ",[$id]))
		{
			if($this->rowCount()>0)
			{
				if($catedata=$this->fetchAll())
				{
					return $catedata;
				}
			}
		}
		else
		{
			return false;
		}
	}

}









?>