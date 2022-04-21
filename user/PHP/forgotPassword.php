<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    $mainData = new dataProcessor;

    echo "<script>alert(11);</script>";

    if(isset($_POST['forgotPassword'])) {
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
            echo "<script>alert('emailRegitration');</script>";
            if(!$mainData->checkAvailableEmail($email)){
                echo "<script>alert('Ok');</script>";
                $mainData->processSendEmailGetPassword($email);
                ?>
                    <script type = "text/javascript">
                        location.href = '../../user/page/login_logout.php?';
                    </script>
                <?php  
            }
            else{
                echo "<script>alert('Email isn't exist, Plaese enter another Email. Thank you.')</script>";    
                ?>
                    <script type = "text/javascript">
                        location.href = '../../user/page/user/page/forgot-pw.php?';
                    </script>
                <?php  
            }   
        } 
    } else {

    }

?>