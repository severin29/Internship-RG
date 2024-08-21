<?php

require '../AssignmentsW1L1/calculator2.php';
use PHPUnit\Framework\TestCase;

final class CalculatorShapesTest extends TestCase{




    public function testRectangleArea():void{
        $command = 'php ' . escapeshellarg(__DIR__ . '/../AssignmentsW1L1/calculator2.php') .
            ' --shape=rectangle --calculation=area --param1=2 --param2=3';

        $output = shell_exec($command);

        $this->assertEquals(6 . "sq cm", trim($output));

    }


    public function testRectanglePerimeter():void{
        $command = 'php ' . escapeshellarg(__DIR__ . '/../AssignmentsW1L1/calculator2.php') .
            ' --shape=rectangle --calculation=perimeter --param1=2 --param2=3';

        $output = shell_exec($command);

        $this->assertEquals(10 . "cm", trim($output));

    }

    public function testTrianglePerimeter():void{
        $command = 'php ' . escapeshellarg(__DIR__ . '/../AssignmentsW1L1/calculator2.php') .
            ' --shape=triangle --calculation=perimeter --param1=15 --param2=10';

        $output = shell_exec($command);

        $this->assertEquals(26 . "cm", trim($output));

    }

}