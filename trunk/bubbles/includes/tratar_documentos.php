<?php
################################################################################################## 
# BEGIN subirDocumento
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
# 
# EJEMPLO: 
# imgResample2('img1'); // copia la imagen del campo img1 al directorio actual
function subirDocumento ($campo, $dir="", $nombre = ''){ 

    if($_FILES[$campo]['name']!=''){ 
    //Si el campo está lleno, es decir, si se subió una foto... 

        //crea los directorios necesarios 
        if($dir!=""){ 
            if(!file_exists($dir)) mkdir($dir); 
        } 
        //asigna las variables         
        $name=$nombre . '.pdf';
        $type=$_FILES[$campo]['type']; 
        $doc_name = $name; 
         
        //Imagen original en el servidor 
        $temp=$_FILES[$campo]['tmp_name'];  

        //Objeto con el que trabajará el programa
		$doc = '';
		if($type=="application/pdf"){
            $doc = $temp or die("No se encuentra la imagen $doc_name<br>\n");  
        } 
        if($_FILES[$campo]['type']=="application/msword"){ 
            $doc = $temp or die("No se encuentra la imagen $doc_name<br>\n"); 
            $doc_name = str_replace(".pdf", ".doc", $doc_name);
        } 
        if($_FILES[$campo]['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){ 
            $doc = $temp or die("No se encuentra la imagen $doc_name<br>\n"); 
            $doc_name = str_replace(".pdf", ".docx", $doc_name);
        }
		if($doc == '')
			die("El documento $doc_name es de un formato NO soportado: " . $_FILES[$campo]['type'] . "<br>\n" );
		
        //    imagejpeg($image,"$dir$image_name", $c1);//mueve la imagen al server (el segundo parámetro es la calidad) 
        //    imagedestroy($image); //destruye image 
        //    imagedestroy($img); //destruye la imagen "origen" 
        //TERMINA DOCUMENTO
    }
    $unique = time(); 
    
	copy($temp, $dir . $doc_name);
	
    $resampled[0] = $dir.$doc_name; 
    //$resampled[1] = $dir.$thumb_name;  
    //$resampled[2] = "<img src=\"$dir$image_name?i=$unique\">"; 
    //$resampled[3] = "<img src=\"$dir$thumb_name?i=$unique\">"; 
     
    //return $resampled; 
     
} 
# END subirDocumento
##################################################################################################
?>