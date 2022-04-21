<?php
include_once 'db_connect.php';
$idPost =  $_GET["idPost"];
$sql = "DELETE from post
where idPost =' ". $idPost . "'";
$res = mysqli_query($conn, $sql);
if ($res) {
    if(is_dir('../../assets/image/'.$idPost)){
        $gal = scandir('../../assets/image/'.$idPost);
        unset($gal[0]);
        unset($gal[1]);
        foreach($gal as $k=>$v){
            unlink('../../assets/image/'.$idPost.'/'.$v);
        }
        rmdir('../../assets/image/'.$idPost);
    }
    echo "Record deleted successfully";
    header('Location: ../page/admin.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>