<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
$positions = array();
$velocity = array();
$count =0;
$xmax=0;
$ymax=0;
$xmin=0;
$ymin=0;
foreach($lines as $line){
    $ln = str_replace(["position=< "," velocity=<","position=<"," velocity=< "],"",$line);
    $data = explode(">",$ln);

    $pos =  explode(", ",$data[0]);
   /*print_r($pos);
    echo "\n----------------------------------\n";*/
    $positions[$count]["x"] =$pos[0];
    $positions[$count]["y"] = $pos[1];

    $xmax = max($pos[0],$xmax);
    $ymax = max($pos[1],$ymax);
    $xmin = min($pos[0],$xmin);
    $ymin = min($pos[1],$ymin);

    $vel = explode(", ",$data[1]);
    $velocity[$count]["x"] = $vel[0];
    $velocity[$count]["y"] = $vel[1];
    $count++;
}


echo $xmin. PHP_EOL;
echo $ymin . PHP_EOL;

$deltax=$xmax-$xmin +1;
$deltay=$ymax - $ymin +1;

/*$xmin = $xmax;
$ymin = $ymax;
$xmax = 0;
$ymax =0;*/
$t=0;
while($xmax-$xmin < $deltax && $ymax-$ymin < $deltay){
//for($a=0;$a<3;$a++){
  // echo "1";
  $deltay = $ymax-$ymin;
  $deltax = $xmax-$xmin;
    $xmin1 = $xmax;
    $ymin1 = $ymax;
    $xmax1 = 0;
    $ymax1 =0;
    for($i=0;$i<$count;$i++){
        $positions[$i]["x"] += $velocity[$i]["x"];
        $positions[$i]["y"] += $velocity[$i]["y"];

        $xmax1  = max($xmax1,$positions[$i]["x"]);
        $ymax1  = max($ymax1,$positions[$i]["y"]);

        $xmin1  = min($xmin1,$positions[$i]["x"]);
        $ymin1= min($ymin1,$positions[$i]["y"]);
    }
    $xmax = $xmax1;
    $ymax = $ymax1;
    $ymin = $ymin1;
    $xmin = $xmin1;
    //print_r($positions);
  
        
    
    $t++;
  
}
for($i=0;$i<$count;$i++){
    $positions[$i]["x"] -= $velocity[$i]["x"];
    $positions[$i]["y"] -= $velocity[$i]["y"];

    $xmax1  = max($xmax1,$positions[$i]["x"]);
    $ymax1  = max($ymax1,$positions[$i]["y"]);

    $xmin1  = min($xmin1,$positions[$i]["x"]);
    $ymin1= min($ymin1,$positions[$i]["y"]);
}

    for($y=$ymin;$y<=$ymax;$y++){
        for($x=$xmin;$x<=$xmax;$x++){
            $print = 0;
            for($i=0;$i<$count;$i++){
                if($positions[$i]["x"] == $x && $positions[$i]["y"] == $y){
                    $print=1;
                    //echo "#";
                    break;
                }
            }
            if($print){
            echo "#";
            }else{
                echo ".";
            }
        } 
        echo "\n";
    }
    echo "\n part2: " .($t-1) . "\n";
?>
