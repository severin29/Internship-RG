<?php

$questions = [
    [
        "question" => "Which country is home to the kangaroo?",
        "choices" => ["A. India", "B. Australia", "C. South Africa", "D. Brazil"],
        "answer" => "B"
    ],
    [
        "question" => "What is the largest planet in our solar system?",
        "choices" => ["A. Earth", "B. Jupiter", "C. Saturn", "D. Neptune"],
        "answer" => "B"
    ],
    [
        "question" => "Who wrote the play 'Romeo and Juliet'?",
        "choices" => ["A. William Shakespeare", "B. Charles Dickens", "C. Mark Twain", "D. Leo Tolstoy"],
        "answer" => "A"
    ],
    [
        "question" => "What is the capital of Japan?",
        "choices" => ["A. Seoul", "B. Beijing", "C. Tokyo", "D. Bangkok"],
        "answer" => "C"
    ],
    [
        "question" => "Which element has the chemical symbol 'O'?",
        "choices" => ["A. Gold", "B. Oxygen", "C. Iron", "D. Helium"],
        "answer" => "B"
    ],
    [
        "question" => "In which year did the Titanic sink?",
        "choices" => ["A. 1912", "B. 1905", "C. 1918", "D. 1923"],
        "answer" => "A"
    ],
    [
        "question" => "Who is known as the 'Father of Computers'?",
        "choices" => ["A. Charles Babbage", "B. Alan Turing", "C. Bill Gates", "D. Steve Jobs"],
        "answer" => "A"
    ],
    [
        "question" => "What is the smallest prime number?",
        "choices" => ["A. 0", "B. 1", "C. 2", "D. 3"],
        "answer" => "C"
    ],
    [
        "question" => "Which ocean is the largest by area?",
        "choices" => ["A. Atlantic", "B. Indian", "C. Southern", "D. Pacific"],
        "answer" => "D"
    ],
    [
        "question" => "Who painted the 'Mona Lisa'?",
        "choices" => ["A. Vincent van Gogh", "B. Pablo Picasso", "C. Leonardo da Vinci", "D. Michelangelo"],
        "answer" => "C"
    ],
    [
        "question" => "Which continent is known as the 'Dark Continent'?",
        "choices" => ["A. Asia", "B. South America", "C. Africa", "D. Europe"],
        "answer" => "C"
    ],
    [
        "question" => "Which language has the most native speakers worldwide?",
        "choices" => ["A. English", "B. Spanish", "C. Hindi", "D. Mandarin"],
        "answer" => "D"
    ],
    [
        "question" => "What is the hardest natural substance on Earth?",
        "choices" => ["A. Gold", "B. Iron", "C. Diamond", "D. Quartz"],
        "answer" => "C"
    ],
    [
        "question" => "Who was the first person to walk on the Moon?",
        "choices" => ["A. Buzz Aldrin", "B. Yuri Gagarin", "C. Neil Armstrong", "D. John Glenn"],
        "answer" => "C"
    ],
    [
        "question" => "What is the currency of Japan?",
        "choices" => ["A. Yuan", "B. Yen", "C. Won", "D. Dollar"],
        "answer" => "B"
    ]
];

$prizes = [100, 200, 300, 500, 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 250000, 500000, 1000000];

$scoreboard = [];

shuffle($questions);

do {

    echo "Enter your name: ";
    $playerName = trim(fgets(STDIN));

    $player = ["name" => $playerName, "score" => 0, "currentQuestion" => 0];

    while ($player["currentQuestion"] < count($questions)) {

        $currentPrize = $prizes[$player["currentQuestion"]];
        $question = $questions[$player["currentQuestion"]];

        echo $player["name"] . ", it's your turn! \n";
        echo "Question " . ($player["currentQuestion"] + 1) . " for $" . number_format($currentPrize) . ":\n";
        echo $question["question"] . "\n";

        foreach ($question["choices"] as $choice) {

            echo $choice . "\n";
        }

        $answer = strtoupper(trim(fgets(STDIN)));

        if ($answer == $question["answer"]) {

            echo "Correct! You've won $" . number_format($currentPrize) . "\n";
            $player["score"] = $currentPrize;
            $player["currentQuestion"]++;

            echo $player["name"] . " do you want to continue with the next question? (yes/no) \n";
            $continue = strtolower(trim(fgets(STDIN)));
        } else {

            echo "Incorrect! The correct answer was: " . $question["answer"] . "\n";
            echo "You've won $" . $player["score"] . "\n";
            break;
        }


        if ($continue != "yes") {

            echo $player["name"] . " has decided to walk away with $" . number_format($player["score"]) . "\n";
            break;
        }
    }

    $scoreboard[] = $player;

    echo "Do you want another player to play? (yes/no)\n";
    $newGame = strtolower(trim(fgets(STDIN)));
} while ($newGame == "yes");


echo "\n Final Scoreboad: \n";
usort($scoreboard, function ($a, $b) {

    return $b["score"] - $a["score"];
});

foreach ($scoreboard as $playerEntry) {

    echo $playerEntry["name"] . ": $" . number_format($playerEntry["score"]) . "\n";
}

echo "Thanks for playing! \n";
