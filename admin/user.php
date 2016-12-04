<?php
	include_once('inc/header.php');
	$users = fetchData('users',array('id','name','power'));
	
	$tr = "";
	$i = 1;
	foreach($users as $user){
		extract($user);
		if(isAdmin() || $id == $_SESSION['clientid']){
				$tr .=	"<tr>";
				$tr .= "<td>{$i}</td>";
				$tr .= "<td>".$name."</td>";
				$tr .= "<td>";
				
				if(isAdmin() && $power != 1){	
				$tr .= '<form action="process.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
							<input type="hidden" name="user_del_id" value="'.$id.'">
							<input type="submit" name="user_delete" value="Delete">
						</form>';
				}	
				
				
				$tr .= '<form action="user_edit.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
							<input type="hidden" name="user_edit_id" value="'.$id.'">
							<input type="submit" name="user_edit" value="Edit">
						</form>';
				
				
				$tr .= "</td>";
				$tr .= "</tr>";
			}
	$i++;
	}
	
	
?>
      <div class="content_view">
        <h3>View Content</h3>
    <table class="view" width="100%" cellspacing="0">
  <tr>
    <th width="6%" scope="col">SN</th>
    <th width="72%" scope="col">Name</th>
    <th width="22%" scope="col">Action</th>
  </tr>
	<?php echo $tr; ?>
</table>

  </div><!--content view end-->
  
  <?php
	if(isAdmin()){
  
  ?>
    <div class="conent_add">
   	  <h3>Add or Update User</h3>
      <form class="add_form" name="form1" method="post" action="process.php">
        <table class="add">
                <tr>
                    <td>Full Name</td>
                    <td>
                    <input type="text" name="fname" value="" id="textfield" placeholder="Full Name" required>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="" id="textfield2" placeholder="User Name" required></td>
                </tr>
				 <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="" id="textfield2" placeholder="Password" required></td>
                </tr>
				
				 <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="" id="textfield2" placeholder="Email" required></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="add_user" id="button" value="Add">
                    </td>
                </tr>
            </table>
      </form>
    </div><!--content add end-->
    
<?php
	}
	include_once('inc/footer.php');
?>