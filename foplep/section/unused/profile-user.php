 

<?php 
	if ($currentuser->obj->id == $login->obj->id) $edit = true;
?>
             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:900px; margin:10px auto 0 auto;">
                   
                        <?php 
							$whitebox->open('', 900, 650, 'margin:4px auto 20px auto;');
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; height:700px; position:relative;  z-index:3; float:left;">
    	            <div style="width:900px; height:700px; padding:40px 0 0 30px; margin:0 auto 0 auto;">
                    	
                        <div style="float:left; width:250px;">
                        	
                            <?php
								$avatar = "upload/".$currentuser->obj->avatar."-mini.jpg";
								if (!file_exists($avatar)) {
									$avatar = "img/user.jpg";
								}
							?>
                            
                            <div <?php echo($edit) ? 'id="useravatar"' : ''; ?> style="width:156px; height:168px;">
                            <img id="updateavatar-button" src="img/button/update.gif" border="0" class="popup-button" menu="updateavatar"
                            		style="cursor:pointer; display:none; position:absolute; z-index:10;" />
                        	<img src="<?=$avatar?>" border="0" /><br />
                            </div>

                            
                            <p style="font-style:italic; width:170px;"><?php echo($currentuser->obj->quote) ? '"'.$currentuser->obj->quote.'".' : '';?></p><br />
							
                            <?php if ($edit) { ?>
								
                                <div style="font-weight:bold; font-size:12px;">
                                    <a href="#" menu="editprofile1" class="popup-button">Edit my Profile</a><br />
                                    <a href="#" menu="preferences" class="popup-button">Edit my Preferences</a><br />
                                    <a href="#" menu="changepassword" class="popup-button">Change my password</a><br />
                                </div>
                            
                            <?php } else { ?>
                            
                                <img style="margin:0 0 8px 0;" src="img/button/addfriend.jpg" /><br />
                                <img src="img/button/sendmessage.jpg" /><br />
                                
                            <?php } ?>
                            
                            <p style="font-size:11px;">
                                Member since: <?=date("M Y",$currentuser->obj->date);?><br />
                                Last logged: <?=date("m/d/Y",$currentuser->obj->date);?><br />
                            </p>
                            
						</div>
                        
                        
                        <div id="profile-content" style="float:left; width:600px; height:430px; overflow:hidden; line-height:22px;">
                        	<div style="width:160px; height:75px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<b>First name:</b><br />
                                <b>Last name:</b><br />
                                <b>Occupation:</b>
                            </div>
                        	<div style="width:380px; height:75px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<?=$currentuser->obj->firstname;?><br />
                                <?=$currentuser->obj->lastname;?><br />
                                <?=$currentuser->obj->occupation;?>
                            </div>

							<div style="clear:both; height:8px;"></div>

							<?php if (($currentuser->obj->preferences & 1) || ($currentuser->obj->preferences & 2)) { ?>
                            
                                <div style="width:160px; height:95px; float:left; border-bottom:1px solid #cdecbf;">
                                    <?php if ($currentuser->obj->preferences & 1) {
                                        echo("<b>Email address:</b><br />");
                                    } ?>
                                    <?php if ($currentuser->obj->preferences & 2) {
                                        echo("<b>MSN:</b><br /> <b>Skype:</b><br /> <b>Gtalk:</b>");
                                    } ?>
                                    
                                </div>
                                <div style="width:380px; height:95px; float:left; border-bottom:1px solid #cdecbf;">
                                    <?php if ($currentuser->obj->preferences & 1) { ?>
                                        <a href="mailto:<?=$currentuser->obj->email;?>"><img border="0" src="img/icon/mail.gif" /></a> <?=$currentuser->obj->email;?><br />
                                    <?php } ?>
                                    
                                    <?php if ($currentuser->obj->preferences & 2) { ?>
                                        <?=$currentuser->obj->msn;?><br />
                                        <?=$currentuser->obj->skype;?><br />
                                        <?=$currentuser->obj->gtalk;?>
                                    <?php } ?>                                                        
                                    
    
                                </div>
                                
	                            <div style="clear:both; height:8px;"></div>                                
							<?php } ?>                                
                            

                            
                            <?php if ($currentuser->obj->preferences & 4) { ?>
                            
                        	<div style="width:160px; height:70px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<b>Country:</b><br />
                                <b>City:</b><br />
                                <b>Province/State:</b>
                            </div>
                        	<div style="width:380px; height:70px; float:left; border-bottom:1px solid #cdecbf;">
	                        	<?=$currentuser->obj->country;?><br />
                                <?=$currentuser->obj->city;?><br />
                                <?=$currentuser->obj->state;?>
                            </div>
                            
                            <?php } ?>
                            
                            <div style="clear:both; height:8px;"></div>
                            
                        	<div style="width:540px;">
                                    <div style="float:left; width:160px;">
                                        <b>Education:</b>
                                    </div>
                                    <div style="float:left; width:380px; margin-bottom:16px;">
                                        <?=nl2br(htmlspecialchars($currentuser->obj->education));?>
                                    </div>
                                    
                                    <div style="float:left; width:160px; clear:both;">
                                        <b>Work Experience:</b>
                                    </div>
                                    <div style="float:left; width:380px; margin-bottom:16px;">
                                        <?=nl2br(htmlspecialchars($currentuser->obj->work));?>
                                    </div>
                                    
                                    <div style="float:left; width:160px; clear:both;">
                                        <b>Interest and Goals:</b>
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
        	First Name:<br />
            <input name="firstname" type="text" maxlength="32" value="<?=$currentuser->obj->firstname;?>"/><br />
            Last Name:<br />
            <input name="lastname" type="text" maxlength="32" value="<?=$currentuser->obj->lastname;?>" />
        </div>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	Occupation:<br />
            <input name="occupation" type="text" maxlength="32" value="<?=$currentuser->obj->occupation;?>" /><br />
        </div>
        
        <div style="width:200px; float:left; margin:30px 0 0 0px; clear:both">
        	Email Address:<br />
            <input name="email" type="text" maxlength="32" readonly="readonly" value="<?=$currentuser->obj->email;?>"  style="background-color:#111"
            	ondblclick="$(this).removeAttr('readonly'); $(this).select(); $(this).css('background-color', '#464646')"
	            popup="Double click to change this. Make sure your new e-mail address is correct.<br />
                		A verification mail will be sent, if abuse is reported your account can be suspended." popupcolor="#ffd" /><br />
            GTalk:<br />
            <input name="gtalk" type="text" maxlength="32" value="<?=$currentuser->obj->gtalk;?>" />
        </div>
        <div style="width:200px; float:left; margin:30px 0 0 0px;">
        	MSN:<br />
            <input name="msn" type="text" maxlength="32" value="<?=$currentuser->obj->msn;?>" /><br />
            Skype:<br />
            <input name="skype" type="text" maxlength="32" value="<?=$currentuser->obj->skype;?>" />
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
        
        	Education:<br />
            <textarea name="education"><?=$currentuser->obj->education;?></textarea><br />
            Work Experience:<br />
            <textarea name="work"><?=$currentuser->obj->work;?></textarea><br />
            Interest and Goals:<br />
            <textarea name="interest"><?=$currentuser->obj->interest;?></textarea><br /><br />
            
            Quote:<br />
            <textarea style="height:40px;" name="quote"><?=$currentuser->obj->quote;?></textarea>            
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
            	Allow other users to see my email address. <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 2) echo('checked="checked"'); ?> value="2" /> 
            	Allow other users to see my instant messaging contact info (MSN, Skype). <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 4) echo('checked="checked"'); ?> value="4" /> 
            	Allow other users to see my location (Country, City). <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 8) echo('checked="checked"'); ?> value="8" /> 
            	Notify me by email every time I receive a new message. <br />
            <input type="checkbox" name="preferences[]" <?php if ($currentuser->obj->preferences & 16) echo('checked="checked"'); ?> value="16" /> 
            	Notify me by email every time a volunteer opportunity matching my areas of activism is uploaded. <br />

			</p>

          
        <div id="preferences-log" style="clear:both; height:40px; padding-top:5px;">
        	
        </div>
        <div>
        	<img id="preferences-save" style="cursor:pointer;" src="img/button/saveandclose.jpg" />                 
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
                
              