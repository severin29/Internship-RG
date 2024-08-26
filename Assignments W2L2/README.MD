# School Management Console Application

This is a simple School Management Console application developed in PHP. The application allows different types of users (Admin, Teacher, and Student) to perform various tasks. The application runs in the console (CLI) and does not use a database or frontend.

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Notes](#notes)

## Features

### Admin
- Add and remove teachers.
- Add and remove students.
- Add and remove subjects.
- List all current teachers, students, and subjects.

### Teacher
- Grade students on specific subjects.
- View a list of students and their subjects.

### Student
- View grades for subjects they are enrolled in.

## Requirements

- PHP 7.4 or higher
- Composer (for autoloading and managing dependencies)
- PHPUnit (for running unit tests)

## Installation

1. Clone the repository or download the project files.
    ```bash
    gh repo clone severin29/Internship-RG
    cd school-management-console-app
    ```

2. Install Composer dependencies.
    ```bash
    composer install
    ```

3. Update the autoloader.
    ```bash
    composer dump-autoload
    ```

4. Make sure all class files are in the root directory or appropriately located as per the `autoload` configuration in `composer.json`.

## Usage

1. Run the application using PHP from the command line.
    ```bash
    php index.php
    ```

2. Follow the on-screen instructions to log in as an admin, teacher, or student. 

3. Depending on the role, different options will be available:
    - **Admin**: Manage teachers, students, and subjects.
    - **Teacher**: Grade students and view student lists.
    - **Student**: View own grades.

## Testing

1. Make sure PHPUnit is installed. If not, install it using Composer:
    ```bash
    composer require --dev phpunit/phpunit
    ```

2. Run the tests using PHPUnit.
    ```bash
    ./vendor/bin/phpunit tests
    ```

3. Example unit tests can be found in the `tests/` directory. The tests are designed to ensure the core functionalities of the `Admin`, `Teacher`, and `Student` classes.

## Notes

- **Login Attempts**: Users are allowed three login attempts before the application exits. This is handled in the `index.php` file.
  
- **Password Strength**: Admins can enforce stronger passwords using a regex pattern to ensure a minimum of 8 characters, including uppercase, lowercase, numbers, and special characters.

- **Data Storage**: This is a simple CLI application, and it doesn't use a database. Data such as users, subjects, and grades are stored in memory (PHP arrays).

- **Dependencies**: Make sure all required classes (`Admin.php`, `Teacher.php`, `Student.php`, `User.php`) are correctly included in the main `index.php` file.


## Author

- Severin Kolakov
- kolakovseverin@gmail.com  

