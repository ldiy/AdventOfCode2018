<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
$input = $lines[0];
$input_array = explode(" ",$input);
$sum = 0;

function find_node($in,$index) {
    $k= $index;
    //echo "items: " .count($in) . PHP_EOL;
    $nodes = $in[$index];
    $meta = $in[$index+1];
  //  $in = explode(" ",implode(" ",$in));
    if($nodes ==0){
       
        for($i=$k+2;$i<$meta+$k+2;$i++){
            $GLOBALS['sum'] += $in[$i];
           // echo "$i : added: " . $in[$i] ."    sum: " . $GLOBALS['sum'].PHP_EOL;
        }
        array_splice($in,$k,$meta+2);
        $k-= ($meta+2);
        //$in = explode(" ",implode(" ",$in));
      // echo "array: ". implode($in) ." \n";
       //print_r($in);
    }
    else{
        for($i=0;$i<$nodes;$i++){
            
            $in = find_node($in,$k+2);
            $in[$k]--;
           
        }
        $in = find_node($in,$k);
    }
    return $in;
}
//print_r($input_array);
//echo $input_array[18600] . PHP_EOL;
print_r(find_node($input_array,0));
echo "answer: " . $sum . PHP_EOL;

?>
