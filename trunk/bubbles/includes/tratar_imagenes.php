<?php
################################################################################################## 
# BEGIN imgResample2 
# ------------------------------------------------------------------------------------------------ 
# DESCRIPCIÓN: 
# Altera el tamaño de una imagen al subirse desde una forma ajustándola a una altura o anchura máxima, 
# preservando las proporciones. Opcionalmnete puede señalarse una imagen PNG para que sirva com marca de agua 
# Genera una imagen Thumbnail también. 
# Acepta imágenes JPG, GIF o PNG y el resultado del proceso se copia al directorio actual como una imagen 
# DEVUELVE:  
# Nada 
# PARÁMETROS: 
# $campo    ->    string, obligatorio; nombre del campo de tipo File del que tomará los valores de la imagen a procesar 
# $dir        ->    string, opcional; ruta donde se subirá el archivo. Si se deja vacío lo sube al directorio actual 
# $anchura    ->    número, opcional; anchura máxima permitida para las imágenes a fullsize. Valor predeterminado es 250 px
# $hmax		->	Altura "Maxima" que puede tener una imagen fullsize, predeterminada a 250 px,
# $anchura_thumb -> número, opcional; anchura máxima permitida para las imágenes thumbnail. Valor predeterminado es 100 px
# $hmax_thumb	->	Altura Máxima que puede tener una imagen chica, predeterminada a 100 px
# $watermark->    string URL a un archivo PNG, opcional; si existe, incrusta una marca de agua en el fullsize 
# $watermark_thumb-> string URL a un archivo PNG, opcional; si existe, incrusta una marca de agua en el thumbnail 
# $pos        ->    string, opcional, predeterminado = "L-T"; posición horizontal de la marca de agua. Valores permitidos: "L" para izquierda o "R" para derecha, "T" para arriba o "B" para abajo. Separar con un - los valores horizontales y verticales 
# $wmdist    ->    número, opcional, predeterminado = 0; padding en pixeles para el Watermark 
# $c1        ->    número, opcional, predeterminado = 85; calidad del jpg de la imagen grande 
# $c2        ->    número, opcional, predeterminado = 90; calidad del jpg de la imagen thumbnail 
# 
# EJEMPLO: 
# imgResample2('img1'); // copia la imagen del campo img1 al directorio actual
function imgResample2 ($campo, $dir="", $nombre = '', $anchura=250, $hmax=250, $anchura_thumb=100, $hmax_thumb=100, $watermark="", $watermark_thumb="", $pos="L-T", $wmdist=0, $c1=95, $c2=97){ 

    if($_FILES[$campo]['name']!=''){ 
    //Si el campo está lleno, es decir, si se subió una foto... 

        //crea los directorios necesarios 
        if($dir!=""){ 
            if(!file_exists($dir)) mkdir($dir); 
        } 
        //asigna las variables         
        $name=$nombre . '.jpg';
        $type=$_FILES[$campo]['type']; 
        $image_name = $name; 
         
        //Imagen original en el servidor 
        $temp=$_FILES[$campo]['tmp_name'];  

        //Objeto con el que trabajará el programa
		$img = '';
        if($type=="image/jpeg" || $type=="image/pjpeg"){ 
            $img = imagecreatefromjpeg($temp) or die("No se encuentra la imagen $image_name<br>\n");  
        } 
        if($_FILES[$campo]['type']=="image/gif"){ 
            $img = imagecreatefromgif($temp) or die("No se encuentra la imagen $image_name<br>\n"); 
            $image_name = str_replace(".gif", ".jpg", $image_name); 
        } 
        if($_FILES[$campo]['type']=="image/png"){ 
            $img = imagecreatefrompng($temp) or die("No se encuentra la imagen $image_name<br>\n"); 
            $image_name = str_replace(".png", ".jpg", $image_name); 
        }
		if($img == '')
			die("La imagen $image_name es de un formato NO soportado: " . $_FILES[$campo]['type'] . "<br>\n" ); 
			
        //Para que acepte la transparencia del PNG 
        imagealphablending($img, true); 
        //INICIA PROCESO 
            $dimensiones = getimagesize($temp); //Dimensiones originales de la imagen 
            $ratio = ($dimensiones[0] / $anchura); //Mantiene las dimensiones de la imagen dentro del "maximo" determinado...
            $altura = round($dimensiones[1] / $ratio);
			if($altura>$hmax){
				$anchura2=$hmax*$anchura/$altura;
				$altura=$hmax;
				$anchura=$anchura2;
			}
            $image = imagecreatetruecolor($anchura,$altura); //crea la nueva imagen 
            $FFF = imagecolorallocate($img, 255,255,255); 
            imagefill($image, 0, 0, $FFF); 
            imagecopyresampled ($image, $img, 0, 0, 0, 0, $anchura, $altura, $dimensiones[0], $dimensiones[1]);//reescala 
             
            //INICIA WATERMARK 
            //posición horizontal y vertical del watermark: 
            $pos = explode("-",$pos); 
            $wmhorz=$pos[0]; 
            $wmvert=$pos[1]; 
         
            if($watermark != ''){ 
                $logo = imagecreatefrompng($watermark); 
                $margen = $wmdist; //distancia entre el watermark y la orilla 
                $logoW =imagesx($logo); //Anchura del logo 
                $logoH =imagesy($logo); //Altura del logo 
                switch ($wmhorz){ 
                    case "L": 
                        $xpos=$margen; 
                        break; //end L 
                    case "R": 
                        $xpos=$anchura-$logoW-$margen; //posición en x del wm 
                        break; //end R 
                } //end switch hotz 
                switch ($wmvert){ 
                    case "T": 
                        $ypos=$margen;  
                        break; //end T 
                    case "B": 
                        $ypos=$altura-$logoH-$margen; //posición en y del wm 
                        break; //end B 
                } //end switch vert 
                imagecopy($image, $logo, $xpos, $ypos, 0, 0, $logoW, $logoH); //Pone el logo 
                imagedestroy($logo); //destruye el logo después de usarlo 
            } 
            //TERMINA WATERMARK 
            imagejpeg($image,"$dir$image_name", $c1);//mueve la imagen al server (el segundo parámetro es la calidad) 
            imagedestroy($image); //destruye image 
            imagedestroy($img); //destruye la imagen "origen" 
        //TERMINA IMAGEN 
         
        //INICIA THUMBNAIL 
        if($anchura_thumb != 0 || $anchura_thumb == $anchura || $anchura_thumb == "" || $anchura_thumb == NULL) { 
            //crea los directorios necesarios 
            $subdir = "small"; 
            if($dir!=""){ 
                if(!file_exists($dir.$subdir)) mkdir($dir.$subdir); 
            } else { 
                if(!file_exists($subdir)) mkdir($subdir); 
            } 
            //asigna las variables         
            $name=$name=$nombre . '.jpg'; 
            $type=$_FILES[$campo]['type']; 
            $thumb_name = $subdir."/".$name; 
             
            //Imagen original en el servidor 
            $temp=$_FILES[$campo]['tmp_name'];  
             
            //Objeto con el que trabajará el programa 
            if($type=="image/jpeg" || $type=="image/pjpeg"){ 
                $img = @imagecreatefromjpeg($temp) or die("No se encuentra la imagen $image_name<br>\n");  
            } 
            if($_FILES[$campo]['type']=="image/gif"){ 
                $img = @imagecreatefromgif($temp) or die("No se encuentra la imagen $image_name<br>\n"); 
                $thumb_name = str_replace(".gif", ".jpg", $thumb_name); 
            } 
            if($_FILES[$campo]['type']=="image/png"){ 
                $img = @imagecreatefrompng($temp) or die("No se encuentra la imagen $image_name<br>\n"); 
                $thumb_name = str_replace(".png", ".jpg", $thumb_name); 
            } 
            //Para que acepte la transparencia del PNG 
            imagealphablending($img, true); 
            //INICIA PROCESO 
                $dimensiones = getimagesize($temp); //Dimensiones originales de la imagen 
                $ratio_thumb = ($dimensiones[0] / $anchura_thumb); 
                $altura_thumb = round($dimensiones[1] / $ratio_thumb);
				if($altura_thumb>$hmax_thumb){
					$anchura2=$hmax_thumb*$anchura_thumb/$altura_thumb;
					$altura_thumb=$hmax_thumb;
					$anchura_thumb=$anchura2;
				}
                $thumb = imagecreatetruecolor($anchura_thumb,$altura_thumb); //crea la nueva imagen 
                $FFF = imagecolorallocate($img, 255,255,255); 
                imagefill($thumb, 0, 0, $FFF); 
                imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $anchura_thumb, $altura_thumb, $dimensiones[0], $dimensiones[1]);//reescala el thumbnail 
                //INICIA WATERMARK THUMB 
                if($watermark_thumb != ''){ 
                    $logo_thumb = imagecreatefrompng($watermark_thumb); 
                    $margen = $wmdist; //distancia entre el watermark y la orilla 
                    $logoW_thumb =imagesx($logo_thumb); //Anchura del logo 
                    $logoH_thumb =imagesy($logo_thumb); //Altura del logo 
                    switch ($wmhorz){ 
                        case "L": 
                            $xposThumb=$margen/2; 
                            break; //end L 
                        case "R": 
                            $xposThumb=$anchura_thumb-$logoW_thumb-($margen/2); //posición en x del wm 
                            break; //end R 
                    } //end switch hotz 
                    switch ($wmvert){ 
                        case "T": 
                            $yposThumb=$margen/2; 
                            break; //end T 
                        case "B": 
                            $yposThumb=$altura_thumb-$logoH_thumb-($margen/2); //posición en y del wm 
                            break; //end B 
                    } //end switch vert 
                    imagecopy($thumb, $logo_thumb, $xposThumb, $yposThumb, 0, 0, $logoW_thumb, $logoH_thumb); //Pone el logo 
                    imagedestroy($logo_thumb); //destruye el logo después de usarlo 
                } 
                //TERMINA WATERMARK THUMB 
                imagejpeg($thumb,"$dir$thumb_name", $c2);//mueve la imagen al server (el segundo parámetro es la calidad) 
                imagedestroy($thumb); //destruye thumb 
                imagedestroy($img); //destruye la imagen "origen" 
                 
            } else { 
             
                $thumb_name = $image_name; 
             
            } // end if != 0 
             
        //TERMINA THUMBNAIL 
    } 
    $unique = time(); 
     
    $resampled[0] = $dir.$image_name; 
    $resampled[1] = $dir.$thumb_name;  
    $resampled[2] = "<img src=\"$dir$image_name?i=$unique\">"; 
    $resampled[3] = "<img src=\"$dir$thumb_name?i=$unique\">"; 
     
    return $resampled; 
     
} 
# END imgResample2 
##################################################################################################
?>