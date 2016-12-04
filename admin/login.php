<?php	
	session_start();
	require_once('inc/dbcon.php');
	require_once('inc/functions.php');
	
	if(isset($_POST['login'])){
	
		$user	=	saveMe($_POST['user']);
		$pass	=	saveMe($_POST['pass']);
		
		if(!empty($user) && !empty($pass)){
			$sql = "SELECT * FROM users WHERE username='$user' AND password = '$pass' ";
			$qr = mysql_query($sql);
			if(mysql_num_rows($qr) == 1){
				$data = mysql_fetch_assoc($qr);
				$_SESSION['login']		=	'Done';
				$_SESSION['clientid']	=	$data['id'];
				$_SESSION['name']		=	$data['name'];
				$_SESSION['power']		=	$data['power'];
				
				letsGo('index.php');
			
			}else{
				// wrong username or password
				addMsg('wrong username or password');
			
			}
		
		}else{
			// give a message
			addMsg('Please fillup the form properly');
			
		}
		
		
	
	}


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<div class="wrapper">
	<h2 class="title">Welcome to admin panel</h2><!--/*nav end*/-->
    <div class="container"><!--content view end-->
    <div class="conent_add">
   	  <h3>Log In</h3>
      <form class="add_form" name="form1" method="post" action="">
        <table class="add">
                <tr>
                    <td>Username</td>
                    <td>
                    <input type="text" name="user" value="" id="textfield" placeholder="User Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass" value="" id="textfield2" placeholder="Password" required></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="login" id="button" value="Login"></td>
                </tr>
            </table>
      </form>
	  
	  <p style='color:red'><?php echo readMsg();?></p>
	  
    </div><!--content add end-->
    
  </div><!--container end-->
</div><!--wrapper end-->
</body>
</html>
