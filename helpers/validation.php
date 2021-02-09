<?php

	function cleanInput($input)
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		
		$input=$_POST[$input];
		
		
		}
		else if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$input = $_GET[$input];
		}
		$input = trim($input);
		$input =stripslashes($input);
		$input =strip_tags($input);
	
		return $input;

	}


	function checkname($fname)
	{
	$pattern = '/^[a-zA-Z\s]+$/';

								
	if(preg_match($pattern,$fname))
	{
	return true;
	}	
								
								
	}



	 function EmailValidation($email)
	{
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
		 $email_pattern ="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
		if(preg_match($email_pattern, $email))
			{
			return true;
			}
			
		}
								
	}

	function PasswordValidation($pwd)
	{
		$pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';

								if(preg_match($pattern,$pwd))
								{
									return true;

								}
	}
?>