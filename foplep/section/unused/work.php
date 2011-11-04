 

<?php 
	//if ($currentwork->obj->ngo == $login->obj->id) $edit = true;

?>
             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:900px; margin:10px auto 0 auto;">
                   
                        <?php 
							$whitebox->open('', 900, 480, 'margin:4px auto 20px auto;');
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; height:500; position:relative;  z-index:3; float:left;">
    	            <div style="width:900px; height:500px; padding:40px 0 0 30px; margin:0 auto 0 auto;">
                    	
                        <div style="float:left; width:250px;">
                        	
                            <?php
								$avatar = "upload/".$currentngo->obj->avatar."-mini.jpg";
								if (!file_exists($avatar)) {
									$avatar = "img/user.jpg";
								}
							?>
                            
                            <div <?php echo($login->isLogged()) ? 'id="useravatar"' : ''; ?> style="width:156px; height:168px;">
                                <img id="updateavatar-button" src="img/button/update.gif" border="0" class="popup-button" menu="updateavatar"
                                        style="cursor:pointer; display:none; position:absolute; z-index:10;" />
                                        
                                <a style="color:#000; text-decoration:underline;" href="?s=profile&id=<?=$currentngo->obj->id;?>">
                                    <img src="<?=$avatar?>" border="0" /><br />
                                </a>
                            </div>

								<p><b>NGO:</b> <a style="color:#000; text-decoration:underline;" 
                                					href="?s=profile&id=<?=$currentngo->obj->id;?>"><?=$currentngo->obj->firstname;?></a></p>
                                
                                <img style="margin:0 0 8px 0;" src="img/button/applyasvolunteer.jpg" /><br />
                                

                            
                            <p style="font-size:11px;">
                                Posted on: <?=date("m/d/Y",$currentwork->obj->date);?><br />
                            </p>
                            
						</div>
                        
                        
                        <div style="float:left; width:600px; height:700px; overflow:hidden; line-height:22px;">
                        	
                            <h3><?=$currentwork->obj->title;?></h3>
                            
                            <div id="profile-content" style="height:260px;">
	                            <p><?=htmlspecialchars($currentwork->obj->description);?></p>
                            </div>

							<div style="clear:both; height:8px; width:540px; border-bottom:1px solid #cdecbf;"></div>

                            
                            <div style="clear:both; height:8px;"></div>
                            
                        	<div style="width:270px; height:60px; float:left; border-bottom:1px solid #cdecbf; line-height:22px;">
	                        	<b>Required Volunteer Age:</b> <?=$currentwork->obj->age;?><br />
                                <b>Area of activism:</b> <?=$currentwork->obj->area;?>
                            </div>
                        	<div style="width:270px; height:60px; float:left; border-bottom:1px solid #cdecbf; line-height:22px;">
	                            <b>Location:</b> <?=$currentwork->obj->location;?><br />
    	                        <b>Duration:</b> <?=$currentwork->obj->duration;?>
                            </div>
                            
                            <div style="clear:both; height:8px;"></div>                                                 
                                                                            
                            
		                    <p style="font-size:11px;">Search tags:   
								<?php 
                                
                                    $tagarray = explode(",", $currentwork->obj->tags); 
                                    foreach($tagarray as $tag) {
										$tag = trim($tag);
                                        echo('<a href="?s=results&f='.$tag.'"> '.$tag.'</a>');
                                    }
                                
                                ?>
                            </p>
						</div>                        
                    
                           
	                </div>           
                </div>

                
                
                <div style="clear:both"></div>
                
              