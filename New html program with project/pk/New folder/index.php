<?php

 include 'config.php';

 error_reporting(0);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword) {
        $sql = "SELECT * FORM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(!mysqli_num_rows($result > 0)) {
            $sql = "INSERT INTO user (username, email, password)
                    VALUES ('$username','$email','$password')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                echo "<script>alert('Registered Successfully.')</script>";
                $username = "";
                $email = "";
                $_POST['password']="";
                $_POST['cpassword']="";     
            } else {
                echo "<script>alert('Woops! Something wrong went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email already Exists.')</script>";
        }
            
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pk Club</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                    <h2>LOG IN</h2>
                    <form>
                        <input type="email" class="input-box" placeholder="Email" required>
                        <input type="password" class="input-box" placeholder="Password" required>
                        <button type="submit" class="submit-btn" name="submit" >Submit</button>
                        <input type="checkbox" class="chech-box"><span>Remember Password</span>
                    </form>
                    <button type="submit" class="btn" onclick="openRegister()">Don't have an account?</button>
                </div>
                <div class="card-back">
                    <h2>REGISTER</h2>
                    <form action="" method="POST" class="login-email">
                        <input type="text" class="input-box" placeholder="Username" name="username" value="<?php echo $username ;?>" required>
                        <input type="email" class="input-box" placeholder="Email" name="email"
                            value="<?php echo $email ;?>" required>
                        <input type="password" class="input-box" placeholder="Password" name="password"
                            value="<?php echo $_POST['password'] ;?>" required>
                            <input type="password" class="input-box" placeholder="Confirm Password" name="cpassword"
                            value="<?php echo $_POST['cpassword'] ;?>" required>
                        <button name="submit" type="submit" class="submit-btn">Submit</button>
                        <input type="checkbox" class="chech-box"><span>Remember Me</span>
                    </form>
                    <button type="submit" class="btn" onclick="openLogin()">I have an account </button>
                </div>
            </div>
        </div>

    </div>
    <script>
        var card = document.getElementById("card")
        function openRegister() {
            card.style.transform = "rotateY(-180deg)"
        }
        function openLogin() {
            card.style.transform = "rotateY(0deg)"
        }
    </script>
</body>

</html>