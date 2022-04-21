<?php

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/wishList.php";

    $mainData = new dataProcessor();
 
    if(isset($_POST["action"]) && $_POST["action"]=="changeWishListStatus") {
        $idPhoto = $_POST['idPhoto'];
        $idUser = $_POST['idUser'];

        $condition = [
            'idPhoto' => $idPhoto,
            "idUser" => $idUser
        ];
        if($mainData->checkWishList($condition)) {
            $mainData->delete("wishlist", $condition);
        } else {
            $mainData->insert("wishList", creator::createWishList($idPhoto, $idUser)->castToArray());
        }
    }

    if(isset($_POST["action"]) && $_POST["action"]=="checkWishListStatus"){
        $idPhoto = $_POST['idPhoto'];
        $idUser = $_POST['idUser'];
        $condition = [
            'idPhoto' => $idPhoto,
            "idUser" => $idUser
        ];

        if($mainData->checkWishList($condition)) {
            echo "yes";
        }
        else {
            echo "no";
        }
    }

?>