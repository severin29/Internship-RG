<?php

$longopts = ["operator:","operand1:","operand2:"];
$options = getopt('',$longopts);

$operator = $options['operator'];
$operand1 = $options['operand1'];
$operand2 = $options['operand2'];


switch ($operator){
    case "addition":
        echo $operand1+$operand2;
        break;

    case "subtraction":
        echo $operand1-$operand2;
        break;

    case "multiplication":
        echo $operand1*$operand2;
        break;   
        
    case "division":
        echo $operand1/$operand2;
        break;
}