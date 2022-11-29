<?php
$pwede = true;
include 'header.php';

if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

//if signup button is clicked
if (isset($_POST['register'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);
   
    if($check->rowCount() != 0){
        $warning_msg = "Email already in USE!";
    }elseif($pass1 != $pass2) {
        $warning_msg = "Password do not match!";
    } else {
        $hash_password = password_hash($pass1, PASSWORD_DEFAULT);
        //query
        $reg = $conn->prepare("INSERT INTO users(firstName, lastName, email, password) VALUES(?, ?, ?, ?)");
        //bind
        $reg->execute([
            $fname,
            $lname,
            $email,
            $hash_password
        ]);

        $msg = "User has been created!";
    }
}

?>
<!-- content start -->
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-6 mb-4 shadow p-4">
            <form method="POST" action="signup.php">
                <div class="mb-3 mt-4">
                    <?php
                    if (isset($warning_msg)) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>' . $warning_msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                        ';
                    }elseif(isset($msg)){
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
                        ';
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" id="firstname" name="first_name" class="form-control" placeholder="Enter your Firstname" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" id="lastname" name="last_name" class="form-control" placeholder="Enter your Lastname" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="pass" class="form-control" placeholder="Enter your Password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirm_password" name="pass2" class="form-control" placeholder="Enter your Password" required>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="register">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- content end -->
<script>
    document.title = "Signup";
</script>
</body>

</html>