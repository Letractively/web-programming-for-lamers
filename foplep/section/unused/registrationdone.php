             
				<div style="position:absolute; z-index:1;">
                    <div style="float:left; width:550px; position:absolute;">
                   
                        <?php 
							$whitebox->open('', 583, 349, 'margin:4px 0 20px 0;');			
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
                
                <?php 
						$email = $_SESSION['registration']['email1'];
				?>
                
                <div style="float:left; width:550px;">
    	            <div style="width:550px; height:680px; padding:5px 0 0 23px; z-index:3; position:relative;">
                            <p>
                            	<b>Registration</b><br /><br />
								Congratulations, a mail has been sent to <a href="mailto:<?=$email?>"><?=$email?></a>. <br />
                                Check your inbox to confirm; <br />
                                Remember to look over the junk/spam folder, maybe you'll need to mark our site as wanted email.
                            </p>
                            <br />

                            
	                </div> 
                                       
                </div>
                
                <div style="float:left; width:340px;">
    	            <div style="width:260px; height:349px; margin:15px 0 0 70px; z-index:2; position:relative;">
	                	<h1 style="color:#000;">one-click</h1>
                        <p style="color:#8eb212;">
	                        ecology, poverty, social justice, education, children, welfare, AIDS, 
                            school, child support, latin america, greenpeace, construction, health, 
                            housing, political, non-profit, food, transportation, green, poverty relief, 
                            disease prevention, vaccines, third age, animal rights, exploration, 
                            natural disasters, deforestation, nutrition, water, third world
                        </p>
                    </div>
                </div>                
                    
                               
                
                <div style="clear:both"></div>
                
                <?php unset($_SESSION['registration']); ?>