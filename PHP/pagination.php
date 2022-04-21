<?php

class paginate

{
    public static function getData($DB_con)
    {
        $query = "SELECT post.idPost, post.title, post.descriptions, pt.image from post join photos pt on post.idPost = pt.idPost group by pt.idPost order by pt.idPost DESC;";
        $stm = $DB_con->prepare($query);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function createPagination(){
        $size = count(paginate::getData($GLOBALS['DB_con']));
        $itemPerPage = 6;
        $pageAmount = ceil($size/$itemPerPage);

        for ($i = 1; $i <= $pageAmount; $i++){
            ?>
            <li onclick="renderData(<?php echo ($i-1)*$itemPerPage ?>, <?php echo $i*$itemPerPage > $size ? $size : $i*$itemPerPage ?>)" class="page__number"><?php echo $i ?></li>
            <?php
        }
    }

    public static function renderData($data, $head, $tail){

        for ($i = $head; $i < $tail; $i++){
            ?>
            <div class="post__thumbnail">

                <div class="post__img">
                    <img src= "../../assets/image/<?php echo $data[$i]['image'] ?>" alt="">
                    <div class="img__wrapper">
                    </div>
                </div>
                <div class="post_title"><?php echo $data[$i]['title']?></div>
                <div class="post__des"><?php echo $data[$i]['descriptions']?></div>
                <p class="read__more"><a href="../../user/page/detailStyle.php?idPost=<?php echo $data[$i]['idPost'] ?>">read more &raquo;&raquo;</a></p>
            </div>
            <?php
        }
    }
}

?>