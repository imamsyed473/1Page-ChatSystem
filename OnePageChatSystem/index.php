<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<link rel="stylesheet" href="style.css" />
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	
</head>

<body>
	
	
	
	<div id ="wrapper">
	
<!--
		<h1 id="h1"><span style="color: red;">Simple</span>
			<span style="color: blue;">chat</span>
			<span style="color: yellow;">system</span>
		</h1>
-->
		<h1 class="elegantshadow"> <span> Simple chat System</span></h1>
		
		
		
		<div class="chat_wrapper">
		
			<div id="chat"></div>
			
			<form method="post" id="msgfrm">
				
				<textarea placeholder="press Enter to send..." name="message" cols="30" rows="7" class="textarea" ></textarea>		
		</form>			
			</div>
	</div>

	<script>
	 LoadChat();
		
		setInterval(function(){
			 LoadChat();
		}, 1000);
		
		function LoadChat(){
			
			$.post('handlers/messages.php?action=getMessage', function(response){
				$('#chat').html(response);
				$('#chat').scrollTop( $('#chat').prop('scrollHeight'));
			});
		}
		
	$('.textarea').keyup(function(e){
	if( e.which == 13 )	{
		$('form').submit();
	        }
		});
		
	$('form').submit(function(){
		
		var message = $('.textarea').val();
		
		$.post('handlers/messages.php?action=sendMessage&message='+message,function(response){

			if(response == 1){
					 LoadChat();

			document.getElementById('msgfrm').reset();	
				
			}
		});
		
		return false;
	});
	</script>
	
	
	
</body>
</html>