<?php
// Include the database connection
require '../dbconn.php';

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables for error handling
$emailError = $usernameError = $passwordError = "";
$success = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign POST data to variables
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Check if the email or username already exists in the job_seeker_auth table
    $checkAuthQuery = "SELECT id FROM job_seeker_auth WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($checkAuthQuery);

    // Error handling for the prepared statement
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $stmt->store_result();

    // If email or username already exists, redirect with an error
    if ($stmt->num_rows > 0) {
        $stmt->close();
        echo "<script>window.location.href='../regjobseeker.php?error=username or email taken'</script>";
        exit();
    } else {
        $stmt->close();

        // Insert data into job_seeker_auth table
        $insertAuthQuery = "INSERT INTO job_seeker_auth (username, email, password_hash) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertAuthQuery);

        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>window.location.href='../regjobseeker.php?sucess=successful now you can login'</script>"; // Registration successful
        } else {
            echo "<script>window.location.href='../regjobseeker.php?error=failed to register user'</script>";
        }
    }
    $stmt->close();
}

$conn->close();
?>
