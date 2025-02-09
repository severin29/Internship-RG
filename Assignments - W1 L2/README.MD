# Who Wants to Be a Millionaire - PHP CLI Version

This project is a console-based implementation of the popular game show "Who Wants to Be a Millionaire?" built in PHP. The game supports multiple players within a single session, and a scoreboard tracks the highest earners.

## Features

- **Multiple Players:** Players can take turns answering questions, with their names and scores tracked separately.
- **Randomized Questions and Choices:** The order of questions are randomized for each game session to ensure a unique experience each time.
- **Scoreboard:** A scoreboard is displayed at the end of the session, showing the highest earners for that session.

## Getting Started

### Prerequisites

- **PHP:** Make sure you have PHP installed on your machine. You can download it from the [official PHP website](https://www.php.net/downloads).

### Running the Game

1. **Clone the repository:**
   ```bash
   gh repo clone severin29/Internship-RG

2. **Run the game:**

  ```bash
  php wwtbam.php
  ```

3. **Gameplay Instructions:**

- The game will prompt you to enter a player name. <br>
- You will be presented with a series of multiple-choice questions. Type the letter corresponding to your chosen answer and press Enter. <br>
- After each question, you can decide whether to continue or walk away with your current winnings. <br>
- If you answer incorrectly, the game will end for that player, and their score will be added to the scoreboard. <br>
- After all players have finished, a final scoreboard will be displayed.

4. **Code Structure:**

- WWTBAM.php: The main script that runs the game. <br>
- README.md: This file, providing an overview of the project. <br>
- Question Bank: The questions are stored within the script in an array format. You can modify or expand the questions as needed.

5. **Customization:**

- Adding Questions: You can add more questions by editing the $questions array in millionaire.php. <br>
- Changing Prizes: Modify the $prizes array in the script to change the prize amounts for each question. <br>
- Adjusting Difficulty: Add or remove questions based on the desired difficulty level.
