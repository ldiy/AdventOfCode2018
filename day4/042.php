<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
$dates = array();
$times = array();
$_modus = array();
$_id = array();
$count =0;
$_rank = array();
foreach($lines as $line){
    $cols = explode("] ",$line);
    $dates[$count] = str_replace("[","",$cols[0]);
    $_id[$count] =0;
    $ev = explode(" ", $cols[1]);
    switch ($ev[0]) {
        case 'wakes':
           $_modus[$count] = "w";
            break;
        case 'falls':
           $_modus[$count] = "s";
            break;
        case 'Guard':
            $_modus[$count] = "g";
            $_id[$count] = str_replace("#","",$ev[1]);
            break;
        default:
            break;
    }
    $count++;
}
asort($dates);


$minutes = array();
$x = 0;
$id = 0;
$s = 0;
$w = 0;
foreach ($dates as $key => $val) {
    if($_id[$key] != 0) $id = $_id[$key];    
        if($_modus[$key] == "s") {
            $time=explode(" ",$dates[$key]);
            $s = str_replace("00:","",str_replace("]", "",$time[1]));
        }
        if($_modus[$key] == "w") {
            $time=explode(" ",$dates[$key]);
            $w = str_replace("00:","",str_replace("]", "",$time[1]));
            //$longest[$id] += $w - $s;
            for($i = $s; $i<$w; $i++){
                $minutes[$id][] = $i ;
                $x++;                
            }         
    }
}
$max_min=0;
$max=0;
$max_min_id=0;
foreach ($minutes as $key => $ind){
   $ar = $ind;
    $values = array_count_values($ar);
    arsort($values);
    if(max($values) > $max){
        $max = max($values);
        $popular = array_slice(array_keys($values), 0, 5, true);
        $max_min =  $popular[0];
        $max_min_id = $key;
    } 
}
echo "min: " . $max_min . "\nid:" . $max_min_id . "\n";
echo "answer: " . ($max_min *  $max_min_id);
?>
