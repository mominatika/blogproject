<?php

		function email($to,$sub,$message)
		{
			require_once  __DIR__."/../../PHPMailer/PHPMailerAutoload.php";
			$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gamil.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'atikamomin97@gamil.com';                 // SMTP username
			$mail->Password = '8697h@nif@#Atika';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('atikamomin97@gmail.com', 'Atika Momin');
			$mail->addAddress($to);     // Add a recipient

			$mail->Subject = $sub;
			$mail->Body = $message;
			
			if(!$mail->send())
			{
				// var_dump($mail->send());
				echo 'message is not send';
			}
			else
			{
				echo 'message send successfully';
			}
		}
		
?>