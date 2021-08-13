<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <?php
                    include_once "backend/config.php";
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src="backend/profiles/<?php echo $row['img'] ?>" alt="Profile">
                    <div class="details">
                        <span style="color: #224e81;"><?php echo $row['fname'] . " " .$row['lname']; ?></span>
                        <p class="small" style="color: #224e81;"><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="backend/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>

            <div class="search">
                <span class="text">Choose a user to talk to</span>
                <input type="text" placeholder="Enter the name to search..." />
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="static/js/users.js"></script>
</body>

</html>