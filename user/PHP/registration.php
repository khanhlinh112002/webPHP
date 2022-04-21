<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/user.php";
    $mainData = new dataProcessor();

    if(isset($_POST['register'])) {
        if(isset($_POST['emailRegitration']) && !empty($_POST['emailRegitration'])) {
            $email = $_POST['emailRegitration'];
            if(!$mainData->checkAvailableEmail($email)){
                echo "<script>alert('Email is exist, Plaese user another Email. Thank you.')</script>";    
                ?>
                    <script type = "text/javascript">
                        location.href = '../../user/page/login_logout.php?';
                    </script>
                <?php       
            } else {
                if(isset($_POST['password']) && !empty($_POST['password'])){
                    if(isset($_POST['comfirmPassword'])  && !empty($_POST['comfirmPassword'])){
                        $password = $_POST['password'];
                        $comfirmPassword = $_POST['comfirmPassword'];
                        if($mainData->checkConfirmPassword($password, $comfirmPassword)){
                            echo "<script>alert('success');</script>";
                            $mainData->insert("users", creator::createUser()->castToArray());
                            $mainData->processSendEmailRegister($email);
                            ?>
                                <script type = "text/javascript">
                                    location.href = '../../user/page/login_logout.php?';
                                </script>
                            <?php
                        } else{
                            echo "<script>alert('Please enter confirm password to match with password.')</script>";
                            ?>
                                <script type = "text/javascript">
                                    location.href = '../../user/page/login_logout.php?';
                                </script>
                            <?php
                        }
                    } else {
                        echo "<script>alert('Plaese enter comfirm password.')</script>";
                        ?>
                            <script type = "text/javascript">
                                location.href = '../../user/page/login_logout.php?';
                            </script>
                        <?php
                    }
                } else {
                    echo "<script>alert('Plaese enter password.')</script>";
                    ?>
                        <script type = "text/javascript">
                            location.href = '../../user/page/login_logout.php?';
                        </script>
                    <?php
                }
            }
            
        }else{
                echo "<script>alert('No email.')</script>";
        }
    }

?>