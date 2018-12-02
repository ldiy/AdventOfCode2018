<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
$lowest=100;
$ida=0;
$idb=0;

for($a=0;$a<count($lines); $a++){
    for($b=0;$b<count($lines); $b++){

        $count =0;

        if($a != $b){

            $ara = str_split($lines[$a]);
            $arb = str_split($lines[$b]);

            for($x=0;$x<count($ara);$x++){
                
                //echo join(' ', array_diff($ara, $arb)) . "\n";
                    if($ara[$x] != $arb[$x]){

                        $count++;

                    }

                
            }
            if($count < $lowest){
                $lowest = $count;
                $ida= $a;
                $idb = $b;
            }


        }
    }
}

$ara = str_split($lines[$ida]);
$arb = str_split($lines[$idb]);
for($a=0;$a<count($ara); $a++){
    if($ara[$a] == $arb[$a]){
        echo $ara[$a];
    }
    
}
echo "\n";
echo("eerste: " . $lines[$ida] . "\n");
echo ("tweede: " . $lines[$idb] . "\n");
?>
