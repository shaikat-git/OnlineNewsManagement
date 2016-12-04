<?php	
	include_once('inc/header.php');
	
	$sql = "SELECT n.id, n.title, n.newsbody, n.created_on , c.c_name, u.name 
			FROM news as n
			LEFT JOIN categories as c
			ON n.c_id = c.id
			LEFT JOIN users as u 
			ON n.u_id = u.id 
			ORDER BY n.created_on DESC 
			LIMIT 0,10";
			
			
	$qr = mysql_query($sql);
	
	$news = "";
	while ($data = mysql_fetch_assoc($qr)){
		extract($data);
		
		$news .= "<div class='single clearfix'>
					<h2 class='single_title'><a href='details.php?newsid={$id}'>{$title}</a></h2>
					<span class='sub_title'>
					Author: <a href='#'>".is_empty($name,'Anonymous')."</a>, 
					category: <a href='#'>".is_empty($c_name,'Unknown')."</a>, 
					Published: <a href='#'>".is_empty($created_on,'Unknown')."</a>
					</span>
					<p class='single_p'>".limit_text($newsbody, 50)."</p>					
					<a href='details.php?newsid={$id}' class='readMore left'>Read More</a>
				</div>";
	
	}

?>    
    <div class="content_body">    
    	<?php   echo $news;     ?>    
    </div><!--content_body end-->
	
<?php include_once('inc/footer.php'); ?>
