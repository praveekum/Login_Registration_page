<?php

 include 'config.php';

 error_reporting(0);

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password == $cpassword){
$sql = "INSERT INTO users (username,email,password)
VALUES ('$username','$email','$password')";
$result = mysqli_quer($conn,$sql);
if($result){
    echo "<script>alert('Registered Successfully.')</script>";
}
else{
    echo "<script>alert('Woops! Something wrong went.')</script>";
}
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>

<html>

<head>
    <title>My Website</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="fb.png">
                <img src="in.png">
                <img src="gp.png">
                <img src="tw.png">
            </div>
            <form id="login" class="input-group">             
                <input type="email" class="input-field" placeholder="Email" required>
                <input type="password" class="input-field" placeholder="Password" required>
                <input type="checkbox" class="chech-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Username" name="username" value="<?php echo $username ;?>" required>
                <input type="email" class="input-field" placeholder="Email" name="email" value="<?php echo $email ;?>" required>
                <input type="password" class="input-field" placeholder="Password" name="password" value="<?php echo $_POST['password'] ;?>" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword'] ;?>" required>
                <input type="checkbox" class="chech-box"><span>Iagree to the terms & conditions</span>
                <button type="submit" name="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("login")
        var y = document.getElementById("register")
        var z = document.getElementById("btn")
        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login() {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</body>

</html>