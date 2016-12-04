<?php	
	include_once('inc/header.php');
	 $nid = (int)$_GET['newsid'];
	 
	$sql = "SELECT n.id, n.title, n.newsbody, n.created_on , c.c_name, u.name 
			FROM news as n
			LEFT JOIN categories as c
			ON n.c_id = c.id
			LEFT JOIN users as u 
			ON n.u_id = u.id 
			WHERE n.id = '$nid'
			";
			
			
	$qr = mysql_query($sql);
	
	$news = "";
	while ($data = mysql_fetch_assoc($qr)){
		extract($data);
		
		$news .= "<div class='single clearfix'>
					<h2 class='single_title'>{$title}</h2>
					<span class='sub_title'>
					Author: <a href='#'>".is_empty($name,'Anonymous')."</a>, 
					category: <a href='#'>".is_empty($c_name,'Unknown')."</a>, 
					Published: <a href='#'>".is_empty($created_on,'Unknown')."</a>
					</span>
					<p class='single_p'>{$newsbody}</p>						
				</div>";	
	}
	
	// 404 not found

?>
    
    <div class="details_body">    
	   <?php echo $news; ?>    
    </div><!--content_body end-->
	
<?php  include_once('inc/footer.php'); ?>
