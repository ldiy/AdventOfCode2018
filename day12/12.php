<?php

for($z=0;$z<1;$z++){
$init = str_split("##...#......##......#.####.##.#..#..####.#.######.##..#.####...##....#.#.####.####.#..#.######.##...");
$rules = file("input.txt", FILE_IGNORE_NEW_LINES);
$current = $init;
$nul_pos = 0;
    for($i=0;$i<20+$z;$i++){
       // echo $i . PHP_EOL;
        //echo $i .")b ".implode($init) .  PHP_EOL;
        $ok =1;
        while($ok){
            $u=0;
            for($u =0;$u<3;$u++){
                if($init[$u] == "#")
                {
                    $ok=$u;
                    break;
                }
                $u++;
            }
            for(;$ok<=3;$ok++){
                $init = str_split("." . implode($init));
                $nul_pos +=1;
                
            }
            $ok = 0;
        
        }
        
        $ok =1;
        while($ok){
            $u=0;
            for($u =0;$u<3;$u++){
                if($init[count($init)-$u-1] == "#")
                {
                    $ok=$u;
                    break;
                }
            }
        // echo "u1: $u\n";
            for(;$ok<=3;$ok++)
                $init[] = ".";
            $ok = 0;
        }
        $current = $init;
        //echo $i .")  ".implode($init) .  PHP_EOL . PHP_EOL;
        foreach($rules as $rule){
            $rule_arr = explode(" => ",$rule);
            $condition = str_split($rule_arr[0]);
            
            
            for($x=0;$x<count($init)-count($condition); $x++){
                $check = 1;
                for($t=0;$t<count($condition); $t++){
                    if($init[$t+$x] != $condition[$t])
                        $check = 0;
                }
                if($check)
                    $current[$x+2] = $rule_arr[1];
                
            }
            //if(strpos($intit,$rule_arr[0])!== false){

            //}
        }
        $init = $current;
        //echo $i .")  ".implode($current) .  PHP_EOL;
    }
    $sum = 0;
    for($p=0;$p<count($current); $p++){
        if($init[$p] == "#"){
            $sum += $p - $nul_pos;
        }
    }
    echo "z:$z answer: $sum\n";
}
?>
