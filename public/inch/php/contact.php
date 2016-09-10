<!--
	Write your contact script in this file. You can save the message in database, 
    but I give you a simple example to save the message in txt file.
    First, create an empty txt file. Name it customer_message.txt
-->
<?php
	if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message'])){
		
		$name 				= $_POST['name']."\r\n";
		$email 				= $_POST['email']."\r\n";
		$current_message	= $_POST['message']."\r\n";
		$message_date 		= date('d-m-Y  H:i');
		
		//-- your txt file name
		$file = 'visitor_message.txt';
		
		//-- read the txt's content
		$message = file_get_contents($file);
		
		//-- add new message to txt file
		$message .= "\r\n**** Message Date : ".$message_date." ****\r\n";
		$message .= "Name : ".$name;
		$message .= "Email : ".$email;
		$message .= "Message : ".$current_message;
		$message .= "**** End Of Message ****\r\n";
		
		//-- write message
		file_put_contents($file,$message);
		
		//-- send success message
		echo true;
	}
	else{
		//-- send error message
		echo false;
	}
?>