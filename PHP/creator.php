<?php
    session_start();

    class creator {
        public static function createComment($idPost, $comment) {
            $idUser = $_SESSION['idUser'];
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            return new comment($idUser, $idPost, $comment, date('d/m/Y'));
        }

        public static function createUser() {
            $userName = $_POST['userName'];
            $email = $_POST['emailRegitration'];
            $password = $_POST['password'];
            return new user($userName, $email, $password);
        }

        public static function createLike($idPost, $idUser) {
            return new like($idPost, $idUser);
        }

        public static function createWishList($idPhoto, $idUser) {
            return new wishList($idPhoto, $idUser);
        }

        public static function createContact($name, $email, $subject, $content ) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            return new contact($name, $email, $subject, $content, date('d/m/Y'));
        }

    }

?>

