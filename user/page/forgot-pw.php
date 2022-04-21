<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="../../assets/css/forgot-pw.css">

</head>
<body>
    <div class="forgot-pw">
        <div class="form-wrapper align-items-center">
            <div class="form forgot-pw">
                <h1>Forgot Password</h1>
            <p>Enter your registered email to reset your password.</p>
            <form action="../PHP/forgotPassword.php" method = "POST">
                <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="email" placeholder="Email" name = "email">
            </div>
            <br>
            <button name = "forgotPassword" type="submit">Send email</button>
            </form>
            <div class="fg-pw-footer">
                <a style="text-decoration: none" class="fg-pw-close" href="login_logout.php">[&#10006;] Cancer</a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>


