# **Online Quiz System**

## Overview

The Laravel Quiz System is a comprehensive and scalable platform designed to facilitate the creation, management, and completion of quizzes. Built on the Laravel framework, it provides a robust foundation for developing secure, efficient, and user-friendly quiz applications.

## Features

User Authentication :-

-   Registration: Allows users to create accounts securely.
-   Login: Provides a secure login mechanism for authenticated access.
-   Logout: Enables users to safely log out of their accounts.

Quiz Management :-

-   Create Quiz: Admins can easily create new quizzes by specifying details such as name, description, and question set.
-   Update Quiz: Admins have the flexibility to modify quiz details, ensuring relevance and accuracy.
-   Delete Quiz: Allows the removal of quizzes when they are no longer needed.
-   View Quiz: Provides a detailed view of quiz information, including questions and options.

Question Management :-

-   Create Question: Admins can add questions to quizzes, including details like question text and answer options.
-   Update Question: Allows modification of existing questions to ensure accuracy.
-   Delete Question: Provides the ability to remove questions from a quiz.

User Quiz Interaction :-

-   Quiz Selection: After login, users can choose a quiz from the available options.
-   Question Answering: Users can navigate through quiz questions, select answers, and submit their responses.
-   Result Presentation: Upon quiz completion, users receive detailed results, including total questions, correct answers, wrong answers, and a percentage score.

Dashboard :-

-   Admin Dashboard: Features statistics such as the total number of quizzes, average quiz scores, and a chart displaying performance trends.
-   User Dashboard: Displays a summary of completed quizzes, total scores, and performance trends.

## Requirements

-   PHP: Version 8.1 or higher
-   Composer: For PHP package management
-   MySQL: As the preferred database system

## Installation

Step 1: Clone the Repository

Clone the repository to your local machine using Git.

```bash
$ git clone https://github.com/yourusername/task-management-system.git
```

Step 2: Navigate to the Project Directory

Change your current directory to the project directory.

```bash
$ cd online-quiz-system
```

Step 3: Install Composer Dependencies

Install the PHP dependencies using Composer.

```bash
$ composer update
```

Step 4: Copy the Environment File

Copy the .env.example file to .env.

```bash
$ cp .env.example .env
```

Step 5: Generate Application Key

Generate an application key.

```bash
$ php artisan key:generate
```

Step 6: Configure Database Connection

Configure your database connection in the .env file.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

Step 7: Run Migrations and Seeders

Run database migrations and seeders to create database tables and populate them with initial data.

```bash
$ php artisan migrate --seed
```

Step 8: Start the Development Server

Start the development server to run the application.

```bash
$ php artisan serve
```

Step 9: Access the Application

Open your web browser and visit http://localhost:8000 to access the application.
