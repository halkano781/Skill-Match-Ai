<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../jobseeker.php");
    exit();
}

// Include database connection file
require_once '../dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username from the session
    $username = $_SESSION['username'];

    // Retrieve form data
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);

    // Handle CV upload
    $cv = $_FILES['cv']['name'];
    $cvTmpName = $_FILES['cv']['tmp_name'];
    $cvSize = $_FILES['cv']['size'];
    $cvError = $_FILES['cv']['error'];
    $cvType = $_FILES['cv']['type'];

    // Get file extension
    $cvExt = explode('.', $cv);
    $cvActualExt = strtolower(end($cvExt));

    // Allowed file types
    $allowed = array('pdf', 'doc', 'docx');

    if (in_array($cvActualExt, $allowed)) {
        if ($cvError === 0) {
            if ($cvSize < 5000000) { // Limit to 5MB
                $cvNewName = "cv_" . $username . "." . $cvActualExt;
                $cvDestination = '../uploads/cvs/' . $cvNewName;
                move_uploaded_file($cvTmpName, $cvDestination);
            } else {
                echo "<script>window.location.href='../jobdash/profile.php?big=Your file is too big!'</script>";
                exit();
            }
        } else {
            echo "<script>window.location.href='../jobdash/profile.php?error=There was an error uploading your file!'</script>";
            exit();
        }
    } else {
        echo "<script>window.location.href='../jobdash/profile.php?wrong=You cannot upload files of this type!'</script>";
        exit();
    }

    // Check if the user already has a profile in the database
    $checkProfileQuery = "SELECT * FROM profiles WHERE username = '$username'";
    $result = mysqli_query($conn, $checkProfileQuery);

    if (mysqli_num_rows($result) > 0) {
        // Update existing profile
        $updateProfileQuery = "UPDATE profiles SET role = '$role', skills = '$skills', cv = '$cvNewName' WHERE username = '$username'";
        if (mysqli_query($conn, $updateProfileQuery)) {
            echo "<script>window.location.href='../jobdash/profile.php?update=Profile updated successfully! now verify you skills'</script>";
        } else {
            echo "Error updating profile: " . mysqli_error($conn);
            echo "<script>window.location.href='../jobdash/profile.php?updatefail=Error updating profile!'</script>";
        }
    } else {
        // Insert new profile
        $insertProfileQuery = "INSERT INTO profiles (username, role, skills, cv) VALUES ('$username', '$role', '$skills', '$cvNewName')";
        if (mysqli_query($conn, $insertProfileQuery)) {
            echo "<script>window.location.href='../jobdash/profile.php?sucess=Profile created successfully! now verify you skills'</script>";
        } else {
            echo "Error creating profile: " . mysqli_error($conn);
            echo "<script>window.location.href='../jobdash/profile.php?error=Error creating profile!'</script>";
        }
    }
}

$conn->close();
?>
