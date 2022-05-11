<?php
    
    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/contact.php";

    $mainData = new dataProcessor;

    if (isset($_POST["sendContact"])){
        if(isset($_POST['fullName'])){
            $name = $_POST['fullName'];
            if(isset($_POST['email'])){
                $email = $_POST['email'];
                if(isset($_POST['subject'])){
                    $subject = $_POST['subject'];
                    if(isset($_POST['content'])){
                        $content = $_POST['content'];
                        if($name != "" && $email != "" && $subject != "" && $content != ""){
                            $mainData->sendEmailContact($email,$name,$subject,$content);
                            $mainData->insert("contact", creator::createContact($name, $email, $subject, $content)->castToArray());
                            ?>
                                <script type = "text/javascript">
                                    alert("Your email be sent");
                                    location.href = '../../user/page/contact.php?';
                                </script>
                            <?php  
                        }
                    }else{
                        ?>
                            <script type = "text/javascript">
                                alert("Please enter the content you want to send");
                                location.href = '../../user/page/contact.php?';
                            </script>
                        <?php 
                    }
                }else{
                    ?>
                        <script type = "text/javascript">
                            alert("Please enter the subject you want to send");
                            location.href = '../../user/page/contact.php?';
                        </script>
                    <?php 
                }
            }else{
                ?>
                    <script type = "text/javascript">
                        alert("Please enter your email");
                        location.href = '../../user/page/contact.php?';
                    </script>
                <?php 
            }
        }else{
            ?>
                <script type = "text/javascript">
                    alert("Please enter your name");
                    location.href = '../../user/page/contact.php?';
                </script>
            <?php 
        }
    }
    
?>