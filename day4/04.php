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
$id = 0;
$s = 0;
$w = 0;
$longest = array_fill(0,max($_id)+1,0);
$id_l =0;
foreach ($dates as $key => $val) {
    if($_id[$key] != 0) $id = $_id[$key];
    if($_modus[$key] == "s") {
        $time=explode(" ",$dates[$key]);
        $s = str_replace("00:","",str_replace("]", "",$time[1]));
    }
    if($_modus[$key] == "w") {
        $time=explode(" ",$dates[$key]);
        $w = str_replace("00:","",str_replace("]", "",$time[1]));
        $t = $longest[$id] + $w - $s;
        $longest[$id] = $t;
        if(max($longest) == $t) $id_l = $id;
    }

}
echo "max sleep:" .  max($longest) . "\n" . "id: ". $id_l . "\n";
$minutes = array();
$x = 0;
$id = 0;
$s = 0;
$w = 0;
foreach ($dates as $key => $val) {
    if($_id[$key] != 0) $id = $_id[$key];
    if($id== $id_l){
        if($_modus[$key] == "s") {
            $time=explode(" ",$dates[$key]);
            $s = str_replace("00:","",str_replace("]", "",$time[1]));
        }
        if($_modus[$key] == "w") {
            $time=explode(" ",$dates[$key]);
            $w = str_replace("00:","",str_replace("]", "",$time[1]));
            //$longest[$id] += $w - $s;
            for($i = $s; $i<$w; $i++){
                $minutes[$x] = $i;
                $x++;                
            }         
        }
    }
}
$values = array_count_values($minutes);
arsort($values);
$popular = array_slice(array_keys($values), 0, 5, true);

echo "m : " . $popular[0] . "\n";
echo "answer: " . ($popular[0] * $id_l);
?>
