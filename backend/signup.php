<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // check fields validity
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Does the email already exist in our db?
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - already exists!";
            } else {
                // Check if a file was uploaded
                if (isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name']; // Getting the user image
                    $img_type = $_FILES['image']['type']; // Getting the image type
                    $tmp_name = $_FILES['image']['tmp_name']; // tmp is used to save/move the image in our folder

                    // explode the image file to get the extension
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ["png", "jpeg", "jpg"];
                    if (in_array($img_ext, $extensions) === true) {
                        $time = time();
                        
                        $new_img_name = $time.$img_name;
                        
                        if (move_uploaded_file($tmp_name, "profiles/".$new_img_name)) {
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);
                      
                            $sqli2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if ($sqli2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                } else {
                                    echo "This email address does not exist";
                                }
                                
                            } else {
                                echo "Something went wrong while trying to insert data".mysqli_error($sql3);
                            }

                        } else {
                            echo "Something wrong with moving a pic to profiles dir ".exec('whoami');
                        }

                    } else {
                        echo "Please select an image; jpeg, jpg or png.";
                    }

                } else {
                    echo "Please select an image file!";
                }
            }
        } else {
            echo "$email - Not a valid email address!";
        }
    } else {
        echo " All inputs are required...";
    }
?>