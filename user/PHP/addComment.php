<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/comment.php";

    $mainData = new dataProcessor;

    if(isset($_POST)) {
        $idPost = $_POST['idPost'];
        $content = $_POST['content'];
        $idUser = $_POST['idUser'];
        if(!empty($content)) {
            if($content !== "") {
                $mainData->insert("comments", creator::createComment($idPost, $content)->castToArray());;
            }else {

            }
        } else {

        }
        
    }

?>