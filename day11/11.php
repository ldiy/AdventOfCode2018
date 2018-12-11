<?php
$serial_number = 7803;
function calculate_powerlevel($_x,$_y){
    $total_pwl = 0;
    for($y=$_y; $y<$_y+3;$y++){
        for($x=$_x; $x<$_x+3;$x++){
            $rack_id = $x+10;
            $powerlevel= $rack_id * $y;
            $powerlevel += $GLOBALS['serial_number'];
            $powerlevel *= $rack_id;
            if($powerlevel<100) $powerlevel =0;
            else
                $powerlevel = (int)substr($powerlevel,-3);
            $powerlevel -=5;
            $total_pwl+=$powerlevel;
        }
    }
    return $total_pwl;

}

//echo calculate_powerlevel(122,79);

$max_fuel =0;
$x_m=0;
$y_m=0;
for($y=1; $y<=300-3;$y++){
    for($x=1; $x<=300-3;$x++){
        $pwl = calculate_powerlevel($x,$y);
        if($pwl >= $max_fuel){
            $max_fuel =$pwl;
            $x_m=$x;
            $y_m=$y;
        }
    }
}
echo "x: $x_m \n y: $y_m\n";
?>
