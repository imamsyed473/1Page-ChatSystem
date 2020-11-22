
<?php

include('../config.php');
 
session_start();

switch( $_REQUEST['action'] ){
	  case "sendMessage":
	  
	  $query = $db->prepare("INSERT INTO messages SET name=?, message=?");
	
	$run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);
		
		if($run){
			echo 1;
			exit;
		}
		
	
	break;
		
		case "getMessage":
		
    $query = $db->prepare("SELECT * FROM messages");
	$run = $query->execute();
		
		$rs= $query->fetchAll(PDO::FETCH_OBJ);
		
		$chat = '';
		foreach( $rs as $message )
		{
			 if ($message->name == "Mex")
   {
  //$chat .= $message->message.'<br/>';
			$chat .= '<div class="message-orange"><strong>'.$message->name.'</strong>'.'<br />'.$message->message.'<div class="message-timestamp-right">'.date('h:i a', strtotime($message->date)).'</div>'.'</div>';
   }
  else if ($message->name == "Ali")
  {
        //$chat .= $message->message.'<br/>';
			$chat .= '<div class="message-blue"><strong>'.$message->name.'</strong>'.'<br />'.$message->message.'<div class="message-timestamp-left">'.date('h:i a', strtotime($message->date)).'</div>'.'</div>';
  }
			//$chat .= $message->message.'<br/>';
//			$chat .= '<div class="message-orange"><strong>'.$message->name.'</strong>'.'<br />'.$message->message.'<div class="message-timestamp-right">'.date('h:i a', strtotime($message->date)).'</div>'.'</div>';
			
		}
		
		
		
	  echo $chat;
		break;
		
	  }

?>