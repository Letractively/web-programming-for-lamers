<?php 
	
	class contentBox {
		var $id;
		var $width;
		var $height;
		
		var $basesrc;
		var $background;		
		
		var $corner = array();
		var $side = array();
		var $bheight = array();	
		var $bwidth = array();
		
		var $css;
		
		function setId($id) {
			$this->id = $id;
		}
		
		function setBackground($value) {
			$this->background = $value;
		}
		
		function setBaseSrc($value) {
			$this->basesrc = $value;
		}		

		function setBorderSize($size1, $size2, $size3, $size4) {
			$this->bheight[1] = $size1;
			$this->bwidth[1] = $size2;			
			$this->bheight[2] = $size3;
			$this->bwidth[2] = $size4;			
		}
		
		function setCornerSrc($src1, $src2, $src3, $src4) {
			$this->corner[1] = $src1;
			$this->corner[2] = $src2;
			$this->corner[3] = $src3;
			$this->corner[4] = $src4;			
		}
		
		function setSideSrc($src1, $src2, $src3, $src4) {
			$this->side[1] = $src1;
			$this->side[2] = $src2;
			$this->side[3] = $src3;
			$this->side[4] = $src4;			
		}
		
		function setCss($css) {
			$this->css = $css;
		}	
		
		function open($id, $w, $h, $addcss) {
			
			$this->id;
			$this->width = $w;
			$this->height = $h;
			
			$id = $this->id;
			$width = $this->width;
			$height = $this->height;
			
			$corner = $this->corner;
			$side = $this->side;
			$bheight = $this->bheight;
			$bwidth = $this->bwidth;			
			
			$basesrc = $this->basesrc;
			$background = $this->background;
			
			$css = $this->css." ".$addcss;
			
			
	?>

            
            <div <?php echo($id) ? 'id="'.$id.'" ' : '';?> style="width:<?=$width?>px; height:<?=$height?>px; <?=$css;?>">
            
                    <div style="filter:0; background-image:url(<?=$basesrc.$corner[1];?>); height:<?=$bheight[1]?>px; width:<?=$bwidth[2]?>px; float:left;"></div>
                    
                    <div style="background-image:url(<?=$basesrc.$side[1];?>); height:<?=$bheight[1]?>px; width:<?=$width - ($bwidth[1] + $bwidth[2]);?>px; float:left;"></div>
                    
                    <div style="filter:0; background-image:url(<?=$basesrc.$corner[2];?>); height:<?=$bheight[1]?>px; width:<?=$bwidth[1]?>px; float:left;"></div>
                    
                    
                    
                    <div style="clear:both;"></div>
                    
                    
                    
                    <div style="background-image:url(<?=$basesrc.$side[4];?>); height:<?=$height - ($bheight[1] + $bheight[2]);?>px; width:<?=$bwidth[2]?>px; float:left;"></div>
                    
                    <div style="background-color:<?=$background;?>; 
                    	height:<?=$height - ($bheight[1] + $bheight[2]);?>px; width:<?=$width - ($bwidth[1] + $bwidth[2]);?>px; float:left;">
                    
	<?php 
		}
		
		
		
		function close() {
			
			$width = $this->width;
			$height = $this->height;
			
			$corner = $this->corner;
			$side = $this->side;
			$bheight = $this->bheight;
			$bwidth = $this->bwidth;			
			
			$basesrc = $this->basesrc;
			$background = $this->background;			
	?>
                    
                    </div>
                    
                    <div style="background-image:url(<?=$basesrc.$side[2];?>); height:<?=$height - ($bheight[1] + $bheight[2]);?>px; width:<?=$bwidth[1]?>px; float:left; "></div>
                    
                    
                    
                    <div style="clear:both;"></div>
                    
                    
                    
                    <div style="filter:0; background-image:url(<?=$basesrc.$corner[4];?>); height:<?=$bheight[2]?>px; width:<?=$bwidth[2]?>px; float:left;"></div>
                    
                    <div style="background-image:url(<?=$basesrc.$side[3];?>); height:<?=$bheight[2]?>px; width:<?=$width - ($bwidth[1] + $bwidth[2]);?>px; float:left;"></div>
                    
                    <div style="filter:0; background-image:url(<?=$basesrc.$corner[3];?>); height:<?=$bheight[2]?>px; width:<?=$bwidth[1]?>px; float:left;"></div>  
                                      
            </div>
    
    <?php
		}
		
		}
	?>