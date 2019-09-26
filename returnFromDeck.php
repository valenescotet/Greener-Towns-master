<?php
	// $f = fopen("deck.txt", "r");
	// $contents = file_get_contents("deck.txt");
	// $line = fgets($f);
	// $contents = preg_replace($line, '', $contents);
	// file_put_contents("deck.txt", $contents);
	// echo $line;

	//$f = fopen("deck.txt", "w");
	//echo "kkk".file_get_contents("deck.txt");
	$contents = explode("\n",file_get_contents("deck.txt"));
	//echo $contents[0];
	if($contents[0] == "")
		echo "";
	else{
		$result = $contents[0];
		//echo $contents[1];
		// echo $result;
		$string = "";
		for($i = 1; $i < sizeOf($contents); $i++){
			$string = $string.$contents[$i]."\n";
		}
		$f = fopen("deck.txt", "w"); 
		fwrite($f, $string);
		fclose($f);
		//echo "hhh".$result."<br>";

		$img = $result;
		$greenery = file_get_contents('greenery.txt');
		$greenery = explode("\n",$greenery);
		//echo $greenery[5]."jjjj";
		preg_match_all('!\d+!', $result, $matches);
		//echo ($matches[0][0]);
		if($matches[0][0] < 50)
			echo $img.':'.$greenery[$matches[0][0]];
		else
			echo $img.':';
	}


?>