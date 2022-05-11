const like = (idPost, idUser) => {
    if (idUser == 0) {
        console.log
        if (confirm("Log In to Like This Post")) {
            location.href = '../../user/page/login_logout.php?';
        }
    } else {
        $('#like').toggleClass('liked');
        $.ajax({
            url: "../../user/PHP/likePost.php",
            method: "post",
            data: { idPost: idPost, idUser: idUser },
            success: function(data) {
                console.log(data);
            }
        });
    }
}

const userWishList = (idUser) => {
    if (idUser == 0) {
        if (confirm("Log In to Add This Post to Your Wish List")) {
            location.href = '../../user/page/login_logout.php?';
        }
    } else {
        var idPhoto = $("#c__slide_0011").attr("data-id-img");
        $('#wishlist').toggleClass('wishlisted');
        $.ajax({
            url: "../../user/PHP/userWishList.php",
            method: "post",
            data: { action: "changeWishListStatus", idPhoto: idPhoto, idUser: idUser },
        });
    }
}

const removeItemWishList = (idPhoto, idUser) => {
    $.ajax({
        url: "../../user/PHP/removeItemWishList.php",
        method: "post",
        data: { idPhoto: idPhoto, idUser: idUser },
    });
}


const deleteComment = (idPost, idUser, idComment) => {
    $.ajax({
        url: "../../user/PHP/deleteComment.php",
        method: "post",
        data: { idPost: idPost, idUser: idUser, idComment: idComment },
    })
}