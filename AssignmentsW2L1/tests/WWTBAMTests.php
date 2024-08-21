<?php

require '../AssignmentsW1L2/WWTBAM.php';
include '../AssignmentsW1L2/WWTBAM.php';

use PHPUnit\Framework\TestCase;

class WWTBAMTests extends TestCase{


    public function testDisplayScoreboard()
    {
        // Mock data for the scoreboard
        $scoreboard = [
            ["name" => "Alice", "score" => 1000],
            ["name" => "Bob", "score" => 500],
            ["name" => "Charlie", "score" => 2000],
        ];

        // Start output buffering to capture output
        ob_start();

        // Call the function
        displayScoreboard($scoreboard);

        // Get the output
        $output = ob_get_clean();

        // Define the expected output
        $expectedOutput = "\n Final Scoreboard: \n" .
            "Charlie: $2,000\n" .
            "Alice: $1,000\n" .
            "Bob: $500\n" .
            "Thanks for playing! \n";

        // Assert that the actual output matches the expected output
        $this->assertEquals($expectedOutput, $output);
    }



}