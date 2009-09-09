<?php
if(isset($_SESSION['id_usuario'])){
	$link_a_perfil = 'profesional/' . usuario::id2alias($_SESSION['id_usuario']);
}elseif(isset($_SESSION['id_empresa'])){
	$link_a_perfil = 'empresa/' . empresa::id2aliasUsuario($_SESSION['id_empresa']);
}
?>
<p><strong><a href="<?php echo URL_BASE
								. $link_a_perfil; ?>"<strong>A MI PERFIL</strong></p>