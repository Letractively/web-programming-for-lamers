<?php
include("../CONFIG.php");
$title = "Admin Panel";
include("header.php");
?>

				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:293px; margin:40px auto 0 auto;">
                   
                        <?php
							$whitebox->setBaseSrc("../img/box/");
							$whitebox->open('', 293, 362, 'margin:4px auto 20px auto;');			
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; position:relative;  z-index:3;">
    	            <div style="width:293px; height:362px; padding:70px 0 0 0px; margin:0 auto 0 auto; text-align:center;">
                    	<b><u>Administration Panel:</u></b>
                        <br /><br />
                        <p style="line-height:25px; font-weight:bold;">
                            <a href="newngo.php">Create a new NGO</a><br />
                            <br />
                            <a href="ngolist.php">View NGO List</a><br />
                            <a href="userlist.php">View User List</a>
                        </p>
                    </div>
                </div>


<?php
include("footer.php");
?> 