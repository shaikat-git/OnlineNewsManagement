<?php
	include_once('inc/header.php');	
	$eid = $_POST['user_edit_id'];
	$rows = fetchByCondition('users',' * ','id',$eid);
	
	foreach($rows as $row){
		extract($row, EXTR_PREFIX_ALL, "edit");		
	}
	
	//echo $edit_name;
	
?>

    <div class="conent_add">
   	  <h3>Add or Update User</h3>
      <form class="add_form" name="form1" method="post" action="process.php">
	  <input type="hidden" name="update_user_id" value="<?php echo $edit_id; ?>">
        <table class="add">
                <tr>
                    <td>Full Name</td>
                    <td>
                    <input type="text" name="fname" value="<?php echo $edit_name; ?>" id="textfield" placeholder="Full Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $edit_username; ?></td>
                </tr>
				 <tr>
                    <td>Old Password</td>
                    <td><input type="password" name="opass" value="" id="textfield2" placeholder="Old Password" ></td>
                </tr>
				
				 <tr>
                    <td>New Password</td>
                    <td><input type="password" name="npass" value="" id="textfield2" placeholder="New Password" ></td>
                </tr>
				
				 <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="<?php echo $edit_email; ?>" id="textfield2" placeholder="Email" required></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="update_user" id="button" value="Update">
                    </td>
                </tr>
            </table>
      </form>
    </div><!--content add end-->
    
<?php
	
	include_once('inc/footer.php');
?>