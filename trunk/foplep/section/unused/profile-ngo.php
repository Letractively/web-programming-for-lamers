 

<?php 
	if ($currentuser->obj->id == $login->obj->id) $edit = true;
?>
             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:900px; margin:10px auto 0 auto;">
                   
                        <?php 
							$whitebox->open('', 900, 500, 'margin:4px auto 20px auto;');
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; height:550px; position:relative;  z-index:3; float:left;">
    	            <div style="width:900px; height:550px; padding:40px 0 0 30px; margin:0 auto 0 auto;">
                    	
                        <div style="float:left; width:250px;">
                        	
                            <?php
								$avatar = "upload/".$currentuser->obj->avatar."-mini.jpg";
								if (!file_exists($avatar)) {
									$avatar = "img/user.jpg";
								}
							?>
                            
                            <div <?php echo($edit) ? 'id="useravatar"' : ''; ?> style="width:156px; height:168px; margin-bottom:10px;">
                            <img id="updateavatar-button" src="img/button/update.gif" border="0" class="popup-button" menu="updateavatar"
                            		style="cursor:pointer; display:none; position:absolute; z-index:10;" />
                        	<img src="<?=$avatar?>" border="0" /><br />
                            </div>

                           
							
                            <?php if ($edit) { ?>
								
                                <div style="font-weight:bold; font-size:12px;">
                                    <a href="#" menu="opportunity" class="popup-button">Add Volunteer Opportunity</a><br />
                                    <a href="#" menu="viewopportunities" class="popup-button">View my posted Opportunities</a><br />
                                    <br />                                
                                    <a href="#" menu="editprofile1" class="popup-button">Edit my Profile</a><br />
                                    <a href="#" menu="preferences" class="popup-button">Edit my Preferences</a><br />
                                    <a href="#" menu="changepassword" class="popup-button">Change my password</a><br />
                                </div>
                            
                            <?php } ?>
                            
                            <p style="font-size:11px;">
                                Member since: <?=date("M Y",$currentuser->obj->date);?><br />
                                Last logged: <?=date("m/d/Y",$currentuser->obj->date);?><br />
                            </p>
                            
						</div>
                        

                        <div id="profile-content" style="float:left; width:600px; height:430px;  line-height:22px;">
                        	<div style="width:160px; height:75px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<b>NGO Name:</b><br />
                                <b>Areas of Activism:</b><br />
                                <b>Location:</b>
                            </div>
                        	<div style="width:380px; height:75px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<?=$currentuser->obj->firstname;?><br />
                                <?=$currentuser->obj->lastname;?><br />
	                        	<?=$currentuser->obj->city;?> <?=$currentuser->obj->state;?>, <?=$currentuser->obj->country;?><br />
                            </div>

                            <div style="clear:both; height:8px;"></div>
                            
                            
                        	<div style="width:540px;">
                                    <div style="float:left; width:160px;">
                                        <b>Who we are:</b>
                                    </div>
                                    <div style="float:left; width:380px; margin-bottom:16px;">
                                        <?=nl2br(htmlspecialchars($currentuser->obj->education));?>
                                    </div>
                                    
                                    <div style="float:left; width:160px; clear:both;">
                                        <b>What we do:</b>
                                    </div>
                                    <div style="float:left; width:380px; margin-bottom:16px;">
                                        <?=nl2br(htmlspecialchars($currentuser->obj->work));?>
                                    </div>
                                    
                                    <div style="float:left; width:160px; clear:both;">
                                        <b>Who we're looking for:</b>
                                    </div>
                                    <div style="float:left; width:380px; margin-bottom:16px;">
                                        <?=nl2br(htmlspecialchars($currentuser->obj->interest));?>
                                    </div>                                                              
                                    
                                    <div style="clear:both"></div>
                            </div>                                                  
                                                                            
                            
						</div>                        
                            
	                </div>           
                </div>

                                    
                
                <div style="clear:both"></div>
                





<!-- Popups -->   





