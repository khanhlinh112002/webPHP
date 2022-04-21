const like = (idPost, idUser) => {
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

const userWishList = (idUser) => {
    var idPhoto = $("#c__slide_0011").attr("data-id-img");
    $('#wishlist').toggleClass('wishlisted');
    $.ajax({
        url: "../../user/PHP/userWishList.php",
        method: "post",
        data: { action: "changeWishListStatus", idPhoto: idPhoto, idUser: idUser },
    });
}

const removeItemWishList = (idPhoto, idUser) => {
    $.ajax({
        url: "../../user/PHP/removeItemWishList.php",
        method: "post",
        data: { idPhoto: idPhoto, idUser: idUser },
    });
}


const deleteComment = (idPost, idUser, idComment) => {
    // if()
    $.ajax({
        url: "../../user/PHP/deleteComment.php",
        method: "post",
        data: { idPost: idPost, idUser: idUser, idComment: idComment },
    })
}