<?php
	
	$categories = fetchData('categories');
	
	$li = "";
	foreach($categories as $cat){
			extract($cat);
		
		$li .= " <li><a href='category_details.php?cat_id={$id}'>{$c_name}</a></li> ";
	
	}
?>
<div class="nav clearfix" id="cssmenu">
            <ul>
            <li class='active'><a href='index.php'>Home</a></li>
            <li class='has-sub'><a href='#'>Products</a>
                <ul>
					<?php echo $li; ?>					
                </ul>
            </li>
            <li><a href='contact.php'>Contact</a></li>
            </ul>
    </div><!--navigation end-->