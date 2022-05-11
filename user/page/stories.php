<?php
session_start();   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>new stories</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--    <link rel="stylesheet" href="../../Assets/css/reset.css">-->
    <link rel="stylesheet" href="../../assets/css/storiesStyle.css">
</head>
<body id="uyen">
<?php include "../Page/header.php"?>
<main class="u__main u__background-color-gray">
    <div class="intro__title">
        new posts
    </div>
    <div class="post_wrap">

    </div>
    <div class="pagination_wrap">
        <ul class="pagination">

        </ul>
    </div>
</main>

<?php
    include "../Page/footer.php"
?>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).on('load', function(){
        renderData()
        createPagination()
    })

    function renderData(head = 0, tail = 6) {
        $.ajax({
            data: {
                head: head,
                tail: tail
            },
            type: 'get',
            url: `../../PHP/renderDataStory.php`,
            success: function(result){
                $('.post_wrap').html(result);
            }
        });
    }

    function createPagination() {
        $.ajax({
            data: {},
            type: 'get',
            url: `../../PHP/createPagination.php`,
            success: function(result){
                $('.pagination').html(result);
            }
        });
    }

</script>

</html>