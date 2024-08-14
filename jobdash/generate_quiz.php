<?php
session_start();
include '../dbconn.php';

// Fetch user's role and skills from the database
$job_seeker_id = $_SESSION['job_seeker_id'];
$query = "SELECT role, skills FROM profiles WHERE job_seeker_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $job_seeker_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// AI logic to generate questions based on role and skills
$role = $user['role'];
$skills = explode(',', $user['skills']); // Assuming skills are comma-separated

$questions = [];

// Example: Static question generation (replace with AI logic as needed)
foreach ($skills as $skill) {
    $questions[] = "What is your proficiency level in $skill?";
}

// Store questions in session to display on the skill page
$_SESSION['questions'] = $questions;

// Redirect to skill verification page
header("Location: ../jobdash/skill_verify.php");
exit();
?>
