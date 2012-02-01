<?php 
session_start();

class dbelement {
			
		var $mysql_table = '';
		
		var $id;
		public $obj;
		
				
		function __construct($id='') {			
			if ($id) {
				$this->id = $id;
				$this->getObject();
			}
		}
		
		function exists() {
			return is_object($this->obj);	
		}
		
		
		function getObject() {
			global $db;
			
			$result = $db->query("SELECT * FROM ".$this->mysql_table." WHERE id=".$this->id);
			if ($db->numRows($result)) {
				$row = $db->fetch($result);
				$this->obj = $row;
					
				return $row;			
			} else {
				return 0;	
			}
		}
		
		function getObjectByValue($field, $value) {
			global $db;
			
			$result = $db->query("SELECT * FROM ".$this->mysql_table." WHERE ".$field."='".$value."'");
			
			if ($db->numRows($result)) {
				$row = $db->fetch($result);
				
				$this->obj = $row;
				$this->id = $row->id;
				
				return $row;
			} else {
				return 0;	
			}
		}
		

		function create() {
			global $db;
			
			$result = $db->query("INSERT INTO ".$this->mysql_table." (id) VALUES (NULL)");
			$this->id = $db->lastInsertedId();
			$this->getObject();
			
			return $this->id;
		}
		
		function remove() {
			global $db;
			
			$result = $db->query("DELETE FROM ".$this->mysql_table." WHERE id=".$this->id);
			
			return $result;
		}		
		
		function setValue($field, $value) {
			global $db;
			
			$result = $db->query("UPDATE ".$this->mysql_table." SET ".$field."='".$value."' WHERE id=".$this->id);
			
			return $result;
		}
		
		
		//---------------------------------------------------------------
		//---------Validators--------------------------------------------
		//---------------------------------------------------------------
		
		
		
		
		
		function validateEmail($email) {
			
			$isValid = true;
		   	$atIndex = strrpos($email, "@");
			
			if (is_bool($atIndex) && !$atIndex) {
				
				$isValid = false;	
				
			} else {
				   
				$domain = substr($email, $atIndex+1);
				$local = substr($email, 0, $atIndex);
				$localLen = strlen($local);
				$domainLen = strlen($domain);
				
				if ($localLen < 1 || $localLen > 64) { 							//local part length
					$isValid = false;
					
				} else if ($domainLen < 1 || $domainLen > 255) {				// domain part length
					 $isValid = false;
					 
				} else if ($local[0] == '.' || $local[$localLen-1] == '.') {	// local part starts or ends with '.'
					 $isValid = false;
					 
				} else if (preg_match('/\\.\\./', $local)) {					// local part has two consecutive dots
					 $isValid = false;
					 
				} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {    // character not valid in domain part
					 $isValid = false;
					 
				} else if (preg_match('/\\.\\./', $domain)) {					// domain part has two consecutive dots
					 $isValid = false;
					 
				} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
					 // character not valid in local part unless 
					 // local part is quoted
					 if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
						$isValid = false;
					 }
			  }
			  
			  /*
			  if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {		// domain not found in DNS
				 $isValid = false;
			  }
			  */
		   }
		   
		   return $isValid;
			
		}
		
		
		
		function validateUsername($username) {
				if (preg_match("/^[a-z0-9_-]{2,32}$/i", $username)) {
					$isValid = true;			
				} else {
					$isValid = false;			
				}
				
				return $isValid;
		}
		
		function validatePassword($password) {
				if (strlen($password) >= 4 && strlen($password) <= 32) {
					$isValid = true;			
				} else {
					$isValid = false;			
				}
				
				return $isValid;
		}

}
?>