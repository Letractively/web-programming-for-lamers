<?php
$result = $db->query("SELECT * FROM ctl_works");
 
$tags = array();

while ($row = $db->fetch($result)) {

    $tagarray = explode(",", $row->tags); 
	
    foreach($tagarray as $tag) {
		$tag = strtolower(trim($tag));
		
		if (!isset($tags[$tag])) {
			$tags[$tag] = 0;	
		}
		
		$tags[$tag]++;
	}	
	
    
}

arsort($tags);
$tags = array_slice($tags, 0, 30, true);
ksort($tags);

 

$max_qty = max(array_values($tags));
$per10 = round(($max_qty *.1));
$per20 = round(($max_qty *.2));
$per30 = round(($max_qty *.3));
$per40 = round(($max_qty *.4));
$per50 = round(($max_qty *.5));
$per60 = round(($max_qty *.6));
$per70 = round(($max_qty *.7));
$per80 = round(($max_qty *.8));
$per90 = round(($max_qty *.9));


foreach ($tags as $key => $value) {
 
    $porcentaje=0;
	$estilo=0;
 

	$porcentaje=round(($value/$max_qty)*100);
 
if ($value>=$per90 ){
       $estilo=35;
   }else if($value>=$per80 ){
       $estilo=32;
   }else if($value>=$per70 ){
       $estilo=29;
   }else if($value>=$per60 ){
       $estilo=26;
   }else if($value>=$per50 ){
       $estilo=23;
   }else if($value>=$per40 ){
       $estilo=20;
   }else if($value>=$per30 ){
       $estilo=17;
   }else if($value>=$per20 ){
       $estilo=14;
   }else if($value>=$per10 ){
       $estilo=11;
   }else{
       $estilo=8;
   }
 

  //Imprmimos el Tag
  echo '<a href="?s=results&f='.$key.'" style="font-size: '.$estilo.'px"';
  echo ' title="Found '.$value.'">'.$key.'</a> ';
  
  
}

 

?>