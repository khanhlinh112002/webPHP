<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
        
    $mainData = new dataProcessor();

    if(isset($_POST)) {
        $idPhoto = $_POST['idPhoto'];
        $idUser = $_POST['idUser'];
        $condition = [
            "idPhoto" => $idPhoto,
            "idUser" => $idUser,
        ];
        $mainData->delete("wishlist", $condition);
    }

?>