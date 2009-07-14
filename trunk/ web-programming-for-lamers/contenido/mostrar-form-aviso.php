<form action="<?php echo $_SERVER['PHP_SELF'] . '?entidad_visitada=' . $_GET['entidad_visitada']; ?>" method="post" class="cmxform" id="registrarForm">
Titulo: <input type="text" name="fTitulo" id="fTitulo"></input>
Horarios: <input type="text" name="fHorarios" id="fHorarios"></input>
Pago: <input type="text" name="fPago" id="fPago"></input>
Detalle de la Oferta: <textarea rows="5" cols="50" name="fDetalle" id="fDetalle"></textarea>
Puesto a cubrir: <input type="text" name="fPuesto" id="fPuesto"></input>
<input type="hidden" value="1" name="fAvisoEnviado"></input>
<input type="submit" value="Agregar aviso" name="fAgregarAviso"></input>