<?php
$players=425;
$last_score = 70848;

$circle=array();

$current_marble=1;
$scores = array_fill(1,$players,0);
$circle[]=0;
$circle_val = 1;
$current_player =1;
for($i=1;$i<=$last_score;$i++){
  // echo "$i L\n";
    if($i % 23 ==0){
        $current_marble  -= 7;

        if($current_marble < 0) {
            $current_marble = $circle_val + $current_marble;
        }

        $scores[$current_player] += $i+ $circle[$current_marble];
        array_splice($circle,$current_marble,1);
        $circle_val--;
    }else{

        if($current_marble  +1 >= $circle_val){
            $current_marble = 1;
        }
        else{
            $current_marble+=2;
        }
        array_splice($circle,$current_marble,0,$i);
        $circle_val++;
    }
    if($current_player<$players)
        $current_player++;
    else
        $current_player=1;
}
echo "high score: " . max($scores) . PHP_EOL;
//echo "winning elf: " .  array_search(max($scores),$scores) . PHP_EOL;
?>
