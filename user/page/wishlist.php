<?php
    session_start(); 

    include dirname(__DIR__)."/../PHP/dataProcessor.php";

    $mainData = new dataProcessor();

    if(isset($_SESSION['idUser'])) {
        $idUser = $_SESSION['idUser'];
    }else{
        $idUser = 0;
    }
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wishlist</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/reset.css">
    <link rel="stylesheet" href="../../assets/css/wishlistStyle.css">
</head>
<body>
<header id="header__wishlist">
    <div class="u__logo"></div>
    <div class="between__text">
        <div class="between__text__top">wishlist</div>
        <div class="between__text__bottom">interesting</div>
    </div>
</header>
<main id="uyen__wishlist">
    <div class="intro__title">
        enjoy it !!!
    </div>
    <div class="button__nav">
        <div class="btn__go__homepage">
            <a href="../../user/page/home.php">homepage</a>
        </div>
        <div class="btn__go__new_posts_wrapper">
            <div class="btn__go__news__post">
                <a href="stories.php">new posts</a>
            </div>
        </div>
    </div>
    <section class="wishlist__post__wrapper">
        <div class="wishlist__post">
            <?php
                $wishList = $mainData->selectData("wishlist", ["idUser" => $idUser]);
                foreach($wishList as $wishListItem){
                    ?>
                        <div class="wishlist__post_thumbnail">
                            <?php
                                $listPhoto = $mainData->selectData("photos", ["idPhoto" => $wishListItem["idPhoto"]]);
                                foreach($listPhoto as $listPhotoItem){
                                ?>
                                    <a href="../../user/page/detailStyle.php?idPost=<?php echo $listPhotoItem['idPost'] ?>">
                                        <img src="../../assets/image/<?php echo $listPhotoItem["image"] ?>" alt="">
                                        <div class="post__title"><?php echo $listPhotoItem["namePhoto"] ?></div>
                                    </a>
                                    <button class="icon__liked" onclick="removeItemWishList(<?= $listPhotoItem['idPhoto'] . ',' . $idUser  ?>); $(this).parent().remove(); "><i class="fa-solid fa-heart"></i></button>
                                <?php
                                }
                            ?>
                        </div>
                    <?php
                }
            ?>
        </div>
    </section>

</main>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="../../assets/js/stories-js.js"></script>
<script src="../../assets/js/function.js"></script>
</body>
</html>
