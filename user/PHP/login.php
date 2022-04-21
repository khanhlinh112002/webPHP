<?php
    session_start();
    include dirname(__DIR__)."/../PHP/dataProcessor.php";

    $mainData = new dataProcessor();
    
    if(isset($_POST['login'])) {
        if(isset($_SESSION["idUser"])){
            unset($_SESSION["idUser"]);
        }
        if(!empty($_POST['email']) && isset($_POST['email'])){
            if(!empty($_POST['password']) && isset($_POST['password'])){
                $email =  $_POST['email'];
                $password =  $_POST['password'];
                $result = $mainData->checkLogin($email, $password);
                $count = count($result);
                if($count != 0) {
                    $_SESSION['idUser'] = $mainData->runArray($result)['idUser'];
                    ?>
                        <script type = "text/javascript">
                            console.log('<?= $_SESSION["idUser"] ?>')
                            location.href = '../../user/page/stories.php?';
                        </script>
                    <?php
                } else{
                    ?>
                        <script type = "text/javascript">
                            alert('Woops! Email or Password is Wrong.')
                            location.href = '../../user/page/login_logout.php?';
                        </script>
                    <?php
                }
            } else{
                echo "<script>alert('Plaese enter password.')</script>";
                ?>
                    <script type = "text/javascript">
                        location.href = '../../user/page/login_logout.php?';
                    </script>
                <?php
            }
        } else{
            echo "<script>alert('Plaese enter email.')</script>";
            ?>
                <script type = "text/javascript">
                    location.href = '../../user/page/login_logout.php?';
                </script>
            <?php
        }
    } else{
        ?>
            <script type = "text/javascript">
                llocation.href = '../../user/page/login_logout.php?';
            </script>
        <?php
    }       

?>