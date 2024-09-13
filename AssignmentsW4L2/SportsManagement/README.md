# Soccer Management CRUD App

This is a simple CRUD (Create, Read, Update, Delete) web application built with vanilla PHP and styled with Tailwind CSS. The application allows you to manage soccer players, teams, and matches. The data is stored in a MySQL database.

## Features

- **Players Management**: Add, edit, delete, and view soccer players. Each player is assigned to a team.
- **Teams Management**: Create, update, delete, and view teams.
- **Matches Management**: Schedule, update, and delete soccer matches. Matches store references to two teams using foreign keys.
- **Tailwind CSS Styling**: The app's UI is styled using Tailwind CSS for a clean and responsive design.

## Database Structure

### 1. `teams` Table
| Column   | Type    | Description           |
|----------|---------|-----------------------|
| id       | INT     | Primary key           |
| teamName | VARCHAR | Name of the team      |
| city     | VARCHAR | City of the team      |

### 2. `players` Table
| Column    | Type    | Description                      |
|-----------|---------|----------------------------------|
| id        | INT     | Primary key                      |
| name      | VARCHAR | Name of the player               |
| position  | VARCHAR | Player's position (e.g., forward, defense) |
| team_id   | INT     | Foreign key to `teams` table     |

### 3. `matches` Table
| Column     | Type    | Description                          |
|------------|---------|--------------------------------------|
| id         | INT     | Primary key                          |
| team1ID    | INT     | Foreign key to `teams` (Team 1)      |
| team2ID    | INT     | Foreign key to `teams` (Team 2)      |
| team1goals | INT     | Goals scored by Team 1               |
| team2goals | INT     | Goals scored by Team 2               |
| matchDate  | DATE    | Date of the match                    |

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL Database
- Web Server (Apache, Nginx, etc.)
- Composer (optional, for package management if needed)
- Tailwind CSS (already included via CDN or compiled)

### Step-by-Step Guide

1. **Clone the repository**:
   ```bash
   git clone https://github.com/your-repo/soccer-crud-app.git

2. **Create MySQL database**:
    ```sql
   CREATE DATABASE soccer_management;

3. **Import the SQL Schema**: Import the provided SQL file to set up the necessary tables:
    ```bash
   mysql -u your_username -p soccer_management < soccer_management.sql
4. **Configure database connection**: Open the config.php file and update the MySQL connection details:
    ```php
   <?php
    $conn = mysqli_connect("localhost", "your_username", "your_password", "soccer_management");

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    ?>
   
5. **Run the application**: Deploy the application on a web server such as Apache or run locally using PHP's built-in server:
    ```bash
   php -S localhost:8000
6. **Access the app**: Open your web browser and navigate to http://localhost:8000 to start using the app.

## Tailwind CSS ##
The application UI is styled using Tailwind CSS. You can find the styles in the <head> of each PHP file or link to a compiled version of Tailwind CSS via CDN.
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   
   
