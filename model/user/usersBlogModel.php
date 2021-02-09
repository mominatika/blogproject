<?php
class usersBlogModel extends database
{
	public function FetchUserBlog($id)
	{
		if($this->query("SELECT P.* ,c.category as category,u.userName ,(SELECT  category FROM category WHERE id = c.parent) as parentcat FROM post as p LEFT JOIN category as c ON p.subcateName = c.id   LEFT JOIN user as u ON u.user_id = p.userId  WHERE  p.userId = ?",[$id]))
		{
				if($this->rowCount() > 0)
				{
					if($userBlog=$this->fetchAll())
					{
						return $userBlog;
					}
				}
				else
				{
					return false;
				}
		}
		else
		{
			echo 'wrong query';
		}

	}
}

// public function 
?>