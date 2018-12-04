<?php

$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
$plane=array();
$count =0;
$y_max =0;
$x_max=0;
foreach($lines as $line){
    $cols = explode(" ",$line);
    $id = str_replace("#","",$cols[0]);
    $start_coord = explode(",",$cols[2]);
    $x = $start_coord[0];
    $y = str_replace(":","",$start_coord[1]);
    $size = explode("x",$cols[3]);
    $width = $size[0];
    $height = $size[1];
	for($i=0;$i<$width;$i++){
		for($a=0;$a<$height;$a++){
			if($plane[$i+$x][$a+$y] == NULL){
				$plane[$i+$x][$a+$y] = $id;
			}
			elseif($plane[$i+$x][$a+$y] != "X"){
				$plane[$i+$x][$a+$y] = "X";
				$count++;
			}
		}
	}
}
foreach($lines as $line){  
    $cols = explode(" ",$line);
    $id = str_replace("#","",$cols[0]);
    $start_coord = explode(",",$cols[2]);
    $x = $start_coord[0];
    $y = str_replace(":","",$start_coord[1]);
    $size = explode("x",$cols[3]);
    $width = $size[0];
    $height = $size[1];
	$part2=1;;
	for($i=0;$i<$width;$i++){
		for($a=0;$a<$height;$a++){
			if($plane[$i+$x][$a+$y] == "X"){
				$part2=0;;
			}		
		}
	}
	if($part2) echo "part2: " . $id . "\n";
}
echo "part1: " . $count ."\n";
?>
