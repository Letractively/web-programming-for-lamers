             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:293px; margin:40px auto 0 auto;">
                   
                        <?php 
							$whitebox->open('', 293, 200, 'margin:4px auto 20px auto;');			
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; position:relative;  z-index:3;">
    	            <div style="width:293px; height:200px; padding:5px 0 0 23px; margin:0 auto 0 auto;">
                    
							<form action="action/user.php?a=pass_recover" method="post">
                                <div id="loginform">
                                    <div style="float:left; margin:60px 0 0 10px;">
                                    
                                        <b>Email</b><br />
                                        <input type="text" name="email" maxlength="32" value="<?=$_SESSION['rec']['email']?>" /> <br /><br />
										
                                        <center>
                                        <input type="image" src="img/button/send.jpg" style="margin:10px 0 0 0;" />                                    
                                        </center>
                                        

                                        <?php 
										if ($_SESSION['rec']['error'] == 1) { ?>
                                        	
                                            <p style="color:#F00">
                                            	Password recovery code already sent
                                            </p>
                                        
                                        <?php } else if ($_SESSION['rec']['error'] == 2) { ?>
                                        
                                            <p style="color:#F00">
                                            	This email doesn't exists in our database
                                            </p>
                                            
                                        <?php } else if ($_SESSION['rec']['error'] == 3) { ?>
                                        
                                            <p>A verification code has been sent to your email</p>
                                            
                                        <?php }?>
                                        
                                        <?php unset($_SESSION['rec']); ?>
                                    </div>
                                </div>
                            </form>
                            
	                </div> 
                                       
                </div>

                                    
                
                <div style="clear:both"></div>