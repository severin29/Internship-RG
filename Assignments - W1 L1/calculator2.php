<?php

$longopts = ["shape:","calculation:","param1:", "param2::"];
$options = getopt('',$longopts);

$shape = $options['shape'];
$calculation = $options['calculation'];
$param1 = $options['param1'];

switch ($shape){
    case "circle":

        switch ($calculation){

            case "area":
                $result = pi()*(pow($param1,2));
                $result = number_format($result,2,'.','');
                echo $result . "sq cm";
                break;

            case "perimeter":
                $result = pi()*$param1*2;
                $result = number_format($result,2,'.','');
                echo $result . "cm";
                break;
            }
    break;
            
    case "triangle":
        $param2 = $options['param2'];
        switch ($calculation){

            case "area":

                echo ($param1*$param2)/2 . "sq cm";
                break;

            case "perimeter":

                $param3 = sqrt($param1^2+$param2^2);
                echo $param1+$param2+$param3 . "cm";
                break;
            }

    break;
            

    case "rectangle":
        $param2 = $options['param2'];
        switch ($calculation){

            case "area":

                echo $param1*$param2 . "sq cm";
                break;

            case "perimeter":
                
                echo ($param1+$param2)*2 . "cm";
                break;
            }
    break;
            
    
    case "square":
        switch ($calculation){

            case "area":

                echo pow($param1,2) . "sq cm";
                break;

            case "perimeter":
                
                echo $param1*4 . "cm";
                break;
            }
                        
    break;
}
