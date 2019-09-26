<!DOCTYPE html>
<html>
<head>
	<title>Trial</title>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
  	  <script>
  	  	var score = 0;
  	  	var currentPlayer = 1;
  	  	var moveMade = false;
		$( function() {
			$("#closed_deck").click(function(){
				if(currentPlayer != localStorage["Player"] || moveMade)
					return ;
		        $.ajax({url: "returnFromDeck.php", success: function(result){
		        	//alert(result.split(':')[1]);
		        	//alert(result);
		        	moveMade = true;
		        	if(result == ""){
		        		alert("Game Over");
		        		return ;
		        	}
		        	img = result.split(':')[0];
		        	area = Math.round(result.split(':')[1]*100)/100;

		            //alert(result);
		            cardNumber = parseInt(img.split('.png')[0]);
		            if(cardNumber < '50'){
		            	$("#new_cards").prepend("<div class=\"draggable\" style='position:absolute'><dir class=\"percentage\"><h6 class=\"value\">"+area+" sqft</h6></dir><img src=\"pics/"+img+"\" style='width:100%'></div>");
		            	score+=area;
		            }
		            else{
		            	$("#new_cards").prepend("<div class=\"draggable\" id='activity_card' style='position:absolute'><img src=\"pics/"+img+"\" style='width:100%'></div>");
		            	$("#activity_card").fadeOut(5000);

		            	if(cardNumber == '50')
		            		score-= 0.1*score;
		            	else if(cardNumber == '51')
		            		score+= 0.1*score;
		            	else if(cardNumber == '52')
		            		score-= 0.2*score;
		            	else if(cardNumber == '53')
		            		score+= 0.2*score;
		            	else if(cardNumber == '54')
		            		score-= 0.3*score;
		            	else
		            		score+= 0.3*score;
		            	if(cardNumber % 2 == 0){
		            		$("#redBox").show();
		            		$("#redBox").fadeOut(5000);
		            	}
		            	else{
		            		$("#greenBox").show();
		            		$("#greenBox").fadeOut(5000);
		            	}
		            }
		            $("#score").html("Score : "+Math.round(score*100)/100);
		            $( function() {
					    $( ".draggable" ).draggable();
					  //   $("#closed_deck").click(function(){
					  //   	$("#open_card").show();
					  //   });
					  });	

		        }});
		        //$('#new_cards, .draggable').hide();
		    });
		});

		$( function() {
		    $( ".draggable" ).draggable();
		  //   $("#closed_deck").click(function(){
		  //   	$("#open_card").show();
		  //   });
		  });	
		function done(){
			//alert("done");
			if(currentPlayer != localStorage["Player"] || !moveMade)
				return ;
			moveMade = false;	
			$.ajax({url: "multiplayer.php", success: function(result){
				//$("#turn").html("Player "+result+"'s turn");
				console.log(result);
				}
			});
		}

		function checkPlayer(){
			$.ajax({url: "checkPlayer.php", success: function(result){
				//console.log(result);
				$("#turn").html("Player "+result+"'s turn");
				currentPlayer = result;
				}
			});
		}

		setInterval(checkPlayer, 500);
	  </script>
	  <style type="text/css">
	  	body{
		    background-image: url("logo2.png");
		    background-color: #cccccc;
		    background-repeat: no-repeat;
		    height: 100%;
		    background-position: center;
		    background-color: #D9DBDE;
			}
	  	.percentage{
	  		background-color: green;
	  		height: 25px;
	  		margin-bottom: 0px;
	  		z-index: 1000;
	  		position: absolute;
	  		margin-left : 10px;
	  		border-radius: 5px;
	  		padding-right: 10px; 
	  	}
	  	.value{
	  		color: white;
	  		position: relative;
	  		margin-top: 2px;
	  		margin-left: -36px;
	  	}
	  	.draggable{
	  		width: 250px;
	  	}
	  	.draggable img{
	  		width:60%;
	  		margin-bottom: 2%;
	  	}
	  	#stash{
	  		overflow-y : scroll;
	  		height: 700px;
	  		overflow-x: visible;
	  	}
	  	#board{
	  		min-height: 700px;
	  	}
	  </style>
</head>
<body>
	<div class="row">
		<div id="board" class="col-md-10">
			<div id="score" style="width:150px; border-radius: 5px">Score : 0</div>
			<dir id="redBox" style="width:150px; background: red; position: absolute; display: none; margin-top: -4%; opacity: 0.5">&nbsp<br>&nbsp</dir>
			<div id="greenBox" style="width:150px; background: green; position: absolute; display: none; margin-top: -4%; opacity: 0.5">&nbsp<br>&nbsp</div>
			<div>
				<h6 id="turn">Player 1's turn</h6>
				<button onclick="done()">Done</button>
			</div>
		</div>
		<div class="col-md-2">
			<div id="deck"><img src="logo.png" id="closed_deck" style="width: 100%;"></div>
			<div id="new_cards"></div>

		</div>
	</div>
</body>
</html>