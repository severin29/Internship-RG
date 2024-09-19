# Symfony Blog Application

This is a Symfony-based blog application that allows users to create posts, comment on posts, and rate posts. The application includes three types of users: **Admins**, **Authors**, and **Regular Users**. It also features an average rating system for posts based on user comments.

There is also token-based reset-password functionality using Symfony's password reset bundle. 

## Features

- **User Roles**:
    - **Admin**: Can manage all posts, comments, and users.
    - **Author**: Can create, edit, and manage their own posts and comments on those posts.
    - **Regular User**: Can write comments and rate posts.

- **Posts**:
    - Create, view, edit, and delete posts (by authors and admins).
    - Each post displays an average rating based on user comments.

- **Comments**:
    - Users can comment on posts.
    - Comments include a rating (1-5), which is used to calculate the average rating of the post.

## Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/yourusername/symfony-blog-app.git
   cd symfony-blog-app
2. **Install dependencies**:
    Ensure you have composer installed, then run:
    ```bash
   composer install
   
3. **Create the tables**:
   Ensure you have configured your .env file with your database connection details, then run:
    ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   
4. **Run the development server**:
    ```bash
   symfony serve

## Usage

### User roles and capabilities:

- **Admins**:
  - **Edit and detele posts and comments**
  - **Promote or demote users' roles**
- **Authors**:
  - **Can Create, edit, and delete their own posts**
  - **Manage comments on their own posts**
- **Regular users**:
  - **Comment on any post**
  - **Rate posts with a rating between 1 and 5**


