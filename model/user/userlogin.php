<?php
class userlogin extends database
{
	public function login($email,$pwd)
	{
		if($this->query("SELECT * FROM `user` WHERE `email`=?",[$email]))
		{
			if($this->rowCount()>0)
			{
				if($fetch=$this->fetchAll())
				{
					$password=$fetch[0]->password;
					 $id=$fetch[0]->user_id;
					 if($password === md5($pwd))
					 {
					
					 	
					 	if($fetch[0]->userStatus != 'active')
					 	{
					 		return ['status'=>'inactive account'];
					 	}
					 	else
					 	{
					 		if($this->query("UPDATE `user` SET `lastLogin_at`= now() WHERE user_id =? ",[$id]))
						 	{
						 		return ['status' => 'ok','userId' => $id];
						 	}
						 	else
						 	{
						 		echo 'false';
						 	}

					 		
					 	}
					 }
					 else
					 {
					 	// echo 'wrong password';
					 	return ['status'=>'incorrect password'];
					 }
				}

			}
			else
			{
				// echo 'wrong Email';
				return ['status'=>'incorrect Email'];
			}
		}	
		else
		{
			echo 0;
		}	
	}


	


}

?>
