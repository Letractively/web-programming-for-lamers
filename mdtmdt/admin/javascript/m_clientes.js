var src;

// ORDENAR
function OrderBy(order){
	self.location = src + "&order=" + order;
}

// FILTRAR
function Filtrar(src){
	if (src!=""){
		self.location = "clientes.php?pais=" + src;
	} else {
		self.location = "clientes.php";
	}
}

// ------- CLIENTES -------- //

// ADD 
function Add(){
	self.location = "clientes.php?action=edit";
}
// EDIT 
function Edit(id){
	self.location = "clientes.php?action=edit&id=" + id;
}
// DELETE 
function Del(id){
	a = confirm("Estás seguro de eliminar este registro?");
	if (a==true){
		self.location = "clientes.php?action=delete&id=" + id;
		return true;
	} 
}

// ------- ARCHIVOS -------- //

// VER 
function Archivos(id_cliente){
	self.location = "clientes.php?action=listArchivos&id_cliente=" + id_cliente;
}
// ADD 
function AddArchivo(id_cliente){
	self.location = "clientes.php?action=editArchivo&id_cliente=" + id_cliente;
}
// EDIT 
function EditArchivo(id){
	self.location = "clientes.php?action=editArchivo&id=" + id;
}
// DELETE 
function DelArchivo(id, id_cliente){
	a = confirm("Estás seguro de eliminar este registro?");
	if (a==true){
		self.location = "clientes.php?action=deleteArchivo&id=" + id + "&id_cliente=" + id_cliente;
		return true;
	} 
}
// VER LINK
function VerLink(id_cliente){
	window.open("clientes.php?action=verLink&id=" + id_cliente,"ShowLink","width=450,height=200,top=10,left=50, scrollbars=0");
}