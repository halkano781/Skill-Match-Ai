<?php
session_start();
include '../dbconn.php';

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['job_seeker_id'])) {
    header("Location: ../jobseeker.php");
    exit();
}

// Initialize variables
$questions = [];
$choices = [];
$username = $_SESSION['username'];

// Check if the "Verify Your Skills" button was clicked
if (isset($_POST['verify_skills'])) {
    // Get the user's role from the database
    $query = "SELECT role, skills FROM profiles WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $role = $row['role'];

        // Define static questions and choices based on the role
        if ($role == 'junior software dev') {
            $questions = [
                "Can you explain the difference between `margin` and `padding` in CSS?",
                "How would you connect to a MySQL database in PHP?",
                "What are some key differences between responsive design and adaptive design?",
                "Describe the process of making an API request using cURL in PHP.",
                "How do you prioritize tasks when managing a small web development project?"
            ];

            $choices = [
                [
                    "A. Margin adds space outside an element's border; padding adds space inside the border.",
                    "B. Margin adds space inside an element's content; padding adds space outside the content.",
                    "C. Margin adds space inside an element's border; padding adds space inside the content.",
                    "D. Margin adds space outside an element's content; padding adds space outside the border."
                ],
                [
                    "A. Use `mysqli_connect()` function.",
                    "B. Use `mysql_query()` function.",
                    "C. Use `mysql_fetch_assoc()` function.",
                    "D. Use `mysql_pconnect()` function."
                ],
                [
                    "A. Responsive design uses a single layout; adaptive design uses multiple layouts.",
                    "B. Responsive design adapts to the screen size; adaptive design uses predefined screen sizes.",
                    "C. Responsive design is only for mobile devices; adaptive design is for desktop devices.",
                    "D. Responsive design does not require media queries; adaptive design requires them."
                ],
                [
                    "A. Using `curl_init()`, `curl_setopt()`, and `curl_exec()` functions.",
                    "B. Using `file_get_contents()`.",
                    "C. Using `http_get()` function.",
                    "D. Using `fsockopen()` function."
                ],
                [
                    "A. By using a priority matrix and tracking tasks in a spreadsheet.",
                    "B. By doing the most difficult tasks first and using a task management tool.",
                    "C. By delegating all tasks and using a paper checklist.",
                    "D. By focusing only on client requests and using sticky notes."
                ]
            ];
        } elseif ($role == 'designer') {
            $questions = [
                "How do you use the Pen Tool in Adobe Illustrator?",
                "What are layers in Photoshop?",
                "Explain the importance of color theory in design.",
                "How do you select fonts for a design project?",
                "What principles do you follow to ensure a positive user experience in your designs?"
            ];

            $choices = [
                [
                    "A. Click and drag to create straight lines.",
                    "B. Click to create anchor points and drag to create curves.",
                    "C. Use it only for adding text.",
                    "D. It is used to add filters."
                ],
                [
                    "A. Layers are used to apply effects.",
                    "B. Layers organize different elements of a design.",
                    "C. Layers are only for text.",
                    "D. Layers are not used in professional design."
                ],
                [
                    "A. It helps in creating visual harmony.",
                    "B. It ensures brand consistency.",
                    "C. It affects the user interface.",
                    "D. All of the above."
                ],
                [
                    "A. Based on project theme and readability.",
                    "B. Based on font popularity.",
                    "C. Based on client request.",
                    "D. By using the first font I find."
                ],
                [
                    "A. Usability, accessibility, and feedback.",
                    "B. Only aesthetics.",
                    "C. Animation and effects.",
                    "D. None of the above."
                ]
            ];
        } else {
            $questions = ["No questions available for this role."];
            $choices = [[]];
        }
    } else {
        $questions = ["Role not found."];
        $choices = [[]];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>JobMatch</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Jobmatch</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="../jobdash/dash.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../jobdash/interviews.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Interviews</span>
				</a>
			</li>
			<li>
				<a href="../jobdash/profile.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="../jobdash/message.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="../jobdash/skill.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Skill</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../Auth/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link"></a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
					<a href="#" class="profile" id="profile">
			            <div class="profile-placeholder" id="profile-placeholder"></div>
					</a>

		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Skill</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Skill</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../jobdash/dash.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="skill-container">
			    <p class="centered-text">Skill matcher works only if we verify what you say your skills are.</p>
			    
			    <?php if (empty($questions)): ?>
			        <!-- Display the button if no questions are loaded yet -->
			        <div class="centered-text">
					<?php
                    if (isset($_GET['success'])) {
                        echo "<p style='color:green'><strong>" . $_GET['success'] . "</strong></p>";
					}
                    ?>
			            <form action="" method="POST">
			                <button type="submit" name="verify_skills" class="btn btn-primary">Verify Your Skills</button>
			            </form>
			        </div>
			    <?php else: ?>
			                    <!-- Display the questions if they are loaded -->
								<form action="../jobdash/process_answer.php" method="POST">
    <?php foreach ($questions as $index => $question): ?>
        <div class="question">
            <p><strong>Question <?php echo $index + 1; ?>:</strong> <?php echo htmlspecialchars($question); ?></p>
            <?php foreach ($choices[$index] as $choiceIndex => $choice): ?>
                <div class="choice">
                    <input type="radio" id="q<?php echo $index + 1; ?>_c<?php echo $choiceIndex; ?>" name="answer_<?php echo $index + 1; ?>" value="<?php echo $choiceIndex; ?>" required>
                    <label for="q<?php echo $index + 1; ?>_c<?php echo $choiceIndex; ?>"><?php echo htmlspecialchars($choice); ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <div class="centered-text">
        <button type="submit" class="btn btn-primary">Submit Answers</button>
    </div>
</form>

        <?php endif; ?>
    </div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profile = document.getElementById('profile-placeholder');
        const userName = "<?php echo addslashes($username); ?>"; // This is set by PHP above

        // Generate a random color
        function getRandomColor() {
            const letters = '0123456789ABCDEF';
            let color = '#';
            for (let i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Get the first letter of the user's name
        const firstLetter = userName.charAt(0).toUpperCase();

        // Set the profile placeholder style
        profile.style.backgroundColor = getRandomColor();
        profile.textContent = firstLetter;
    });
</script>
</body>
</html>

                 