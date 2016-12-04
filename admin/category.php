<?php
	include_once('inc/header.php');
	if(!isAdmin()){
		letsGo('index.php');
	}
	
	$categories = fetchData('categories');
	
	$tr = "";
	$i = 1;
	foreach($categories as $category){
		extract($category);
		
			$tr .=	"<tr>";
			$tr .= "<td>{$i}</td>";
			$tr .= "<td>".$c_name."</td>";
			$tr .= "<td>";
			
			$tr .= '<form action="process.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="cat_del_id" value="'.$id.'">
						<input type="submit" name="cat_delete" value="Delete">
					</form>';
					
			$tr .= '<form action="category.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="cat_edit_id" value="'.$id.'">
						<input type="submit" name="cat_edit" value="Edit">
					</form>';
				
			$tr .= "</td>";
			$tr .= "</tr>";
	$i++;
	}
	
	
	//get info from db for edit;
	$c_id = "";
	$result = "";
	
	if(isset($_POST['cat_edit'])){
		$c_id = $_POST['cat_edit_id'];
		
		$result = fetchSingle('categories','c_name','id',$c_id);
		//var_dump($result);
	
	}
	

?>
      <div class="content_view">
        <h3>Categories</h3>
    <table class="view" width="100%" cellspacing="0">
  <tr>
    <th width="6%" scope="col">SN</th>
    <th width="72%" scope="col">Title</th>
    <th width="22%" scope="col">Action</th>
  </tr>
  <?php echo $tr; ?>
  
</table>

  </div><!--content view end-->
    <div class="conent_add">
   	  <h3>Add or Update Content</h3>
      <form class="add_form" name="form1" method="post" action="process.php">
	  <input type="hidden" name="update_id" value="<?php echo $c_id;?>">
        <table class="add">
                <tr>
                    <td>Title</td>
                    <td>
                    <input type="text" name="category" id="textfield" value="<?php echo $result; ?>" placeholder="Category name" required>
                    </td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
					<?php
						
						if(isset($_POST['cat_edit'])){
							echo '<input type="submit" name="update_category" id="button" value="Update">';
						}else{
							echo '<input type="submit" name="add_category" id="button" value="Add">';
						}	
					
					?>       
                    
					</td>
                </tr>
            </table>
      </form>
	   <p style='color:red'><?php echo readMsg();?></p>
    </div><!--content add end-->
    
<?php
	include_once('inc/footer.php');
?>
