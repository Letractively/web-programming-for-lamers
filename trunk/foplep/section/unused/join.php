             
<?php 
$error = $_SESSION['contact']['error'];

$fullname = $_SESSION['contact']['fullname'];
$email = $_SESSION['contact']['email'];
$message = $_SESSION['contact']['message'];
$country = $_SESSION['contact']['country'];
$age = $_SESSION['contact']['age'];
$how = $_SESSION['contact']['how'];

unset($_SESSION['contact']);
?>             
				<div style="position:absolute; z-index:1">
                    <div style="float:left; width:550px; position:absolute;">
                   
                        <?php $whitebox->open('', 583, 630, 'margin:4px 0 20px 0;'); ?>
                        <?php $whitebox->close(); ?>

                    </div>
                    
					<?php include("lateral-box.php"); ?>
                </div>
                
                
                
                <div style="float:left; width:550px; height:650px;">
                <div style="width:550px; position:relative;  z-index:3;">
    	            <div style="width:540px; height:362px; padding:20px 0 0 30px; margin:0 auto 0 auto; ">
                            <p>
                            <b>Join Us</b><br />
								Are you an NGO representative? <br />
								Would you like your organization to post activism opportunities our users can search and apply for? Then sign up below!
                            </p>
                            
                            <br />
							
                            <div id="registerform">
                            	<div style="float:left; width:125px; text-align:right;">
                                	Username:<br />
	                                NGO name:<br />
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
									$ngoname = $_SESSION['registration']['ngoname'];
									$email1 = $_SESSION['registration']['email1'];
									$email2 = $_SESSION['registration']['email2'];
									$country = $_SESSION['registration']['country'];
									$city = $_SESSION['registration']['city'];
									$state = $_SESSION['registration']['state'];
								?>
                                
                                <form action="action/user.php?a=ngoregistration" method="post">                                
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
                                            
                                        <input type="text" name="ngoname" maxlength="32" value="<?=$ngoname;?>" /> 
                                        
                                        <?php if ($error & 4) { ?>
	                                        <img src="img/form/star-red.gif" align="middle" popup="First name required" popupcolor="#fee" style="cursor:pointer" />    
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
                                            
                                        <div style="background-image:url(img/form/input-green.gif); width:250px; height:22px; margin:18px 0 0 0;">
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
                                <div style="margin:12px 0 0 37px; text-align:center;">
                                                                                 

                                        <input type="image" src="img/button/register.jpg" style="margin:10px 0 0 0;" />
                                </div>
                                </form>
                            </div>
                            
	                </div> 
                                                       
                </div>
                </div>       
                
                
                                
				<?php include("lateral-div.php"); ?>
                    
                
                
                <div style="clear:both;"></div>
                