<?php	
	
	require_once('dbcon.php');

	function saveMe($arg){			
			return addslashes(htmlspecialchars(trim($arg)));	
	}
	
	
	function letsGo($url = null){		
		if($url != null){
			header("Location: {$url}");
			exit();
		}	
	}
	
	function isUnique($table,$condition,$val){		
		$qr = mysql_query("SELECT * FROM $table WHERE $condition='$val'");
		if(mysql_num_rows($qr) == 0){
			return true;
		}
		return false;	
	}
	
	function checkLogin(){
		if(!isset($_SESSION['login']) && $_SESSION['login'] != 'Done' && !isset($_SESSION['name'])){
			letsGo('login.php');
		}
	}
	
	function isGet(){
		if($_SERVER['REQUEST_METHOD']=='GET'){
			letsGo('index.php');
		}
	}
	
	function isPost(){
		
	}
	
	function isAdmin(){
		if($_SESSION['power'] == 1){
			return true;
		}	
		return false;		
	}
	
	
		
	function addMsg($msg = ""){
			$_SESSION['msg'] = "";
			if(!empty($msg)){
				$_SESSION['msg'] .= $msg ."<br/>";
			}	
	}
	
	function readMsg(){
		if(!empty($_SESSION['msg'])){
			$x =  $_SESSION['msg'];
			$_SESSION['msg']= "";
			return $x;
		}
		return false;	
	}
	
	
	function is_empty($data,$ret = ' -- '){
		if(empty($data)){
			return $ret;
		}else{
			return $data;
		}
		
	}
	
	// limit text to get readmore link
	function limit_text($text, $limit) {
     
      if (strlen($text) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          if(count($pos) >$limit)
          {
            $text = substr($text, 0, $pos[$limit]) . '...';
          }
          return $text;
      }
      return $text;
    }
	
	
	//DATABASE RELATED FUNCITONS
	function fetchData($table,$fields = " * ",$orderby = "",$limit = '0,10'){
			$result = "";
			
			if(is_array($fields)){
				$fields = implode(', ',$fields);
			}
			
			$sql  = "SELECT $fields FROM $table ";
			
			if(!empty($orderby)){
			$sql .= "ORDER BY $orderby";
			}
			
			$sql .= " LIMIT $limit ";
			
			$qr = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($qr)){
				$result = array();
				while($data = mysql_fetch_assoc($qr)){				
					$result[] = $data;
				}				
			}		
			return $result;			
		}		
	
		
	function fetchSingle($table,$field,$item,$val){
		$result = "";
		$qr = mysql_query("SELECT $field FROM $table WHERE $item='$val'");
		if(mysql_num_rows($qr)){
			$data = mysql_fetch_assoc($qr);	
			$result = $data[$field];
		}
		
		return $result;
	}
	
	function fetchByCondition($table,$fields,$item,$val){
		$result = "";
		if(is_array($fields)){
				$fields = implode(', ',$fields);
			}
		$qr = mysql_query("SELECT $fields FROM $table WHERE $item='$val'");
		$result = array();
		if(mysql_num_rows($qr)){
			while($data = mysql_fetch_assoc($qr)){	
			$result[] = $data;
			}
		}
		
		return $result;
	
	}
