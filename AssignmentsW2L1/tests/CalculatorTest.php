<?php declare(strict_types=1);
require '../AssignmentsW1L1/Calculator.php';
use PHPUnit\Framework\TestCase;


final class CalculatorTest extends TestCase{

    public function testMultiplication(): void{

        $calculator = new Calculator();
        $result = $calculator->calculate("multiply", 10, 10);
        $this->assertEquals(100, $result);

    }

    public function testDivision(): void{

        $calculator = new Calculator();
        $result = $calculator->calculate("divide", 10, 10);
        $this->assertEquals(1, $result);

    }

    public function testDivisionByZero(): void{

        $calculator = new Calculator();
        $this->expectException(InvalidArgumentException::class);
        $calculator->calculate("divide", 6, 0);
    }

}