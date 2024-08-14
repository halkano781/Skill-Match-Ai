# Skill Match AI

Skill Match AI is a web application designed to connect job seekers with employers by matching the job seeker's skills and qualifications with employer requirements using AI. The application uses AI to give a percentage match, helping employers find the best candidates for their roles and assisting job seekers in finding suitable job opportunities.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)

## Features

- **Profile Creation:** Job seekers can create profiles including their roles, skills, and achievements.
- **AI Matching:** Uses AI to match job seekers' profiles with employer requirements, giving a percentage match.
- **Interview Requests:** Job seekers can request interviews with companies they qualify for.
- **Skill Evaluation:** Generates tailored questions based on the user's skills and provides a skill score.
- **Job Matching:** Displays a list of companies the job seeker qualifies for based on their skill score.
- **Employer Dashboard:** Employers can define roles, set requirements, and view qualified job seekers.

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/skill-match-ai.git
    cd skill-match-ai
    ```

2. **Install Dependencies**
    - php

3. **Setup Database**
    - Create a MySQL database and import the provided `schema.sql` file.
    - Update the database configuration in `dbconn.php`.

4. **Run the Application**
    - Run on localhost
    

## Usage

1. **Register/Login** as a job seeker or employer.
2. **Create a Profile:** For job seekers, fill out your role, skills, and achievements.
3. **AI Matching:** The AI will match your profile with available job opportunities and give you a skill score.
4. **Request Interviews:** If your skill score is above the required threshold, you can request an interview with the company.
5. **Employer Dashboard:** Employers can view matching candidates, set interviews, and manage job listings.

