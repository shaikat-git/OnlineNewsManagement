<?php
	include_once('inc/header.php');
	isGet();
	
	//collect info to edit
	$e_id = $_POST['news_edit_id'];	
	$elements = fetchByCondition('news'," * ",'id',$e_id);
	foreach($elements as $element){
		$edit = $element;
	}
	
	
	// collect category option for form elements
	$categories = fetchData('categories');	
	$opt = "";
	foreach($categories as $category){
		extract($category);		
		$opt .= "<option ";	
		$opt .= ($edit['c_id'] == $id) ? 'selected' : '';
		$opt .= " value='{$id}'>{$c_name}</option>";	
	}
	
	
	
?>	
    <div class="conent_add">
   	  <h3>Add or Update Content</h3>
      <form class="add_form" name="form1" method="post" action="process.php">
	  <input type="hidden" name="edit_id" value="<?php echo $edit['id']; ?>">
        <table class="add">
				<tr>
                    <td>Category</td>
                    <td>
                    <select name="cat_id" required>
					<option value="">Select A Category</option>
					<?php echo $opt; ?>
                    </select>				
                    </td>
                </tr>
				
                <tr>
                    <td>Title</td>
                    <td>
                    <input type="text" name="title" value="<?php echo $edit['title']; ?>" placeholder="News Title" required id="textfield">
                    </td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><textarea cols="80" rows="10" name="newsbody" placeholder="Write something about your news" id="textfield2"><?php echo $edit['newsbody']; ?></textarea></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="update_news" id="button" value="Update"></td>
                </tr>
            </table>
      </form>
    </div><!--content add end-->
    
<?php
	include_once('inc/footer.php');
?>
