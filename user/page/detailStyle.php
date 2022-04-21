<?php   
    // session_start();

    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/comment.php";  

    $mainData = new dataProcessor();  

    $idPost = $_GET['idPost'];
    if(isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }

    $idComment = 0;
    $result = $mainData->selectData("photos", ["idPost" => $idPost]);
    $idPhoto = $result[0]['idPhoto'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../assets/css/detailStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>

</head>

<script>

    const addComment = (idPost, idUser, idComment) => {
        var content = $('.newComment').val();
        $.ajax({
            url: "../../user/PHP/addComment.php",
            method: "post",
            data: { idPost: idPost, content: content, idUser: idUser },
        });
        $('.newComment').val("");
        var today = new Date();
        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
        element =
            `
            <div class="--c--comment--content">
                <div class="c__user_flexcoment">
                    <p>

                        <i class="fa fa-user-circle" aria-hidden="true"></i>

                    </p>
                    <div class="c__user_coment">
                        <p class="c__user_coment" name="nameuser"><?= $mainData->runArray($mainData->selectData("users",["idUser" => $idUser]))['username'] ?></p>
                        <p class="--c--conten--date" name="date">${date}</p>
                        <p class="--c--content--detail" name="content-user">${content}</p>

                    </div>
                </div>
                <p class="c__delete_coment" onclick = "deleteComment(<?=  $idPost . "," . $idUser  ?> , ${idComment + 1}); $(this).parent().remove();">Delete</p>
            </div>
        `

        $(".--c--tab").append(element);
    }

</script>

<body>
    <?php include "header.php" ?>
    <input type="hidden" id="idUser" value = "<?= $idUser?>">
    <div class="c__container_detail">
        <div id="c__gallery" class="c__container">
            <h3 id="c__caption"></h3>
            <div id="c__gallery-box">
                <div id="c__gallery-link" >
                    <img id="c__slide_0011" src="">
                    <div id="c__gallery-icon">
                        <button id="like" class = " <?php echo $mainData->checkLike(["idPost" => $idPost,"idUSer" => $idUser]) ? "liked" : ""; ?> " onclick="like(<?=$idPost . ',' . $idUser?>)" >
                            <i class="fa fa-thumbs-up"></i>
                            <!-- <span class="icon">Like</span> -->
                        </button>
                        <button id="wishlist" class = " <?php echo $mainData->checkWishList(["idPhoto" => $idPhoto,"idUser" => $idUser]) ? "wishlisted" : ""; ?> " onclick="userWishList(<?= $idUser ?>)">
                            <i class="fa fa-heart"></i>
                            <!-- <span class="icon">Wishlist</span> -->
                        </button>
                    </div>
                </div>
            </div>
            <div class="c__gallery-thumbnails">
                <div class="c__no-pad">
                    <?php
                        foreach($result as $photo) {
                            ?>  
                                <img id="<?php echo $photo['idPhoto']; ?>" class="img-responsive fff" src="../../assets/image/<?php echo $photo['image']; ?>" alt="<?php echo $photo['namePhoto']; ?>" />
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <hr class="c__hr" color="4ea685">
        <div class="--c--mytabs">
            <input type="radio" id="tabsilver" name="mytabs" checked="checked">
            <label for="tabsilver">Reviews</label>
            <div class="--c--tab">
                <?php
                    $commentList = $mainData->selectData("comments", ["idPost" => $idPost]);
                    foreach($commentList as $comment){
                        if($idComment <= $comment['idComment']){
                            $idComment = $comment['idComment'];
                        }
                ?>
                <div class="--c--comment--content">
                    <div class="c__user_flexcoment">
                        <p>
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </p>
                        <div class="c__user_coment">
                            <p class="c__user_coment" name="nameuser"><?= $mainData->runArray($mainData->selectData("users", ['idUser' => $comment['idUser']]))['username']; ?></p>
                            <p class="--c--conten--date" name="date"><?= $comment['dateComment'] ?></p>
                            <p class="--c--content--detail" name="content-user"> <?= $comment['content'] ?> </p>
                        </div>
                    </div>
                    <p class="c__delete_coment <?php echo $mainData->runArray($mainData->selectData("users", ['idUser' => $comment['idUser']]))['idUser'] == $idUser ? "" : "hide" ?>" onclick = "deleteComment(<?= $idPost . ',' . $comment['idUser'] . ',' . $idComment ?>); $(this).parent().remove();">Delete</p>
                </div>
                <?php 
                    }
                    ?>
                <div class="--c--form--comment">
                    <form action="" method="POST">
                        <textarea name="" class="--c--comment newComment" id="prolackkd"
                            placeholder="Enter here...!"></textarea>
                        <br>
                        <button type="button" class="--c--btn " name="sendComment"  onclick="addComment(<?=  $idPost . ',' . $idUser . ','. $idComment ?>) "> Post your comment </button>
                    </form>
                </div>  
            </div>
            <input type="radio" id="--c--tabdescription" name="mytabs">
            <label for="--c--tabdescription">Description</label>
            <div class="--c--tab">

                <div class="c--content--product--detail">

                    <p class="--c--content-detail-" name="description">
                        <?php
                            $description = $mainData->selectData("post", ["idPost" => $idPost]);
                            echo $description[0]["descriptions"]; 
                        ?>
                    </p>
                    <button class="c--readmore__toggle --c--btn" role="switch" aria-checked="true">
                        Show more
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="../../assets/js/detailjs.js"></script>
    <script src="../../assets/js/function.js"></script>
</body>

</html>

</html>