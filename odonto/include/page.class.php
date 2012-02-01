<?php 
	class page {
		

		var $backcolor = '#8db34c';

		var $pagelink;
		var $p;
		var $numberofpages;

		
		
		
		function __construct($pagelink, $p, $total, $limit) {
						
			if (($total/$limit) - intval($total/$limit)) $rest=1; 
			$this->numberofpages = intval($total/$limit) + $rest; 
			$this->pagelink = $pagelink;						  
			

			if ($p > $this->numberofpages-1) {
				$p = $this->numberofpages-1;	
			} else if ($p < 0) {
				$p = 0;
			}
			
			$this->p = $p;
			
		}
		
		function writeHTML() {
			$p = $this->p;
			$pagelink = $this->pagelink;
			$numberofpages = $this->numberofpages;			
			
				if ($p-1 >= 0) { 
					echo('<a class="pagelink" page="'.($p-1).'"  href="'.$pagelink.'&p='.($p-1).'#topcontent">
						  <img src="img/button/back.gif" border="0" />&nbsp;&nbsp;</a>');
            	} else {
					echo('<img src="img/button/noback.gif" border="0" />&nbsp;&nbsp;');					
				}
						
            	for ($i=1; $i<=$numberofpages; $i++) {
					
					if ($numberofpages>10) {
						if($i==2 & (($p-3) > 1) ) {
							echo(' ... ');
							$i = ($p-2);
						}
						if($i==($p+5) & (($p+5) < $numberofpages)) {
							echo(' ... ');
							$i = $numberofpages;
						}						
					}
				
					if (($p+1)==$i) {
						echo ('<a class="pagelink" page="'.($i-1).'" href="'.$pagelink.'&p='.($i-1).'" 
							  	style="border:1px solid #bcd3bc; font-size:11px; background-color:#95e170; font-weight:bold; color:#fff;">&nbsp;'.$i.'&nbsp;</a> ');
					} else {
						echo ('<a class="pagelink" page="'.($i-1).'" href="'.$pagelink.'&p='.($i-1).'" 
							  	style="border:1px solid #bcd3bc; font-size:11px; background-color:#dbe8d7; font-weight:bold;">&nbsp;'.$i.'&nbsp;</a> ');
					}
				}
				
				if ($p+1 < $numberofpages) {
					echo('<a class="pagelink" page="'.($p+1).'" href="'.$pagelink.'&p='.($p+1).'#topcontent">
						  &nbsp;&nbsp;<img src="img/button/next.gif" border="0" /></a>');
				} else {
					echo('&nbsp;&nbsp;<img src="img/button/nonext.gif" border="0" />');
				}	
	
		}
		
		
		
		

	}
?>