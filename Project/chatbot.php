<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MotiBOT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

	<section class="hero">
		<div class="main-width">
			<header>
				<div class="logo">
					<img class="pic" src="img/logo.jpg">
				</div>

				<nav>
				    <div class="hamb">
						<span></span>
						<span></span>
						<span></span>
					</div>

					<ul class="nav-list">
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="service.php">Service</a></li>
						<li><a href="profile.php">Developer</a></li>
						<li class="btn"><a href="chatbot.php">Let's Talk</a></li>
					</ul>
				</nav>
			</header>
		</div>
		<div id="contains">
			<div id="screen">
            	<div id="header">
                	<div class="logo">
                    	<img src="img/chat.png">
                    	<p>MOTIBOT</p>
                	</div>
                	<li>
                    	Active
                	</li>
            	</div>
            <div id="messageDisplaySection">

            </div>
            	<div id="userInput">
                	<input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type Your Message Here." required>
                	<input type="submit" value="Send" id="send" name="send">
            	</div>
        	</div>
        </div>
	</section>
		
	<script type="text/javascript" src="js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
    $("#messages").on("keyup",function(){

        if($("#messages").val()){
            $("#send").css("display","block");
        }else{
            $("#send").css("display","none");
        }
    });
});
$("#send").on("click",function(e){
    $userMessage = $("#messages").val();
    $appendUserMessage = '<div id="messagesContainer"><div class="chat usersMessages">'+ $userMessage +'</div></div>';
    $("#messageDisplaySection").append($appendUserMessage);

    $.ajax({
        url: "bot.php",
        type: "POST",
        data: {messageValue: $userMessage},
        success: function(data){
            $appendBotResponse = '<div id="messagesContainer2"><div class="chat botMessages">'+data+'</div></div>';
            $("#messageDisplaySection").append($appendBotResponse);
            $("#messageDisplaySection").scrollTop($("#messageDisplaySection")[0].scrollHeight);
        }
    });
    $("#messages").val("");
    $("#send").css("display","none");
});
    </script>
</body>
</html>