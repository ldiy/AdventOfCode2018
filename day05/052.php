<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);

foreach($lines as $line){
    $_input = str_split($line);
    $min = count($_input);
    $used_leters=array();
    for($s=0;$s<count($_input);$s++){
        if(!in_array(strtolower($_input[$s]),$used_leters)){
            $input = str_split(str_ireplace($_input[$s],"",implode("",$_input)));
            $used_leters[] = strtolower($_input[$s]);
            for($i=0;$i<count($input)-1;$i++){
                if($i == count($input)-1) break;
                if(ctype_upper($input[$i]) && strtolower($input[$i]) == $input[$i+1]) {
                    $input = str_split(str_replace($input[$i] . $input[$i+1],"",implode("",$input)));
                    $i=0;
                }
                elseif(ctype_upper($input[$i+1]) && strtolower($input[$i+1]) == $input[$i]) {
                    $input = str_split(str_replace($input[$i] . $input[$i+1],"",implode("",$input)));
                    $i=0;
                }
            }
            $new_count = count($input);
            if($new_count<$min){
               $min= $new_count;
            }
        }       
    }
    echo "answer:" . $min . "\n" ;
}
?>
