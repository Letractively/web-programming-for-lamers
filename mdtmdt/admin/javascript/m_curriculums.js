var src;

// ORDENAR
function OrderBy(order){
	self.location = src + "&order=" + order;
}

// FILTRAR
function Filtrar(src){
	if (src!=""){
		self.location = "curriculums.php?pais=" + src;
	} else {
		self.location = "curriculums.php";
	}
}

// ------- PAISES -------- //

// ADD 
function Add(){
	self.location = "curriculums.php?action=edit";
}
// EDIT 
function Edit(id){
	self.location = "curriculums.php?action=edit&id=" + id;
}
// DELETE 
function Del(id){
	a = confirm("Estás seguro de eliminar este registro?");
	if (a==true){
		self.location = "curriculums.php?action=delete&id=" + id;
		return true;
	} 
}
