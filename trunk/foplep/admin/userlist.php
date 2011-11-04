<?php
include("../CONFIG.php");
$title = "Admin Panel";
include("header.php");
?>



<?php

			if ($_GET['o']) {
				$orderby = $_GET['o'];
			} else {
				$orderby = "date";
			}
			
			if ($_GET['f']) {
				$farray = explode(" ", $_GET['f']);
				
				$where = "AND ((";
				$relevance = ", (";
			
				
				foreach($farray as $f) {
						$relevance = $relevance." (CASE WHEN firstname LIKE '%".$f."%' THEN 1 ELSE 0 END) +  
													(CASE WHEN email LIKE '%".$f."%' THEN 1 ELSE 0 END) +";
						$where = $where." firstname LIKE '%".$f."%' or  email LIKE '%".$f."%' or ";
				}
										

				$where = substr($where, 0, -3).")) ";
				$relevance = substr($relevance, 0, -2).") AS relevance";
				$relorder = "relevance DESC,";							
							
			}
			

			$limit = 14;
			
			$searchquery = "SELECT * ".$relevance." FROM ctl_users
						WHERE (type=1 OR type=11) ".$where."
						ORDER BY ".$relorder." ".$orderby." ASC";
						
			$searchlimit = " LIMIT ".($p*$limit)." , ".$limit;						
						

			$result = $db->query($searchquery.$searchlimit);
			$numrows = $db->numRows($result);
			
			$totalresult = $db->query($searchquery);
			$total = $db->numRows($totalresult);
			
			$pageheight = 350;
			if ($numrows>1) {
				$pageheight = $pageheight + ($numrows-1) * 215;
			}
			
			$page = new page("?f=".$_GET['f']."&o=".$_GET['o'], $_GET['p'], $total, 14);
			
?> 



				<div style="position:absolute; z-index:1; width:900px;">
                    <div style="width:293px;">
                   
                        <?php
							$whitebox->setBaseSrc("../img/box/");
							$whitebox->open('', 900, 500, 'margin:4px auto 20px auto;');			
                            $whitebox->close();
                        ?>
                    </div>
                </div>
                
                
                <div style="width:900px; position:relative;  z-index:3;">
    	            <div style="width:900px; height:500px; padding:20px 0 0 20px;">

                            <div style="float:left; width:460px;">
                                <b style="font-size:18px;">NGO list:</b>
                            </div>
                            
                            <div style="float:left; width:440px;">
                                <form method="get" action="" id="quicksearch">                             
                                <b style="font-size:16px;">Search:</b>

                                    <input type="text" name="f" value="<?=$_GET['f'];?>"  style="border:1px solid #61ba07; height:14px; width:200px; font-size:12px;"/>
                                </form>
                            </div>
                            
                            <div style="clear:both; height:30px"></div>
                            
                            <div class="userlist" style="font-size:12px; font-weight:bold;">
                                <div style="width:180px; float:left;" popup="Order by username"><a href="?f=<?=$_GET['f']?>&o=username"> Username </a></div>
                                <div style="width:180px; float:left;" popup="Order by email addres"><a href="?f=<?=$_GET['f']?>&o=email"> Email </a></div>
                                <div style="width:100px; float:left;" popup="Order by creation date"><a href="?f=<?=$_GET['f']?>&o=date"> Date created </a></div>
                                <div style="width:100px; float:left;" popup="Order by last logged in date"><a href="?f=<?=$_GET['f']?>&o=lastdate"> Last logged in </a></div>

                            </div>
                            
                            <div style="font-size:12px; clear:both;">

                                <?php 
                                    while($row = $db->fetch($result)) { 
                                ?> 
                                   
                                    <div style="border-top:1px solid #d3eebd; height:22px; width:850px;">
                                        <div style="width:180px; float:left;"><a href="../?s=profile&id=<?=$row->id?>">
											<?=$row->username?></a>
                                        </div>
                                        <div style="width:180px; float:left;"><?=$row->email?> </div>
                                        <div style="width:100px; float:left;"><?php if ($row->date) echo(date("d/m/Y", $row->date)); ?> </div>
                                        <div style="width:100px; float:left;"><?php if ($row->lastdate) echo(date("d/m/Y", $row->lastdate)); ?> </div>
                                        <div style="width:150px; float:right;" class="userlist">
											<?php if($row->type==11) { ?> 
                                            	<a href="action/user.php?a=block&f=<?=$_GET['f']?>&o=<?=$_GET['o']?>&id=<?=$row->id?>">
                                                	<img src="../img/icon/unblock.jpg" border="0" /> <b>Unblock</b> 
                                                </a>
                                            <?php } else { ?>
                                            	<a href="action/user.php?a=block&f=<?=$_GET['f']?>&o=<?=$_GET['o']?>&id=<?=$row->id?>"> 
                                                	<img src="../img/icon/block.jpg" border="0" /> <b>Block</b> 
                                                </a>
                                            <?php } ?>
                                            
                                            <a class="delete_button" href="action/user.php?a=delete&f=<?=$_GET['f']?>&o=<?=$_GET['o']?>&id=<?=$row->id?>"> 
                                            	<img src="../img/icon/delete.jpg" style="margin:0 0 0 15px;" border="0" /> <b>Delete</b>  
                                            </a>
                                        </div>
                                    </div>
                                
								<?php } ?>
                            
                            	<br />
                                <div style="float:right; margin:0 40px 0 0;"><?php if($numrows) $page->writeHTML(); ?></div>
                            
								<?php 
                                    if($numrows) {
                                        echo("Showing ".$numrows." of ".$total." results");
                                    } else {
                                        echo("No results for this search");
                                    }
                                ?>                            
                            
                            
                            </div>
                            
                    </div>
                </div>
                
                <div style="float:left; height:10px; clear:both;"></div>



<?php
include("footer.php");
?> 


<script type="text/javascript">

	$(".delete_button").click( function(e) {
		e.preventDefault();
		
		if (confirm("Are you really sure you want to delete this user? (there's no way to recover it)")) {
			window.location = ($(this).attr('href'));
		}
	});

</script>