<div class="popupblack" id="editprofile1">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Edit Profile (Page 1 of 3)</h2>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	NGO Name:<br />
            <input name="firstname" type="text" maxlength="32" value="<?=$currentuser->obj->firstname;?>"/><br />
        </div>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        </div>
        
        <div style="width:200px; float:left; margin:30px 0 0 0px; clear:both">
        	Email Address:<br />
            <input name="email" type="text" maxlength="32" readonly="readonly" value="<?=$currentuser->obj->email;?>"  style="background-color:#111"
            	ondblclick="$(this).removeAttr('readonly'); $(this).select(); $(this).css('background-color', '#464646')"
	            popup="Double click to change this. Make sure your new e-mail address is correct.<br />
                		A verification mail will be sent, if abuse is reported your account can be suspended." popupcolor="#ffd" /><br />
        </div>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">

        </div>
        
        <div style="width:200px; float:left; margin:30px 0 0 0px; clear:both">
        	Country:<br />
            <input name="country" type="text" maxlength="32" value="<?=$currentuser->obj->country;?>" /><br />
            Province/State:<br />
            <input name="state" type="text" maxlength="32" value="<?=$currentuser->obj->state;?>" />
        </div>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	City:<br />
            <input name="city" type="text" maxlength="32" value="<?=$currentuser->obj->city;?>" /><br />
        </div>
        <div id="editprofile1-log" style="clear:both; height:60px; padding-top:20px;">
        	
        </div>
        <div>
        	<img id="editprofile1-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />
        	<img id="editprofile1-next" style="cursor:pointer;" src="img/button/saveandnext.jpg" />            
        </div>
    </div>

    
</div>
           
                
<div class="popupblack" id="editprofile2">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Edit Profile (Page 2 of 3)</h2>
        
        	Who we are:<br />
            <textarea name="education"><?=$currentuser->obj->education;?></textarea><br />
            What we do:<br />
            <textarea name="work"><?=$currentuser->obj->work;?></textarea><br />
            Who we're looking for:<br />
            <textarea name="interest"><?=$currentuser->obj->interest;?></textarea><br /><br />
            
        <div id="editprofile2-log" style="clear:both; height:100px; padding-top:20px;">
        	
        </div>
        <div>
        	<img id="editprofile2-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />
        	<img id="editprofile2-next" style="cursor:pointer;" src="img/button/saveandnext.jpg" />            
        	<img id="editprofile2-back" style="cursor:pointer;" src="img/button/saveandback.jpg" />                      
        </div>            
    </div>
</div>


<div class="popupblack" id="editprofile3">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Edit Profile (Page 3 of 3)</h2><br />
        
        	Area(s) of Activism:<br />
            <?php foreach($area_list as $area) { ?>
            
            <input type="checkbox" name="area[]" <?php if (strstr($currentuser->obj->areas, $area)) echo('checked="checked"'); ?> value="<?=$area?>" /> <?=$area?> <br />
            
            <?php } ?>
          
        <div id="editprofile3-log" style="clear:both; height:40px; padding-top:5px;">
        	
        </div>
        <div>
        	<img id="editprofile3-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />
        	<img id="editprofile3-back" style="cursor:pointer;" src="img/button/saveandback.jpg" />                     
        </div>            
    </div>
</div>
       


<div class="popupblack" id="preferences">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Edit Profile (Page 3 of 3)</h2><br />
        
        	Area(s) of Activism:<br />
            
            <p style="font-weight:normal;">
            
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 1) echo('checked="checked"'); ?> value="1" /> 
            	Allow other users to see my areas of activism <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 4) echo('checked="checked"'); ?> value="4" /> 
            	Allow other users to see my location. <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 8) echo('checked="checked"'); ?> value="8" /> 
            	Notify me by email every time I receive a new message. <br />


			</p>

          
        <div id="preferences-log" style="clear:both; height:40px; padding-top:5px;">
        	
        </div>
        <div>
        	<img id="preferences-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />                 
        </div>            
    </div>
</div>      


