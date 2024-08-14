<?php
session_start();
include '../dbconn.php';
// Check if the user is logged in, otherwise redirect to the login page
if (!isset($_SESSION['job_seeker_id'])) {
    header("Location: ../jobseeker.php");
    exit();
}

// Get the user's role from the database
$job_seeker_id = $_SESSION['job_seeker_id'];
$query = "SELECT role FROM profiles WHERE job_seeker_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $job_seeker_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $role = $row['role'];
} else {
    // If no role is found, redirect back to skill verification page
    header("Location: ../jobdash/profile.php");
    exit();
}

// Define static questions based on the role
$questions = [];

if ($role == 'Junior Web Developer') {
    $questions = [
        "Can you explain the difference between `margin` and `padding` in CSS? Provide an example where each would be used.",
        "How would you connect to a MySQL database in PHP? Write a basic script that connects to a database and fetches data from a table.",
        "What are some key differences between responsive design and adaptive design? How would you implement a responsive design in a web project?",
        "Describe the process of making an API request using cURL in PHP. What are some common HTTP methods used in API calls?",
        "How do you prioritize tasks when managing a small web development project? What tools or methods do you use to track progress?"
    ];
} elseif ($role == 'Designer') {
    $questions = [
        "How do you use the Pen Tool in Adobe Illustrator to create a complex shape? Describe the process and any challenges you might encounter.",
        "What are layers in Photoshop, and how do they affect your design workflow? Provide an example of a project where you used multiple layers.",
        "Explain the importance of color theory in design. How do you choose a color scheme for a project?",
        "How do you select fonts for a design project? What factors do you consider when pairing fonts together?",
        "What principles do you follow to ensure a positive user experience in your designs? Can you describe a project where you focused on improving UX?"
    ];
} else {
    // Default case if no matching role is found
    $questions = ["No questions available for this role."];
}

?>