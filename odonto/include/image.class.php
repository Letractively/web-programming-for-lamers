<?php 
session_start();

class image {
	
		const mysql_table = 'ctl_photos';
		const session_logid = 'logid';
		const max_filesize = 4194304;
		
		
		var	$uploadfolder = "upload";	
	
		var $tmp_name;
		var $error;
		var $size;
		var $type;		
		var $width;
		var $height;
		
		var $image;
		var $name;
		
		var $valid = false;

		

				
		function __construct($files) {
			
			$this->tmp_name = $files['tmp_name'];
			$this->error = $files['error'];
			$this->size = $files['size'];			
			
			list($this->width,$this->height,$this->type)=getimagesize($this->tmp_name);
			
			
			if ($this->allCheck()) {

			
				if ($this->type==1) {
					$this->image = @imagecreatefromgif($this->tmp_name);
				} else if ($this->type==2) {
					$this->image = @imagecreatefromjpeg($this->tmp_name);
				} else if ($this->type==3) {
					$this->image = @imagecreatefrompng($this->tmp_name);
				}

				$this->valid = true;
				
				$this->generateName();
				
			} else {
				return false;
			}

		}
		
		
		function allCheck() {

			
			if ($this->type >= 1 && $this->type <= 3) {
				$typecheck = true;
			} else {
				$typecheck = false;
			}
	
			if ($typecheck && $this->error == UPLOAD_ERR_OK && $this->size <= self::max_filesize) {
				return true;
			} else {
				return false;
			}
		}
		
		function setUploadFolder($uploadfolder) {
			if ($uploadfolder) $this->uploadfolder = $uploadfolder;			
		}
		
		function generateName() {
			do {
				
				$name = "";
				for ($i=1; $i<=8; $i++) {
					if (rand(0, 1)) {
						$name .= chr(rand(48, 57));
					} else {
						$name .= chr(rand(97, 122));
					}
				}
				
			} while (file_exists($this->uploadfolder."/".$name.".jpg"));	
			
			$this->name = $name;
		}
		
		function resizeCrop($canvas_w, $canvas_h) {
			
				if (!$this->valid) {
					return false;
					exit();
				}
				
				$width = $this->width;
				$height = $this->height;
				
				$oldimage=$this->image;
				$newimage=imagecreatetruecolor($canvas_w, $canvas_h);
							
				$backround=imagecolorallocate($oldimage, 0, 0, 0);
				imagefill($newimage, 0, 0, $backround); 
				
							if ($width < $canvas_w || $height < $canvas_h) {
								$new_w = $width;
								$new_h = $height;
								$crop_w = $width;
								$crop_h = $height;
								$src_x = 0;
								$src_y = 0;
								$dst_x = ($canvas_w/2) - ($width / 2);
								$dst_y = ($canvas_h/2) - ($height / 2);					
							} else {
								$new_w = $canvas_w;
								$new_h = $canvas_h;
								$dst_x = 0;
								$dst_y = 0;
								if ($width > $height) {
									$crop_h = $height;				
									$crop_w = $height;
									$src_x = ($width/2) - ($crop_w/2);
									$src_y = 0;
								} else if ($width < $height) {
									$crop_h = $width;				
									$crop_w = $width;
									$src_y = ($height/2) - ($crop_h/2);
									$src_x = 0;
								} else if ($width == $height) {
									$crop_h = $height;				
									$crop_w = $width;
									$src_x = 0;
									$src_y = 0;	
								}
							}
							
									
				imagecopyresampled($newimage, $oldimage, $dst_x, $dst_y, $src_x, $src_y, $new_w, $new_h, $crop_w, $crop_h);
							
				return $newimage;			
		}
		
		function resizeMax($canvas_w, $canvas_h, $bgcolor) {
			
				if (!$this->valid) {
					return false;
					exit();
				}
				
				$width = $this->width;
				$height = $this->height;
				
				$oldimage=$this->image;
				
				if (($height > $canvas_h) || ($width > $canvas_w)) {
					
								$newimage=imagecreatetruecolor($canvas_w, $canvas_h);
								
								$backround=imagecolorallocate($oldimage, $bgcolor[0], $bgcolor[1], $bgcolor[2]);
								
								imagefill($newimage, 0, 0, $backround); 
								
								if (($width > $height) || ($width == $height && $canvas_h >= $canvas_w)) {
									$newwidth  = $canvas_w;
									$newheight = $height * ($newwidth/$width);
									$dst_x=0;				
									$dst_y=($canvas_h - $newheight)/2;					
								} else if (($width < $height) || ($width == $height && $canvas_h < $canvas_w))  {
									$newheight = $canvas_h;
									$newwidth = $width * ($newheight/$height);
									$dst_x=($canvas_w - $newwidth)/2;			
									$dst_y=0;					
								}
								
								imagecopyresampled($newimage, $oldimage, $dst_x, $dst_y, 0, 0, $newwidth, $newheight, $width, $height); 

								return $newimage;							
								
				} else {
					
								return $oldimage;
				}
				
		}
		
		
		function upload($image, $addname) {
			
			if (!$this->valid) {
				return false;
				exit();
			}
				
			$uploadfolder = $this->uploadfolder;
				
			$uploaded = imagejpeg($image, $uploadfolder."/".$this->name.$addname.".jpg", 100);
			
			
			
			if ($uploaded) {
				return $this->name;
			} else {
				return false;	
			}
		}		
		
	
}
?>