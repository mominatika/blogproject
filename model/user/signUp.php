<?php 
class signUp extends database
{
	public function checkEmail($email)
	{
		if($this->query("SELECT * FROM `user` WHERE `email`= ? ",[$email]))
		{
			if($this->rowCount() > 0)
			{


				// echo 'email is exist';
				return false;
			}
			

		}
		else
		{
			echo 0;
		}
	}

	public function doRegister($data)
	{
		if($this->query("INSERT INTO `user`(`userName`, `email`, `password`,`userStatus`) VALUES (?,?,?,'inactive')",$data))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

}



?>