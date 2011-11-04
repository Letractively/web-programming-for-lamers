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
                   
                        <?php $whitebox->open('', 583, 570, 'margin:4px 0 20px 0;'); ?>
                        <?php $whitebox->close(); ?>

                    </div>
                    
                    <div style="float:left; position:absolute;">
                        <?php				
                            $whitebox->open('', 292, 349, 'margin:4px 0 0 600px;');
                            $whitebox->close();
                        ?>                
                    </div>
                </div>
                
                
                <form method="post" action="action/contact.php?a=contact">
                
                <div style="float:left; width:550px;">
    	            <div style="width:550px; height:570px; padding:5px 0 0 23px; z-index:2; position:relative;">
                            <p>We’d love to hear your opinion on our website and how we can improve our work. Please don’t hesitate to let us know what you think, and we’ll get back to you as soon as possible.</p>
                            
                            
                            <div style="padding:0 0 0 6px;"> Full name: </div>
                               
                            <div style="background-image:url(img/combo.jpg); width:280px; height:32px; margin:6px 0 16px 0;"> 
									<input name="fullname" type="text" maxlength="32" class="homeselect" value="<?=$fullname?>" />
                                    
									<?php if ($error & 1) { ?>
	                                    <img src="img/form/star-red.gif" align="middle" popup="Name is required" popupcolor="#fee" style="cursor:pointer" />    
                                    <?php } ?>                                      
                            </div>
                            
                            <div style="padding:0 0 0 6px;"> Email: </div>
                               
                            <div style="background-image:url(img/combo.jpg); width:280px; height:32px; margin:6px 0 16px 0;"> 
									<input name="email" type="text" maxlength="32" class="homeselect" value="<?=$email?>" />
                                    
									<?php if ($error & 2) { ?>
	                                    <img src="img/form/star-red.gif" align="middle" popup="Valid email needed" popupcolor="#fee" style="cursor:pointer" />    
                                    <?php } ?>                                        
                            </div>
                            

                            <div style="padding:20px 0 0 6px;"> Message: </div>
                            
                            <textarea class="text-green" name="message"><?=$message;?></textarea><br />
									<?php if ($error & 4) { ?>
	                                    <img src="img/form/star-red.gif" align="middle" popup="Write a message!" popupcolor="#fee" style="cursor:pointer" />    
                                    <?php } ?>                              
                                                  
                            <div style="padding:0 0 0 6px;"> How did you find out about Cross The Line? </div>
                               
                            <div style="background-image:url(img/combo.jpg); width:280px; height:32px; margin:6px 0 6px 0;">
                            		<select class="homeselect" name="how">
                            		<?php 
										$h_array = array('A friend told me', 'Google or any other search engine', 'Forum', 'From another website');
										
										foreach($h_array as $h) {
											
											if ($h == $how) {
												echo('<option value="'.$h.'" selected="selected">'.$h.'</option>');
											} else {
												echo('<option value="'.$h.'">'.$h.'</option>');												
											}
										}
                                    ?>
                                    </select>   
                            </div>
                            
                            
                            <div style="padding:20px 0 0 6px;"> Repeat security code: </div>
                            
                            <div style="background-image:url(img/combo.jpg); width:280px; height:32px; margin:6px 0 6px 0;"> 
                             
                            <img src="numbers-img.php" onclick="this.src='numbers-img.php?rnd='+Math.random();" align="absmiddle" 
                                style="cursor:pointer; margin:0 0 0 10px;" />             
                            <input maxlength="6" type="text" name="captcha" value="000000"
                                style="margin:5px 15px 15px 0px; background-color:#fff; border:0; height:16px; width:145px; color:#444; text-align:right; font-size:14px;"
                                	onclick="$(this).select();"/>
                                    
									<?php if ($error & 8) { ?>
	                                    <img src="img/form/star-red.gif" align="middle" popup="Verification code invalid" popupcolor="#fee" style="cursor:pointer" />    
                                    <?php } ?>                                       
                           </div>         
                   
                   
                            <br />                                      

                            <input type="image" src="img/button/send.jpg" />                            


	                </div>                 
                </div>
                
                </form>
                
                <div style="float:left; width:340px;">
    	            <div style="width:260px; height:320px; margin:15px 0 0 70px; z-index:2; position:relative;">
                    <b>...or just write to us directly.</b>
                    <br />
               
                    <p>
                        <b>Maria Huerta</b><br />
                        Head of Staff<br />
                        mariahuerta.u@gmail.com<br />
                    </p>
                    
                    <p>
                        <b>Fiorella Belli</b><br />
                        CTL Volunteer Coordinator<br />
                        fiorellabelli@gmail.com<br />
                    </p>
                    
                    <p>                    
                        <b>Metheus Ortega</b><br />
                        Logistics<br />
                        matheus_ortega@hotmail.com<br />
                    </p>
                    
                                        
                    </div>
                </div>
                    
                                    
                
                <div style="clear:both"></div>