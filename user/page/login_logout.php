<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/login_logout.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
</head>

<!-- <script>

    const login = () => {
        
    }
        
</script> -->

<body>
    <div id="container" class="container">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <form action="../PHP/registration.php" method = "POST">
                            <div class="input-group">
                                <i class='bx bxs-user'></i>
                                <input type="text" placeholder="Username" name = "userName">
                            </div>
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="email" placeholder="Email" name = "emailRegitration">
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Password" name = "password">
                            </div>
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Confirm password" name = "comfirmPassword">
                            </div>
                            <button type="submit" name = "register">Sign up</button>
                        </form>
                        <p>
                            <span>
								Already have an account?
							</span>
                            <b onclick="toggle()" class="pointer">
								Sign in here
							</b>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
            <div class="col align-items-center flex-col sign-in">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-in">
                        <form action="../PHP/login.php" method="post">
                            <div class="input-group">
                                <i class='bx bx-mail-send'></i>
                                <input type="email" placeholder="Email" name = "email">
                            </div> 
                            <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <input type="password" placeholder="Password" name = "password">
                            </div>
                            <button type="submit" name="login">Sign in</button>
                        </form>
                        <p>
                            <a style="text-decoration: none" href="forgot-pw.php">
								Forgot password?
							</a>
                        </p>
                        <p>
                            <span>
								Don't have an account?
							</span>
                            <b onclick="toggle()" class="pointer">
								Sign up here
							</b>
                        </p>
                    </div>
                </div>
                <div class="form-wrapper">

                </div>
            </div>
            <!-- END SIGN IN -->
            <!-- FORGOT PASSWORD -->
            
            <!-- END FORGOT PASSWORD -->
        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Welcome
                    </h2>

                </div>
                <div class="img sign-in">

                </div>
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">

                </div>
                <div class="text sign-up">
                    <h2>
                        Join with us
                    </h2>

                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </div>
    <script src="../../assets/js/app.js"></script>
</body>

</html>