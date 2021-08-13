<?php
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                    include_once "backend/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="backend/profiles/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span style="color: #224e81;"><?php echo $row['fname'] . " " .$row['lname']; ?></span>
                    <p class="small" style="color: #224e81;"><?php echo $row['status']; ?></p>
                </div>
            </header>
            <div class="chat-box">
               
            </div>
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incomig_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Say something...">
                <button><span class="fab fa-telegram-plane"></span></button>
            </form>
        </section>
    </div>
    <script src="static/js/chat.js"></script>
</body>

</html>