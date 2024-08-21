<?php

require '../AssignmentsW1L2/WWTBAM.php';
include '../AssignmentsW1L2/WWTBAM.php';

use PHPUnit\Framework\TestCase;

class WWTBAMTests extends TestCase{


    public function testDisplayScoreboard()
    {
        
        $scoreboard = [
            ["name" => "Alice", "score" => 1000],
            ["name" => "Bob", "score" => 500],
            ["name" => "Charlie", "score" => 2000],
        ];

        // Start output buffering to capture output
        ob_start();

        displayScoreboard($scoreboard);

        $output = ob_get_clean();

        $expectedOutput = "\n Final Scoreboard: \n" .
            "Charlie: $2,000\n" .
            "Alice: $1,000\n" .
            "Bob: $500\n" .
            "Thanks for playing! \n";

        $this->assertEquals($expectedOutput, $output);
    }



}
