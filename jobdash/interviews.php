<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['job_seeker_id'])) {
    header("Location: ../jobseeker.php");
    exit();
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
					<h1>Interviews</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Interviews</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

					<div class="dashboard-container">
						<div class="box-info">
							<li>
								<i class="bi bi-person"></i>
								</span>
							</li>
						</div>
		            </div>



			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Interview status</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Company</th>
								<th>Date Applied</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="../img/safaricom.png">
									<p>Safaricom llc</p>
								</td>
								<td>04-10-2024</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="../img/microsoft.png">
									<p>Microsoft</p>
								</td>
								<td>05-13-2024</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../img/oracle.png">
									<p>Oracle</p>
								</td>
								<td>23-10-2024</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="../img/subway.png">
									<p>Subway</p>
								</td>
								<td>01-09-2024</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="../img/ilri.png">
									<p>Ilri</p>
								</td>
								<td>04-12-2024</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Upcoming</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	<script>
        document.addEventListener('DOMContentLoaded', function() {
            const profile = document.getElementById('profile-placeholder');
            const userName = username; // This is set by PHP above

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