<?php
session_start();
    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    
    $mainData = new dataProcessor();

    if(isset($_POST)) {
        $idPost = $_POST['idPost'];
        $idUser = $_POST['idUser'];
        $idComment = $_POST['idComment'];
        $condition = [
            "idComment" => $idComment
        ];
        $mainData->delete("comments", $condition);

        
    }

?>