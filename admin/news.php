<?php
	include_once('inc/header.php');
	
	// collect category option for form elements
	$categories = fetchData('categories');	
	$opt = "";
	foreach($categories as $category){
		extract($category);
		
		$opt .= "<option value='{$id}'>{$c_name}</option>";	
	}
	
	
	
	//collect news title for table
	$lists = fetchData('news',array('id','title','u_id'),'created_on DESC');
	$tr = "";
	$i = 1;
	foreach($lists as $list){
		extract($list);
		if(isAdmin() || ($_SESSION['clientid'] == $u_id)){
			$tr .=	"<tr>";
			$tr .= "<td>{$i}</td>";
			$tr .= "<td>".$title."</td>";
			$tr .= "<td>";
			
			if(isAdmin()){
			$tr .= '<form action="process.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="news_del_id" value="'.$id.'">
						<input type="submit" name="news_delete" value="Delete">
					</form>';
			}
			
			
			$tr .= '<form action="news_edit.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="news_edit_id" value="'.$id.'">
						<input type="submit" name="news_edit" value="Edit">
					</form>';
			
				
			$tr .= "</td>";
			$tr .= "</tr>";
			
			$i++;
			}

	}
	
	
?>
      <div class="content_view">
        <h3>View Content</h3>
    <table class="view" width="100%" cellspacing="0">
  <tr>
    <th width="6%" scope="col">SN</th>
    <th width="72%" scope="col">Title</th>
    <th width="22%" scope="col">Action</th>
  </tr>
  <?php
	echo $tr;
  ?>
  
</table>

  </div><!--content view end-->
    <div class="conent_add">
   	  <h3>Add or Update Content</h3>
      <form class="add_form" name="form1" method="post" action="process.php">
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
                    <input type="text" name="title" value="" placeholder="News Title" required id="textfield">
                    </td>
                </tr>
                <tr>
                    <td>Content</td>
                    <td><textarea cols="80" rows="10" name="newsbody" placeholder="Write something about your news" id="textfield2"></textarea></td>
                </tr>
                <tr>
                	<td>&nbsp;</td>
                    <td>
                    <input type="submit" name="add_news" id="button" value="Add"></td>
                </tr>
            </table>
      </form>
    </div><!--content add end-->
    
<?php
	include_once('inc/footer.php');
?>
