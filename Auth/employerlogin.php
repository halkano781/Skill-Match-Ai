<?php
// Include the database connection
require '../dbconn.php';

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Initialize variables for error handling
$loginError = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign POST data to variables
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);

    // Prepare and execute query to check user credentials
    $checkAuthQuery = "SELECT id, password_hash FROM employer_auth WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($checkAuthQuery);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Start the session and store user information
            session_start();
            $_SESSION['employerr_id'] = $id;
            $_SESSION['username'] = $username;

            // Redirect to the employer dashboard
            header("Location: ../employerdash/dash.php");
            exit();
        } else {
            echo "<script>window.location.href='../employer.php?error=Invalid username or password.'</script>";
        }
    } else {
        $loginError = "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
