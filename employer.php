<!Doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employer</title>

    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">

    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Bootstrap CSS / Color Scheme -->
    <link rel="stylesheet" href="css/default.css" id="theme-color">
</head>
<body>

<!--navigation-->
<section class="smart-scroll">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand heading-black" href="index.html">
                Skill match
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link page-scroll d-flex flex-row align-items-center text-primary" href="#">
                            Become a Partner
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<section class="pt-6 pb-7" style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #121212; color: #e0e0e0;">
       
    
    <form action="Auth/employerlogin.php" method="POST" style="
        background-color: #1e1e1e; 
        border: 1px solid #333; 
        border-radius: 8px; 
        padding: 2rem; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
        width: 100%; 
        max-width: 400px; 
        box-sizing: border-box;
        display: flex; 
        flex-direction: column;
        gap: 1rem;
    ">
                    <?php
                          if (isset($_GET['error'])) {
                                echo "<p style='color:red'><strong>" . $_GET['error'] . "</strong></p>";
                            }
                            ?>
        <div style="
            display: flex; 
            flex-direction: column;
            gap: 0.5rem;
        ">
            <label for="username" style="
                font-weight: bold;
                color: #e0e0e0;
            ">Username</label>
            <input type="text" id="username" name="username" required style="
                padding: 0.75rem; 
                border: 1px solid #333; 
                border-radius: 4px; 
                font-size: 1rem; 
                color: #e0e0e0;
                background-color: #333;
                box-sizing: border-box;
            ">
        </div>

        <div style="
            display: flex; 
            flex-direction: column;
            gap: 0.5rem;
        ">
            <label for="password" style="
                font-weight: bold;
                color: #e0e0e0;
            ">Password</label>
            <input type="password" id="password" name="password" required style="
                padding: 0.75rem; 
                border: 1px solid #333; 
                border-radius: 4px; 
                font-size: 1rem; 
                color: #e0e0e0;
                background-color: #333;
                box-sizing: border-box;
            ">
        </div>

        <button type="submit" style="
            background-color: #009688; 
            color: #ffffff; 
            border: none; 
            padding: 0.75rem; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 1rem; 
            transition: background-color 0.3s ease;
        ">Login</button>

        <a href="#" style="
            color: #80cbc4; 
            text-align: center; 
            text-decoration: none; 
            font-size: 0.875rem;
        ">Forgot Password?</a>

        <div style="
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        ">
            <p style="
                color: #e0e0e0;
                font-size: 0.875rem;
                margin: 0;
            ">Don't have an account? <a href="regemployer.php" style="
                color: #80cbc4;
                text-decoration: none;
            ">Sign Up</a></p>
        </div>
        
    </form>
</section>
<footer class="py-6">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mr-auto">
                <h5>About SkillMatch AI</h5>
                <p class="text-muted">SkillMatch AI is dedicated to bridging the gap between job seekers and employers through innovative AI solutions, making the hiring process smarter and more efficient.</p>
                <ul class="list-inline social social-sm">
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Refund policy</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Partner</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Refer a friend</a></li>
                    <li><a href="#">Affiliates</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Help</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Log in</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-muted text-center small-xl">
                &copy; 2024 SkillMatch - All Rights Reserved
            </div>
        </div>
    </div>
</footer>

<!--scroll to top-->
<div class="scroll-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
