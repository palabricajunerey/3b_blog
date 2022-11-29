<?php
$pwede = true;
include 'header.php';

if(isset($_SESSION['logged_in'])){
    header("location: blog.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //query
    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    //bind
    $check->execute([$email]);

    foreach($check as $Value){
        if($Value['email'] == $email && password_verify($password, $Value['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $Value['user_id'];

            header("location: blog.php");
        }else{
            $warning_msg = "Email or Password do not match!";
        }
    }
}

?>
<!-- content start -->
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-6 shadow p-4">
            <form method="POST" action="login.php">
                <?php 
                if (isset($warning_msg)) {
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>' . $warning_msg . '</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                    ';
                }
                ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password">
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- content end -->
<script>
        document.title = "Login";
    </script>
</body>

</html>