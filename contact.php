<?php
	
	include_once('inc/header.php');
	
	$conf = "";
	if(isset($_POST['sendmail'])){
		$Name = $_POST['name']; 
		$email = $_POST['email']; 
		$recipient = "admin@yourmail.com";  
		$mail_body = $_POST['mailbody']; 
		$subject = "Any Subject"; 
		$header = "From: ". $Name . " <" . $email . ">\r\n"; 

		if(mail($recipient, $subject, $mail_body, $header)){
		
		$conf = "<p> 
				Hi,$Name.<br />
				Thanks for contact with us. we'll reply you soon
				</p>";
		
		} 
	}

?>
    
    <div class="content_body">
    
    	
        <div class="myform">
        	
            <form method="post" action="">
                <p>
                    <label><span>Your Name</span>
                        <input type="text" name="name" value="" autofocus required />
                    </label>
                </p>
                 <p>
                    <label><span>Your Email</span>
                        <input type="email" name="email" value="" required />
                    </label>
                </p>
                
                 <p>
                    <label><span>Your Message</span>
                        <textarea name="mailbody"></textarea>
                    </label>
                </p>
                <input type="submit" name="sendmail" value="Send">
            </form>
        
        </div>
        
        <div class="messageSent">
			<?php echo $conf; ?>
        </div>        
    
    </div><!--content_body end-->
<?php
	
	include_once('inc/footer.php');

?>
 