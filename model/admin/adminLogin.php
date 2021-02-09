<?php 
class adminLogin extends database
{

		public function  adminDOLogin($data)
		{

			if($this->query("SELECT * FROM `admin` WHERE `email` = ? ",[$data[0]]))
			{

				if($this->rowCount()>0)
				{

					$AdminData=$this->fetch();
					$AdminEmail = $AdminData->Email;
					$AdminName = $AdminData->AdminName;
					$AdminId = $AdminData->adminId;
					$AdminPwd = $AdminData->password;
					if($AdminPwd == $data[1])
					{
						// echo 1;
						 return  ['status' =>'ok','data'=>$AdminId];
					}
					else
					{
						// echo 0;
						 return ['status' => 'incorrect password'];
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
				echo  'wrong query';
			}
		}
		
	

}


?>