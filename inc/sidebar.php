<?php
	$rows = fetchData('news',array('id','title'),'created_on DESC');
	
	$li = "";
	foreach($rows as $row){
		extract($row);
		$li .= "<li><a href='details.php?newsid={$id}'>{$title}</a></li>";
	}

?>


 <div class="sidebar right">
    
    	<div class="sidebar_content">
            <h2 class="sidebar_title">Recent Posts</h2>
            <ul class="item clearfix">
                <?php echo $li; ?>
            </ul>        
        </div><!--sidebar content end-->
    
    </div><!--sidebar end-->