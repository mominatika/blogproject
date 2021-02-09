<?php
class usermodel extends database
{
	public function userData($id)
	{
		if($this->query("SELECT * FROM `user` WHERE `user_id` = ?",[$id]))
		{
			if($this->rowCount()>0)
			{
				if($fetch=$this->fetch())
				{
					return $fetch;
				}
				
			}
		}
		else
		{
			echo 0;
		}

	}
	public function updateAdminUserStatus($status,$userId)
	{
		if($this->query("UPDATE `user` SET `userStatus`= ? WHERE `user_id` = ?",[$status,$userId]))
		{
			echo $status;
		}
		else
		{
			echo 'wrong query';
		}
	}

	// public function AlluserProfile($userid)
	// {
	// 	if($this->query("SELECT u.* , p.* ,c.category FROM `user` as u LEFT JOIN post as p ON u.user_id = p.userId LEFT JOIN  category as c ON c.id = p.subcateName  AND c.id = p.subcateName WHERE    u.user_id =  ?",[$userid]))
	// 	{
	// 		if($this->rowCount()>0)
	// 		{
	// 			if($userData=$this->fetchAll())
	// 			{
	// 				return $userData;
	// 			}
	// 		}
	// 		else
	// 		{
				
	// 		}
	// 	}
	// 	else
	// 	{
	// 		echo 'wrong query';
	// 	}

	// }

	public function userProfile($userid)
	{
		if($this->query("SELECT u.*,COUNT(p.status) as `publishPost`, (SELECT COUNT(id) FROM post WHERE `userId`= u.user_id)as  totalPost   FROM `post` as p LEFT JOIN `user` as u  ON u.user_id=p.userId WHERE p.status = ? AND user_id = ? ",['publish',$userid]))
		{
			if($this->rowCount()>0)
			{
				if($userData=$this->fetch())
				{
					// print_r($userData);
					return $userData;
				}

				
			}

		}
	}

	public function updateProfile($data)
	{
		if($this->query("UPDATE `user` SET `userName`= ?,`userPhoto`= ?,`email`= ? WHERE user_id = ?",$data))
		{
			return true;
		}
		else
		{
		return false;
		}

	}

	public function allUsers()
	{
		if($this->query("SELECT * FROM `user` ORDER BY `created_at` DESC"))
		{
			if($AlluserList=$this->fetchAll())
			{
				return $AlluserList;
			}

		}
	}
	

}

?>