<?php
	echo "Im generating the deck";
	$kind_of_cards = array("1.png", "2.png", "3.png", "4.png", "5.png", "6.png", "7.png", "8.png", "9.png", "10.png", "11.png", "12.png", "13.png", "14.png", "15.png", "16.png", "17.png", "18.png", "19.png", "20.png", "21.png", "22.png", "23.png", "24.png", "25.png", "26.png", "27.png", "28.png", "50.png", "50.png", "51.png", "52.png", "53.png", "54.png", "55.png", "50.png", "51.png", "52.png", "53.png", "54.png", "55.png", "50.png", "51.png", "52.png", "53.png", "54.png", "55.png");

	$fp = fopen('deck.txt', 'w');
	$size = sizeof($kind_of_cards);
	$index = rand(1, 28);
	fwrite($fp, $kind_of_cards[$index]."\n") ;
	array_splice($kind_of_cards, $index, 1);
	$index = rand(1, 27);
	fwrite($fp, $kind_of_cards[$index]."\n") ;
	array_splice($kind_of_cards, $index, 1);
	for($i = 0; $i < $size-2; $i++){
		$index = rand(0, $size - $i - 3);
		fwrite($fp, $kind_of_cards[$index]."\n") ;
		array_splice($kind_of_cards, $index, 1);
	}
	fclose($fp);

	//also set player
	$fp = fopen("turn.txt", "w");
	fwrite($fp, 1);
	fclose($fp);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create deck</title>
</head>
<body>
	<script type="text/javascript">
		//localStorage.setItem('pointer', '0');  //start counting from 0. Do this when your screens load
	</script>
</body>
</html>