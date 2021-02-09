<?php 
class blogmodel extends database
{
	public function checkblogTitle($title,$id)
	{

		if($this->query("SELECT `title` FROM `post` WHERE `title`= ? AND `userId`= ?",[$title,$id]))
		{

			if($this->rowCount()>0)
			{
				return false;
			}
			



		}
	}

	public function checkblogslug($slug)
	{
		// echo $slug;
		if($this->query("SELECT `BlogSlug` FROM `post` WHERE `BlogSlug` = ? ",[$slug]))
		{
			if($this->rowCount()>0)
			{
				return true;
				// $fetch=$this->fetchAll();
				// return $fetch;
			}
			else
			{
				return false;
				// return false;
			}


		}
		else
		{
			echo 'wrong query';
		}
	}

	public function Allblogslug()
	{
		if($this->query("SELECT `BlogSlug` FROM `post`"))
		{
			
				$fetch=$this->fetchAll();
				return $fetch;
			

		}
		else
		{
			echo 'wrong query';
		}

	}
	public function InsertBlogData($data)
	{
		if($this->query("INSERT INTO `post`(`userId`, `title`, `BlogSlug`, `subcateName`, `blogText`, `BlogImg`, `status`) VALUES (?,?,?,?,?,?,?)",$data))
		{
			return true;
		}
		else
		{
			echo 'wrong query';
		}
		// print_r($data);
	}

	public function getUpdateFormData($BlogSlug)
	{
		// echo $Blogid;
		if($this->query("SELECT P.* , c.category as category,u.userName ,(SELECT  category  FROM category WHERE id = c.parent) as parentcat ,(SELECT  id  FROM category WHERE id = c.parent) as parentcatId FROM post as p LEFT JOIN category as c ON p.subcateName = c.id   LEFT JOIN user as u ON u.user_id = p.userId  WHERE  p.BlogSlug = ?",[$BlogSlug]))
		{
			if($this->rowCount()>0)
			{
				if($getData=$this->fetchAll())
				{
					return $getData;
				}
			}
		}
	}


	public function checkUpdateblogTitle($upBlogslug,$upBlogTitle)
	{
		// echo $upBlogTitle;
		// echo $upBlogid;
		// SELECT `title` FROM `post` WHERE `title` = 'lion'  AND id != 7 
		if($this->query("SELECT `title` FROM `post` WHERE `title` = ?  AND `BlogSlug` != ?",[$upBlogTitle,$upBlogslug]))
		{
			if($this->rowCount()>0)
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
			
			echo 'wrong query';
		}
	}

	public function updateBlog($data)
	{
		print_r($data);
		// $keys = array_keys($data)
		if($this->query("UPDATE `post` SET `title`=?,`BlogSlug`=?,`subcateName`=?,`blogText`=?,`BlogImg`=?,`status`=? WHERE `BlogSlug`=?",$data))
		{
			return true;
		}
		else
		{
			echo 'wrong query';
		}
	}

	public function HomepageBlog()
	{
			if($this->query("SELECT P.* , c.category as category,u.userName ,(SELECT  category  FROM category WHERE id = c.parent) as parentcat ,(SELECT  id  FROM category WHERE id = c.parent) as parentcatId FROM post as p LEFT JOIN category as c ON p.subcateName = c.id   LEFT JOIN user as u ON u.user_id = p.userId  WHERE  p.status = ?",['publish']))
			{
				if($allBlogs=$this->fetchAll())
				{
					return $allBlogs;
				}
			}
	}
	public function AllBlogs()
	{
		if($this->query("SELECT * FROM `post`"))
		{
			if($allBlogs=$this->fetchAll())
			{
				return $allBlogs;
			}
		}
		else
		{
			echo 'wrong query';
		}
	}

	public function deletePost($blogSlug)
	{

		if($this->query("DELETE FROM `post` WHERE  `BlogSlug` =?",[$blogSlug]))
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