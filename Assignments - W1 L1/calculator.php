<?php

$longopts = ["operator:","operand1:","operand2:"];
$options = getopt('',$longopts);

$operator = $options['operator'];
$operand1 = $options['operand1'];
$operand2 = $options['operand2'];


switch ($operator){
    case "plus":
        echo $operand1+$operand2;
        break;

    case "minus":
        echo $operand1-$operand2;
        break;

    case "multiply":
        echo $operand1*$operand2;
        break;   
        
    case "divide":
        echo $operand1/$operand2;
        break;
}