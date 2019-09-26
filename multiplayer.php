<?php
	$player = file_get_contents('turn.txt');
	echo $player;
	if($player == '1'){
		//echo "hi";
		$player = '2';
	}
	else
		$player = '1';
	$fp = fopen('turn.txt', 'w');
	fwrite($fp, $player);
	fclose($fp);
	//echo $player;
?>