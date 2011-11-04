             
				<div style="position:absolute; z-index:1;">
                    <div style="float:left; width:550px; position:absolute;">
                   
                        <?php 
							$whitebox->open('', 583, 639, 'margin:4px 0 20px 0;');			
                            $whitebox->close();
                        ?>
                    </div>
                    
                    <div style="float:left; position:absolute;">
                        <?php				
                            $whitebox->open('', 292, 349, 'margin:4px 0 0 600px;');
                            $whitebox->close();
                        ?>                
                    </div>
                </div>
                
                
                <div style="float:left; width:550px;">
    	            <div style="width:550px; height:680px; padding:5px 0 0 23px; z-index:3; position:relative;">
                            <p>
                            	<b>Registration</b><br /><br />
								Become a member of Cross the Line and take your activism to the next level! 
                                As a CTL member, you can search for volunteer opportunities, keep an updated profile, 
                                get in touch with users who share your interests, and much more.                            
                            </p>
                            <br />
							
                            <div id="registerform">
                            	<div style="float:left; width:125px; text-align:right;">
                                	Username:<br />
	                                First Name:<br />
	                                Last Name:<br />
                                    Password:<br />
									Repeat Password:<br />
                                    Email:<br />
                                    Repeat Email:<br /><br />
                                    Country:<br />
									City:<br />
									Province / State:<br />
                                </div>
                                
                                <?php 
									$error = $_SESSION['registration']['error']; 
									$username = $_SESSION['registration']['username'];
									$firstname = $_SESSION['registration']['firstname'];
									$lastname = $_SESSION['registration']['lastname'];
									$email1 = $_SESSION['registration']['email1'];
									$email2 = $_SESSION['registration']['email2'];
									$country = $_SESSION['registration']['country'];
									$city = $_SESSION['registration']['city'];
									$state = $_SESSION['registration']['state'];
									$tac = $_SESSION['registration']['tac'];
								?>
                                
                                <form action="action/user.php?a=registration" method="post">                                
                                <div style="float:left; margin:0 0 0 10px;">
                                        <input type="text" name="username" maxlength="32" value="<?=$username;?>" /> 
                                        
                                        <?php if ($error & 1) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="Invalid username" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else if ($error & 2) { ?>
											<img src="img/form/star-red.gif" align="middle" popup="Username already exists" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else { ?>
                                        	<img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                        
                                        <br />
                                            
                                        <input type="text" name="firstname" maxlength="32" value="<?=$firstname;?>" /> 
                                        
                                        <?php if ($error & 4) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="First name required" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else { ?>
                                        	<img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                        
                                        <br />
                                            
                                        <input type="text" name="lastname" maxlength="32" value="<?=$lastname;?>" /> 
                                        
                                        <?php if ($error & 8) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="Last name required" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else { ?>
                                        	<img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                        
                                        <br />
                                            
                                        <input type="password" name="password1" maxlength="32" />
                                         
                                        <?php if ($error & 16) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="Password invalid" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else if ($error & 32) { ?>
											<img src="img/form/star-red.gif" align="middle" popup="Password fields doesn't match" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else { ?>
                                        	<img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                        
                                        <br />
                                            
                                        <input type="password" name="password2" maxlength="32" /> 
                                        
                                        <?php if ($error & 16) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="Password invalid" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else if ($error & 32) { ?>
											<img src="img/form/star-red.gif" align="middle" popup="Password fields doesn't match" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else { ?>
                                        	<img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                        
                                        <br />
                                            
                                        <input type="text" name="email1" maxlength="32" value="<?=$email1;?>" /> 
                                        
										<?php if ($error & 64) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email invalid" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else if ($error & 128) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email fields doesn't match" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else if ($error & 512) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email already exists" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else { ?>
                                            <img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                            
                                         <br />
                                            
                                        <input type="text" name="email2" maxlength="32" value="<?=$email2;?>" /> 
                                        
										<?php if ($error & 64) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email invalid" popupcolor="#fee" style="cursor:pointer" />    
                                        <?php } else if ($error & 128) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email fields doesn't match" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else if ($error & 512) { ?>
                                            <img src="img/form/star-red.gif" align="middle" popup="Email already exists" popupcolor="#fee" style="cursor:pointer"  />
                                        <?php } else { ?>
                                            <img src="img/form/star-green.gif" align="middle" />
                                        <?php } ?>
                                            
                                        <br />
                                        <br />
                                        
                                        <div style="background-image:url(img/form/input-green.gif); width:250px; height:22px; margin:8px 0 0 0;">
                                            <select name="country" style="border:0; width:248px; height:20px; margin:1px 0 0 1px;"> 
                                                <?php 
                                                    foreach($country_list as $ctry) { ?>
                                                        <option value="<?=$ctry;?>" <?php echo($country==$ctry) ? 'checked="checked"' : ''; ?> ><?=$ctry;?></option>
                                                <?php
                                                    }
                                                ?>
                                                
                                                <option disabled="disabled">-</option>
                                                <option value="Other">Other</option>                                                                               
                                            </select>
                                        </div>
                                        
                                        <input type="text" name="city" maxlength="32" value="<?=$city;?>" /> <br />
                                        <input type="text" name="state" maxlength="32" value="<?=$state;?>" /> <br />
                                </div>
                                <div style="clear:both;"></div>
                                <div style="margin:12px 0 0 37px;">
                                	
                                        
                                        
										<?php if ($error & 256) { ?>
                                        
											<p style="border:1px solid #F00; margin:0;" popup="You must be agreed with terms and conditions" popupcolor="#fee" >
	                                            <input name="tac" type="checkbox" <?php echo($tac) ? 'checked="checked"' : ''; ?> />
                                            	I have read and agreed to the <a href="?s=terms">terms and conditions.</a>
                                            </p>

                                        <?php } else { ?>
	                                        <p>
		                                        <input name="tac" type="checkbox" <?php echo($tac) ? 'checked="checked"' : ''; ?> />
												I have read and agreed to the <a href="?s=terms">terms and conditions.</a>
                                            </p>
                                        <?php } ?>
                                                                                 

                                        <input type="image" src="img/button/register.jpg" style="margin:10px 0 0 0;" />
                                </div>
                                </form>
                            </div>
                            
	                </div> 
                                       
                </div>
                
				<div style="float:left; width:340px;">
    	            <div id="twitter" style="width:260px; height:320px; margin:15px 0 0 70px; z-index:2; position:relative;"></div>
                </div>              
                    
                               
                
                <div style="clear:both"></div>
                
                <?php unset($_SESSION['registration']); ?>