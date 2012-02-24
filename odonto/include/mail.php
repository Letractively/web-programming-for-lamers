<?php 

	
	function sendEmail($to, $mode, $par0='', $par1='', $par2='', $par3='', $par4='') {
	
		/*
			Modo 
			    0, 1: Registro mail
					@par0 = code
					@par1 = userid
					@par2 = name
					
				2: Contact
					@par0 = name
					@par1 = email
					@par2 = message
					@par3 = findout
					
				3: Join 
					@par0 = name
					@par1 = email
					@par2 = country
					@par3 = age
					@par4 = why
					
				4: Change Email
					@par0 = entire name

			    5: Registro mail NGO
					@par0 = code
					@par1 = userid
					@par2 = name
					
				6: Recover Password
					@par0 = code

				7: Recover Password 2
					@par0 = new password
					@par1 = user name

		*/
			$from="no-reply@cross-theline.com";			
			$reply="no-reply@cross-theline.com";
	
			switch ($mode) {
				case 0:
					$subject = "Cross The Line Registry"; break;
				case 1:
					$subject = "Cross The Line Registry"; break;
				case 5:
					$subject = "Cross The Line Registry"; break;				
				case 2:
					$subject = "Contact form"; break;
				case 3:
					$subject = "Join Us form"; break;
				case 4:
					$subject = "Change email"; break;
				case 6:
					$subject = "Password Recovery"; break;				
				case 7:
					$subject = "Password Recovery"; break;
			}
		
	
	
		
			$message = wordwrap($message, 150, "<br />\n", true);
			
			$subject = "Cross The Line - ".$subject;
			
			
			$body = '<html>';
			$body .= '<body style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">';
			$body .= '<table><tr><td width="800" height="49"><img src="'.ROOT.'/img/mail_header.jpg" /></td></tr>';
			$body .= '<tr><td><p style="margin-left:15px; padding-top:30px;">';	
			if ($mode==0) {
				
				$verify = ROOT.'/check.php?c='.$par0.'&id='.$par1;
				
				$body .= 'Hi '.$par2.', you has been registered as volunteer at <a href="'.ROOT.'">Cross the line</a> <br />
							In order to verify your email, you must click this link: <a href="'.$verify.'">'.$verify.'</a> <br />
							Thanks </p>';
			}
			
			
			if ($mode==2) {
				$body .= 'Name: '.$par0.' <br />
							Email: '.$par1.' <br />
							He/she found us by: '.$par3.' <br />
							Message: <br /><br />'.nl2br(htmlspecialchars($par2)).' </p>';
			}	
			
			if ($mode==3) {
				$body .= 'Name: '.$par0.' <br />
							Email: '.$par1.' <br />
							Country: '.$par2.' <br />
							Age: '.$par3.' <br />
							Why do he/she wants to be a part: <br /><br />'.nl2br(htmlspecialchars($par4)).' </p>';
			}
			
			if ($mode==4) {
				$body .= 'Hello '.$par0.', your email information has been changed. Now you will receive all Cross The Line emails to this Address.</p>
				<br /><br />
				<small>If you\'re not '.$par0.', please report the mistake. Thanks.</small>';
			}
			
			if ($mode==5) {
				
				$verify = ROOT.'/check.php?c='.$par0.'&id='.$par1;
				
				$body .= 'Hi '.$par2.', you has been registered as NGO at <a href="'.ROOT.'">Cross the line</a> <br />
							In order to verify your email, you must click this link: <a href="'.$verify.'">'.$verify.'</a> <br />
							Thanks </p>';
			}		
			
			if ($mode==6) {
				
				$verify = ROOT.'/check.php?recover=1&c='.$par0.'&email='.$to;
				
				$body .= 'A password reset has been sent from <a href="'.ROOT.'">Cross the line</a> <br />
							In order to reset your account password, you must click this link: <a href="'.$verify.'">'.$verify.'</a> <br />
							Thanks </p>';
			}
			
			if ($mode==7) {
				
				$body .= 'Your password has been resetted, your new account credentials are:<br />
							Username: <b>'.$par1.'</b> <br />
							Password: <b>'.$par0.'</b> <br /><br />						
							Now you can <a href="'.ROOT.'/?s=login">login</a> </p>';
			}				
					
			
			$body .= '</td></tr></table>';
			$body .= "</body>";
			$body .= "</html>";
			
			
		   
			$headers  = "From: Cross The Line <".$from.">\r\n";
			$headers .= "Reply-To:".nl2br($reply)."\r\n";
			$headers .= "Return-Path: ".nl2br($reply)."\r\n";
			$headers .= "X-Mailer:PHP/".phpversion()."\n";
			$headers .= "Mime-Version: 1.0\n";
			$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
			$headers .= 'Content-Transfer-Encoding: 7bit';			
			
			
			return mail($to,htmlspecialchars($subject),$body,$headers);
	}
	
?>