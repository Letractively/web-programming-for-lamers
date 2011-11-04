<?php 
$error = $_SESSION['contact']['error'];

$fullname = $_SESSION['contact']['fullname'];
$email = $_SESSION['contact']['email'];
$message = $_SESSION['contact']['message'];
$country = $_SESSION['contact']['country'];
$age = $_SESSION['contact']['age'];
$how = $_SESSION['contact']['how'];
$done = $_SESSION['contact']['done'];

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
                            <p><b>Done!</b><br /><br /> Your email has been sent, thanks for writting us. </p>


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
                        example@example.com<br />
                    </p>
                    
                    <p>
                        <b>Fiorella Belli</b><br />
                        CTL Volunteer Coordinator<br />
                        example@example.com<br />
                    </p>
                    
                    <p>                    
                        <b>Andy Chester</b><br />
                        Logistics<br />
                        example@example.com<br />
                    </p>
                    
                    <p>                    
                        <b>Name Lastname</b><br />
                        Some Field<br />
                        example@example.com<br />
                    </p>
                                        
                    </div>
                </div>
                    
                                    
                
                <div style="clear:both"></div>