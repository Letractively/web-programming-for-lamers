<?php 
session_start();

class user extends dbelement {

		var $mysql_table = 'ctl_users';	
				
		
		function isAdmin() {
			if ($this->obj->admin) {
				return true;
			} else {
				return false;	
			}
		}
		

}
?>