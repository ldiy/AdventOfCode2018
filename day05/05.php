<?php
$lines = file("input.txt", FILE_IGNORE_NEW_LINES);
foreach($lines as $line){
    $input = str_split($line);
    for($i=0;$i<count($input)-1;$i++){
        if($i == count($input)-2) break;
        if(ctype_upper($input[$i]) && strtolower($input[$i]) == $input[$i+1]) {
            $input = str_split(str_replace($input[$i] . $input[$i+1],"",implode("",$input)));
            $i=0;
        }
        elseif(ctype_upper($input[$i+1])  && strtolower($input[$i+1]) == $input[$i]) {
            $input = str_split(str_replace($input[$i] . $input[$i+1],"",implode("",$input)));
            $i=0;
        }
    }
    echo "answer:" . count($input) . "\n" ;
}
?>
