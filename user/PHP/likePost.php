<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/like.php";  

    if(isset($_POST)){
        $idPost = $_POST['idPost'];
        $idUser = $_POST['idUser'];
        echo "$idUser";
        if($idUser != 0){
            $condition = [
                'idPost' => $idPost,
                'idUser' => $idUser
            ];
    
            $mainData = new dataProcessor();
            if($mainData->checkLike($condition)) {
                $mainData->delete("likes", $condition);  
            } else {
                $mainData->insert("likes", creator::createLike($idPost, $idUser)->castToArray());
            }
        } else{
            ?>
                <script type = "text/JavaScript">alert("Please Sign Up")</script>
            <?php
        }
    }

?>