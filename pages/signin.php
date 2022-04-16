<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page one</title>
    <link rel="stylesheet" href="../css/signin.css">
</head>

<body>
    <!-- php script start -->
    <?php

    $email_err = $pass_err = $login_Err = "";
    $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_REQUEST["email"])) {
            $email_err = " <p style='color:red'> * Email Can Not Be Empty</p> ";
        } else {
            $email = $_REQUEST["email"];
        }

        if (empty($_REQUEST["password"])) {
            $pass_err = " <p style='color:red'> * Password Can Not Be Empty</p> ";
        } else {
            $pass = $_REQUEST["password"];
        }


        if (!empty($email) && !empty($pass)) {

            // database connection
            require_once("../connection.php");

            $sql_query = "SELECT * FROM `admin` WHERE `email` ='$email' && `password` = '$pass'  ";
            $result = mysqli_query($conn, $sql_query);

            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    session_start();
                    session_unset();
                    $_SESSION["email"] = $rows["email"];
                    if ($email == 'admin1@admin.com' && $pass == 1234)
                        header("Location: adminpage.php");
                    else if ($email == 'admin2@admin.com' && $pass == 123)
                        header("Location: admin2.php");
                }
            }
        }
    }
    ?>

    <!-- php script end -->

    <div class="container">
        <!--الصورة-->
        <div>
            <img src="../img/Screenshot 2022-04-05 031140.png">
        </div>
        <!--العنوان-->
        <div class="title">
            <h1>تسجيل الدخول</h1>
        </div>
        <div class="form">
            <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?> ">
                <div>
                    <input type="email" placeholder="Email" class="email" value="<?php echo $email; ?>" name="email">
                    <?php echo $email_err; ?>
                </div>
                <div>
                    <input type="password" placeholder="Password" class="password" name="password">
                    <?php echo $pass_err; ?>
                </div>


                <button type="submit" class="signin-btn main-btn" name="signin">
                    <h3>التالي</h3>
                </button>
                <p>Not a admin? <a href="../pages/CreatAccount.php">Log-In </a>as Employee now</p>
            </form>
        </div>
    </div>
    <script>
        //variable
        const SigninBtn = document.querySelector(".signin-btn");
        const email = document.querySelector('.email');
        const password = document.querySelector('.password');
        //event
        SigninBtn.addEventListener("click", myFunction);

        function myFunction() {
            if (email.value && password.value == 'admin') {
                alert("welcm admin");
                window.location.href = 'http://127.0.0.1:5500/pages/adminpage.html';

            } else {
                alert("email and password is incorud");
            }
        }
    </script>
</body>

</html>