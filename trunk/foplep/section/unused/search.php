             
				<div style="position:absolute; z-index:1">
                    <div style="float:left; width:550px; position:absolute;">
                   
                        <?php $whitebox->open('', 583, 500, 'margin:4px 0 20px 0;'); ?>
                        <?php $whitebox->close(); ?>
                    </div>
                    
                    <div style="float:left; position:absolute;">
                        <?php				
                            $whitebox->open('', 292, 349, 'margin:4px 0 0 600px;');
                            $whitebox->close();
                        ?>                
                    </div>
                </div>
                
                
                <div style="float:left; width:550px;">
                    
                    <form id="searchform" method="get" action="index.php">
                    <div id="advancedsearch" style="width:550px; height:500px; margin:35px 0 0 26px; z-index:2; position:relative;">
                                
                                <input name="s" value="results" type="hidden" />
                                
                                
                                <div>
                                
                                    <b>NGO Name:</b><br />
                                    
                                    <input name="ngo" maxlength="32" type="text" /><br />
                                    
                                    <b>Required Volunteer Age:</b><br />
                                    
                                    <input name="age" maxlength="32" type="text" /><br />                                
                                    
                                    <b>Area of Activism:</b>
                                    
                                    <div style="background-image:url(img/form/input-green.gif); width:251px; height:23px; margin:6px 0 8px 0;"> 
                                    
                                        <select name="area">
                                            <?php 
                                                foreach($area_list as $area) { ?>
                                                    <option value="<?=$area;?>"><?=$area;?></option>                                    
                                            <?php
                                                }
                                            ?>
                                                                                
                                            <option disabled="disabled">-</option>
                                            <option value="" selected="selected">All</option>                                    
                                        </select>
                            
                                    </div>
                                
                                </div>
                                
                                
                                <div style="float:left; clear:both;">
                                
                                    <b>Country:</b>
                                    
                                    <div style="background-image:url(img/form/input-green.gif); width:251px; height:23px; margin:6px 0 16px 0;"> 
                                        <select name="country">
                                            <?php 
                                                foreach($country_list as $country) { ?>
                                                    <option value="<?=$country;?>"><?=$country;?></option>                                    
                                            <?php
                                                }
                                            ?>
                                            
                                            <option disabled="disabled">-</option>
                                            <option value="" selected="selected">All</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div style="float:right">
                                    <b>...and/or Province:</b><br />
                                    
                                    <input name="province" maxlength="32" type="text" /><br />
                                    
                                    <b>...and/or City:</b><br />
                                    
                                    <input name="city" maxlength="32" type="text" /><br /> 
                                </div>
                                
                                <div style="clear:both;">
                                    <b>Position duration:</b><br />
                                    
                                    <input name="duration" maxlength="32" type="text" /><br />
                                    
                                    <b>Keywords:</b><br />
                                    
                                    <input name="f" maxlength="32" type="text" /><br /> 
                                </div>                                                                
                                

								
                                <div style="margin:10px 0 0 0; font-size:12px;">
                                    <img id="searchform-submit" src="img/button/search.jpg" style="margin:20px 0 0 4px; cursor:pointer;"/>
                                </div>
                    </div>
                    </form>                    
                </div>
                
                <div style="float:left; width:340px;">
    	            <div id="twitter" style="width:260px; height:320px; margin:15px 0 0 70px; z-index:2; position:relative;"></div>
                </div>
                    
                                    
                
                <div style="clear:both"></div>