<div class="popupblack" id="opportunity" >
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:15px 0 0 20px; line-height:14px;">
		<h2>Add Volunteer Opportunity</h2><br /><br />

            <input name="ngo" type="hidden" value="<?=$currentuser->obj->id?>"/>

        	Volunteer Opportunity Title:<br />
            <input name="title" type="text" maxlength="32" value=""/><br /><br />

            
            <div style="float:left; width:200px;">
            
                Required Volunteer Age:<br />
                <select name="age">
                    <?php 
                        for ($i=18; $i<=29; $i++) {
                            echo('<option value="'.$i.'">'.$i.'</option>');
                        }
                    ?>
                    <option value="30 or more">30 or more</option>
                </select><br />
                
                Country:<br />
                <select name="country">
                    <?php 
                        foreach ($country_list as $country) {
							if ($country == $currentuser->obj->country) {
	                            echo('<option value="'.$country.'" selected="selected">'.$country.'</option>');
							} else {
								echo('<option value="'.$country.'">'.$country.'</option>');
							}
                        }
                    ?>
                </select> 
                                       
            </div>
            

            <div style="float:left; width:200px;">
            
                Duration:<br />
                <select name="duration">
                    <?php 
                        foreach ($duration_list as $duration) {
                            echo('<option value="'.$duration.'">'.$duration.'</option>');
                        }
                    ?>
                </select><br />
    
                City:<br />   
                <input name="city" type="text" maxlength="32" value="<?=$currentuser->obj->city?>"/><br />
                              
            </div>            
            
            
            <div style="clear:both; height:40px;"><br />Area(s) of Activism:</div>   
                     
            
            <div style="float:left; width:160px; font-weight:normal;">
            
            <?php 
				$i = 0;
				foreach($area_list as $area) {
					if ($i == 6) {
						echo('</div> <div style="float:left; width:160px; font-weight:normal;">');
						$i = 0;						
					}
			?>
            
            <input type="checkbox" name="area[]" <?php if (strstr($currentuser->obj->areas, $area)) echo('checked="checked"'); ?> value="<?=$area?>" /> <?=$area?> <br />
            
            <?php 
				$i++;
				} 
			?>

			</div>
            
            <div style="clear:both;">
                <br />Activity Description:<br />
                <textarea name="description"></textarea>
            </div>
            
            <div style="clear:both;">
                <br />Search Tags (separated by commas):<br />
                <input name="tags" type="text" maxlength="1024" style="width:430px;" /><br />
            </div>            

          
        <div id="opportunity-log" style="clear:both; height:40px; padding-top:5px;">
        	
        </div>
        <div>
        	<img id="opportunity-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />                 
        </div>            
    </div>
</div>
       
                
<div class="popupblack" id="changepassword">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Change Password</h2>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	Current Password:<br />
            <input name="oldpassword1" type="password" maxlength="32" /><br />
            New Password:<br />
            <input name="newpassword1" type="password" maxlength="32" />
        </div>
        <div style="width:150px; float:left; margin:30px 0 0 0;">
        	Repeat current Password:<br />
            <input name="oldpassword2" type="password" maxlength="32" /><br />
            Repeat new Password:<br />
            <input name="newpassword2" type="password" maxlength="32" />
        </div>
        <div id="changepassword-log" style="clear:both; height:240px; padding-top:20px;">
        	
        </div>
        <div>
        	<img id="changepassword-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />
        </div>
    </div>
</div>




<div class="popupblack" id="updateavatar">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Update Picture</h2>
        <form action="action/user.php?a=updateavatar" method="post" enctype="multipart/form-data">
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	Select File:<br />
            
	            <input name="image" type="file" />

        </div>
        <div id="updateavatar-log" style="clear:both; height:30px; padding-top:20px;">
        	
        </div>
        <div>
	        	<input type="image" src="img/button/saveandclose.jpg" />
           
        </div>
        </form>         
    </div>
</div>                


<div class="popupblack" id="viewopportunities">
    <img class="closeblack" style="float:right; cursor:pointer;" src="img/button/close.jpg" />
    <div style="margin:40px 0 0 20px;">
		<h2>Posted opportunities</h2>

        <div style="width:600px; float:left; margin:30px 0 0 0px;">

<?php 
	$result = $db->query("SELECT * FROM ctl_works WHERE ngo=".$currentuser->obj->id);
	while ($row = $db->fetch($result)) {
?>
	<div style="width:300px; float:left;"><?=$row->title;?></div><div style="width:80px; float:left;"> <?=date("m/d/y", $row->date);?> </div>
    <div style="width:80px; float:left;">
    	<a href="?s=work&id=<?=$row->id;?>"><img src="img/icon/view-black.jpg" border="0" /></a> 
        <a href=""> <img src="img/icon/edit-black.jpg" border="0" /> </a> 
        <a href=""> <img src="img/icon/delete-black.jpg" border="0" /> </a>
    </div>
    <div style="clear:both"></div>
<?php	
	}
?>

        </div>
        <div id="viewopportunities-log" style="clear:both; height:30px; padding-top:20px;">
        	
        </div>
        <div>
	        	<input type="image" src="img/button/close-green.jpg" />
           
        </div>

    </div>
</div> 






<?php 

if ($_SESSION['profile']['img']) {
	
?>
    <script type="text/javascript">
		alert("<?=$_SESSION['profile']['img'];?>");
	</script>
    
<?php

	unset($_SESSION['profile']['img']);
}
?>              