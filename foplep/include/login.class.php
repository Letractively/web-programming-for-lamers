<?php 
session_start();

class login extends dbelement {

		var $mysql_table = 'ctl_users';
		
		const session_logid = 'logid';	
		const session_logpass = 'logpass';
				
		function __construct() {
				
			if (isset($_COOKIE[self::session_logid]) && isset($_COOKIE[self::session_logpass])) {
				
				$_SESSION[self::session_logid] = $_COOKIE[self::session_logid];
				$_SESSION[self::session_logpass] = $_COOKIE[self::session_logpass];
				
				$this->id = $_COOKIE[self::session_logid];
				
				parent::__construct($_SESSION[self::session_logid]);
			}	
			
			if ($this->isLogged()) {
				parent::__construct($_SESSION[self::session_logid]);
			}
		}
		
		
		function isLogged() {
			global $db;
			
		
			if (isset($_SESSION[self::session_logid]) && $_SESSION[self::session_logid] != '0') {
			
				$result = $db->query("SELECT * FROM ".$this->mysql_table." WHERE id=".$_SESSION[self::session_logid]." AND password='".$_SESSION[self::session_logpass]."'");
				if ($db->numRows($result)) {
					return true;
				} else {
					return false;	
				}
			}
			
			return false;
			
		}


		function login($username, $password, $remember=false) {
			global $db;
			
			$result = $db->query("SELECT * FROM ".$this->mysql_table." WHERE username='".$username."' AND password='".md5($password)."'");
			if ($db->numRows($result)) {
				$row = $db->fetch($result);
				$_SESSION[self::session_logid] = $row->id;
				$_SESSION[self::session_logpass] = md5($password);
				$this->id = $row->id;
				parent::getObject();
				
				if ($remember) {
					setcookie(self::session_logid, $row->id, time()+60*60*24*100, "/");	
					setcookie(self::session_logpass, md5($password), time()+60*60*24*100, "/");	
				}
				
				return true;
			} else {
				return false;	
			}

		}		
		
		function logout() {
		   	setcookie(self::session_logid, "", time()-60*60*24*100, "/");
			setcookie(self::session_logpass, "", time()-60*60*24*100, "/");
			
			unset($_SESSION[self::session_logid]);
			unset($_SESSION[self::session_logpass]);		
			
		}		

		

}
?>