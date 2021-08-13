<?php include_once "header.php"; ?>

<body style="background-image: #4785ff;">
    <div class="wrapper">
        <section class="form login">
            <header>ChatAway!</header>
            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye" style="color: #4785ff;"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not account yet? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="static/js/password-show-hide.js"></script>
    <script src="static/js/login.js"></script>
</body>

</html>