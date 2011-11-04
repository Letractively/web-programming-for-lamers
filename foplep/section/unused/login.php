             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:293px; margin:40px auto 0 auto;">
                   
                        <?php 
							$whitebox->open('', 293, 362, 'margin:4px auto 20px auto;');			
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; position:relative;  z-index:3;">
    	            <div style="width:293px; height:362px; padding:5px 0 0 23px; margin:0 auto 0 auto;">
                    
							<form action="action/user.php?a=login" method="post">
                                <div id="loginform">
                                    <div style="float:left; margin:60px 0 0 10px;">
                                    
                                        <b>Username</b><br />
                                        <input type="text" name="username" maxlength="32" value="<?=$_SESSION['log']['username'];?>" /> <br /><br />
                                        <b>Password</b><br />                                   
                                        <input type="password" name="password" maxlength="32" />
                                        <br />
                                        <small> Did you <a href="?s=pass_recover">forget your password?</a> </small>
                                        
                                        <br /><br />
    
                                        <input type="image" src="img/button/login.jpg" style="margin:10px 0 0 0;" />                                    
                                        <br /><br />
                                        <?php 
										if ($_SESSION['log']['error'] == 1) { ?>
                                        	
                                            <p style="color:#F00">
                                            	*Username and password doesn't match
                                            </p>
                                        
                                        <?php } else if ($_SESSION['log']['error'] == 2) { ?>
                                        
                                            <p style="color:#F00">
                                            	*Your must verify your account before you can login!
                                            </p>
                                            
                                        <?php } ?>
                                        <input type="checkbox" name="remember" <?php echo($_SESSION['log']['remember']) ? 'checked="checked"' : '';?> /> 
                                        <small>Stay logged in (Remember me)</small><br />
                                        
                                        <?php unset($_SESSION['log']); ?>
                                    </div>
                                </div>
                            </form>
                            
	                </div> 
                                       
                </div>

                                    
                
                <div style="clear:both"></div>