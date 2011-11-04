<?php

			$urlstring = "?s=results";
			
			if ($_GET['f']) {
				$farray = explode(" ", $_GET['f']);
				
				$where = "AND ((";
				$relevance = ", (";
			
				
				foreach($farray as $f) {
						$relevance = $relevance." (CASE WHEN ctl_users.firstname LIKE '%".$f."%' THEN 1 ELSE 0 END) +  
													(CASE WHEN ctl_works.tags LIKE '%".$f."%' THEN 1 ELSE 0 END) +";
													
						$where = $where." CONCAT(ctl_users.firstname, ctl_works.tags, 
												 ctl_works.title, ctl_works.area, ctl_works.location, 
												 ctl_works.duration, ctl_works.age, ctl_works.description) LIKE '%".$f."%' and";
				}
				
				foreach($farray as $f) {
						$relevance = $relevance." (CASE WHEN CONCAT(ctl_works.title, ctl_works.area, ctl_works.location, ctl_works.duration, ctl_works.age) 
																		LIKE '%".$f."%' THEN 1 ELSE 0 END) +";
				}

				foreach($farray as $f) {
						$relevance = $relevance." (CASE WHEN ctl_works.description LIKE '%".$f."%' THEN 1 ELSE 0 END) +";
				}					

				$where = substr($where, 0, -3).")) ";
				$relevance = substr($relevance, 0, -2).") AS relevance";
				$relorder = "relevance DESC,";



				$urlstring .= "&f=".$_GET['f'];
							
			}
			
			
				if ($_GET['ngo']) {
					$where = $where."AND (ctl_users.firstname LIKE '%".$_GET['ngo']."%') ";
					$urlstring .= "&ngo=".$_GET['ngo'];
				}
				if ($_GET['age']) {
					$where = $where."AND (ctl_works.age LIKE '%".$_GET['age']."%') ";
					$urlstring .= "&age=".$_GET['age'];					
				}
				if ($_GET['area']) {
					$where = $where."AND (ctl_works.area LIKE '%".$_GET['area']."%') ";
					$urlstring .= "&area=".$_GET['area'];						
				}
				if ($_GET['country']) {
					$where = $where."AND (ctl_works.location LIKE '%".$_GET['country']."%') ";
					$urlstring .= "&country=".$_GET['country'];					
				}
				if ($_GET['province']) {
					$where = $where."AND (ctl_works.location LIKE '%".$_GET['province']."%') ";
					$urlstring .= "&province=".$_GET['province'];					
				}
				if ($_GET['city']) {
					$where = $where."AND (ctl_works.location LIKE '%".$_GET['city']."%') ";
					$urlstring .= "&city=".$_GET['city'];					
				}
				if ($_GET['duration']) {
					$where = $where."AND (ctl_works.duration LIKE '%".$_GET['duration']."%') ";
					$urlstring .= "&duration=".$_GET['duration'];					
				}			
			

			$limit = 6;
			
			$searchquery = "SELECT * ".$relevance." FROM ctl_users, ctl_works
						WHERE (ctl_users.id=ctl_works.ngo AND ctl_users.type=2) ".$where."
						ORDER BY ".$relorder." ctl_works.date DESC";
						
			$searchlimit = " LIMIT ".($p*$limit)." , ".$limit;						
						

			$result = $db->query($searchquery.$searchlimit);
			$numrows = $db->numRows($result);
			
			$totalresult = $db->query($searchquery);
			$total = $db->numRows($totalresult);
			
			$pageheight = 350;
			if ($numrows>1) {
				$pageheight = $pageheight + ($numrows-1) * 215;
			}
			
			/*echo($searchquery.$searchlimit."<br />");*/
			
			
			$page = new page($urlstring, $_GET['p'], $total, 6);
			
?>                                     


             
				<div style="position:absolute; z-index:1">
                    <div style="float:left; width:550px; position:absolute;">
                   
                        <?php $whitebox->open('', 583, $pageheight, 'margin:4px 0 20px 0;'); ?>
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
    	            <div style="width:550px; height:<?=$pageheight?>px; padding:5px 0 0 23px; z-index:2; position:relative;">
   
                        <div>
                            <p style="float:left;"><b>Activism Search</b></p>
                            <p style="float:right;"><?php if($numrows) $page->writeHTML(); ?></p>
                        </div>
                
                
                <div style="clear:both;"></div>
                
					<?php 
                        if($numrows) {
                            echo("Showing ".$numrows." of ".$total." results");
                        } else {
							echo("No results for this search");
						}
                    ?>
    
                    <?php 
						while($row = $db->fetch($result)) { 
						
						$ngoquery = $db->query("SELECT firstname FROM ctl_users WHERE id=".$row->ngo);
						$ngorow = $db->fetch($ngoquery);
					?>
                    	
                        <div style="background:url(img/topborder.jpg) repeat-x; width:530px; height:200px; margin:15px 0 0 0;">
                        
                        	<div style="float:left; margin:10px 0 0 0;"><h4><?=$row->title;?></h4></div>
                            <div style="float:right; margin:10px 0 0 0;"><small>Posted on: <?=date("m/d/Y",$row->date);?></small></div>
                            
                            <div style="clear:both; height:6px;"></div>
                            
                            <div style="width:130px; float:left;"><small style="color:#000;"><b>Entity: </b><?=$ngorow->firstname;?></small></div>
                            <div style="width:130px; float:left;"><small style="color:#000;"><b>Area: </b><?=$row->area;?></small></div>
                            <div style="width:220px; float:left;"><small style="color:#000;"><b>Location: </b><?=$row->location;?></small></div>                            
                            
                            <div style="clear:both; height:6px;"></div>
                            
                            <div style="height:74px; overflow:hidden;">
								<?php 	
                                        if (strlen($row->description) > 280) {
                                            echo(substr(nl2br($row->description), 0, 280)."...");
                                        } else{
                                            echo(nl2br($row->description));
                                        }
                                ?>
                            </div>
							<br />
							<a href="?s=work&id=<?=$row->id;?>" style="color:#000; font-size:12px;"><u> See Details </u></a>
                        
                        </div>
                            
                    <?php } ?>
                
                
                		<p style="float:right;"><?php if($numrows) $page->writeHTML(); ?></p>


	                </div>       
                </div>
                                
                <div style="float:left; width:340px;">
    	            <div style="width:260px; height:320px; margin:15px 0 0 70px; z-index:2; position:relative;">
                    	<?php include('tagcloud.php'); ?>
                    </div>
                </div>                
                    
                                    
                
                <div style="clear:both"></div>