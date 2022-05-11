<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    $mainData = new dataProcessor;

    if(isset($_POST['forgotPassword'])) {
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
            if(!$mainData->checkAvailableEmail($email)){
                $mainData->processSendEmailGetPassword($email);
                ?>
                    <script type = "text/javascript">
                        location.href = '../../user/page/login_logout.php?';
                    </script>
                <?php  
            }
            else{
                // echo "<script></script>";    
                ?>
                    <script type = "text/javascript">
                        alert("Email isn't exist, Plaese enter another Email. Thank you.")
                        location.href = '../../user/page/forgot-pw.php?';
                    </script>
                <?php  
            }   
        } 
    } else {

    }

?>