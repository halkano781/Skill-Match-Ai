<?php
session_start();
include '../dbconn.php';

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../jobseeker.php");
    exit();
}

$username = $_SESSION['username'];

// Retrieve the role and correct answers from the database
$query = "SELECT role FROM profiles WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $role = $row['role'];

    // Define correct answers based on the role
    $correctAnswers = [];
    if ($role == 'junior software dev') {
        $correctAnswers = [
            1 => 'A',
            2 => 'A',
            3 => 'A',
            4 => 'A',
            5 => 'A'
        ];
    } elseif ($role == 'designer') {
        $correctAnswers = [
            1 => 'B',
            2 => 'B',
            3 => 'D',
            4 => 'A',
            5 => 'A'
        ];
    } else {
        die("No questions available for this role.");
    }

    // Map indices to letters
    $indexToLetter = ['A', 'B', 'C', 'D'];

    $totalQuestions = count($correctAnswers);
    $correctCount = 0;

    // Check user answers
    foreach ($correctAnswers as $index => $correctAnswer) {
        $userAnswerIndex = isset($_POST["answer_$index"]) ? intval($_POST["answer_$index"]) : -1;
        $userAnswer = isset($indexToLetter[$userAnswerIndex]) ? $indexToLetter[$userAnswerIndex] : '';

        // Debug output
        echo "Question $index: User Answer = '$userAnswer', Correct Answer = '$correctAnswer'<br>";

        // Increment correctCount if the user's answer matches the correct answer
        if (strtoupper($userAnswer) === strtoupper($correctAnswer)) {
            $correctCount++;
        }
    }

    // Calculate the score as a percentage
    $score = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;

    // Debug output
     "Total Questions: $totalQuestions<br>";
     "Correct Answers Count: $correctCount<br>";
     "Calculated Score: $score%<br>";

    // Save the score to the database
    $query = "INSERT INTO skill_scores (username, score) VALUES (?, ?) ON DUPLICATE KEY UPDATE score = VALUES(score)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sd', $username, $score);
    $stmt->execute();

    // Redirect or show a success message
    echo "<script>window.location.href='../jobdash/skill.php?success=Skill Verified'</script>";
} else {
    die("User not found.");
}
?>
