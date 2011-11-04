<?php
include("../CONFIG.php");
$title = "Admin Panel";
include("header.php");
?>

             

             
				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:580px; margin:40px auto 0 auto;">
                   
                        <?php
							$whitebox->setBaseSrc("../img/box/");						
							$whitebox->open('', 583, 100, 'margin:4px 0 20px 0;');			
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; position:relative;  z-index:3;">
    	            <div style="width:540px; height:100px; padding:40px 0 0 0; margin:0 auto 0 auto; ">
                            <p>
                            	<b>Sucess.</b><br /><br />
								New NGO Created.
                            </p>
	                </div> 
                                                       
                </div>          
                    
                            
             	<div style="height:280px; float:left;">
                </div> 
                                
                <div style="clear:both;"></div>
                
                <?php unset($_SESSION['registration']); ?>
				
               
                
<?php
include("footer.php");
?>                 