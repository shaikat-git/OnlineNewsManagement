<?php
	session_start();
	require_once('inc/dbcon.php');
	require_once('inc/functions.php');
	isGet();
	
	
	
// [ TEST the user ]



//-------------------------------------------[about category]	
	//add new category
	if(isset($_POST['add_category'])){
		$cat = saveMe($_POST['category']);
		if(!empty($cat)){
		
			if(isUnique('categories','c_name',$cat)){
				mysql_query("INSERT INTO categories (c_name) VALUES('$cat')");
				addMsg('successfully added a category');
				letsGo('category.php');
			}else{
				//already been used
				addMsg($cat.' already been used');
				letsGo('category.php');
			}
			
		}else{
			addMsg('Please provide a name');
			letsGo('category.php');
		}
	
	}
	
	//update old data 
	if(isset($_POST['update_category'])){
		$cat = saveMe($_POST['category']);
		$u_id = saveMe($_POST['update_id']);
		if(!empty($cat)){		
			if(isUnique('categories','c_name',$cat)){
					
				$sql = "UPDATE categories SET
						c_name = '$cat'
						WHERE id = '$u_id'
						";
				
				mysql_query($sql);
				addMsg('successfully updated a category');
				letsGo('category.php');
			}else{
				//already been used
				addMsg($cat .' already been used');
				letsGo('category.php');
			}
			
		}else{
			addMsg('Please provide a name');
			letsGo('category.php');
		}
	
	}
	
	
	// delete old data
	
	if(isset($_POST['cat_delete'])){
		$d_id = saveMe($_POST['cat_del_id']);
		
		mysql_query("DELETE FROM categories WHERE id = '$d_id' LIMIT 1");
		addMsg('successfully deleted a category');
		letsGo('category.php');	
	}
	
	
	
//-----------------------------------------[about news]

//insert new news
	
	if(isset($_POST['add_news'])){
		$c_id		=	saveMe($_POST['cat_id']);
		$title 		= 	saveMe($_POST['title']);
		$newsbody	=	saveMe($_POST['newsbody']);
		$u_id 		= 	$_SESSION['clientid'];
		
		
		if(!empty($c_id) && !empty($title) && !empty($newsbody)){	
			$sql = 	"INSERT INTO news 
					(title, newsbody, c_id, u_id, created_on,updated_on) 
					VALUES('$title','$newsbody','$c_id','$u_id',NOW(),NOW())";
					
			mysql_query($sql);
			letsGo('news.php');	
		}else{
			letsGo('news.php?msg="fillup the fields properly"');
		}
	
	}
	




//update old news
	if(isset($_POST['update_news'])){
		$edit_id 	=	saveMe($_POST['edit_id']);
		
		$c_id		=	saveMe($_POST['cat_id']);
		$title 		= 	saveMe($_POST['title']);
		$newsbody	=	saveMe($_POST['newsbody']);
		
	
	$sql = "UPDATE news SET
			title		= '$title',	
			newsbody	= '$newsbody',
			c_id		= '$c_id'
			WHERE id = '$edit_id' ";
	
	mysql_query($sql);		
	letsGo('news.php');	
	}



//delete old news
	
	if(isset($_POST['news_delete'])){
		$d_id = saveMe($_POST['news_del_id']);
		
		mysql_query("DELETE FROM news WHERE id = '$d_id' LIMIT 1");
		letsGo('news.php');	
	}
	
//--------------------------------------------------------[ABOUT USERS]

	//insert user
	
	if(isset($_POST['add_user'])){		
		
		$fname 	= saveMe($_POST['fname']);
		$user	= saveMe($_POST['username']);
		$pass	= sha1(saveMe($_POST['password']));
		$email	= saveMe($_POST['email']);
		
		if(
			isUnique('users','username',$user) 
			&& !empty($fname) 
			&& !empty($user) 
			&& !empty($pass)){
		
			$sql	= "INSERT INTO users 
						(name, username, password, email) 
						VALUES('$fname','$user','$pass','$email')";
			mysql_query($sql) or die(mysql_error());
			letsGo('user.php');
		}else{
			letsGo('user.php');
		}		
		
	}
	
	
	
	//update user
		if(isset($_POST['update_user'])){
			$name  = saveMe($_POST['fname']);
			$opass = saveMe($_POST['opass']);
			$npass = saveMe($_POST['npass']);
			$email = saveMe($_POST['email']);
			$uid   = saveMe($_POST['update_user_id']);
		
		
		if(!empty($name) && !empty($email)){
		
			$sql = "UPDATE users SET ";
			
			if(!empty($npass) && !empty($opass)){			
				$opass = sha1($opass);
				$npass = sha1($npass);				
				$oh = fetchSingle('users','password','id',$uid);				
				if($oh == $opass){
					$sql .= "password = '$npass',";
				}			
			}		
			
			$sql .= " name = '$name',				
					email = '$email'				
					WHERE id = '$uid'";					
					
			mysql_query($sql);
			letsGo('user.php');
		}
		
	}
	
	
	//delete user



	if(isset($_POST['user_delete'])){
		
		$did = saveMe($_POST['user_del_id']);		
		
		mysql_query("DELETE FROM users WHERE id = '$did' LIMIT 1");
		letsGo('user.php');	
	}





















