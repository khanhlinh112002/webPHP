

<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="../../assets/css/home.css">

</head>

<body>

<?php 
include "header.php"
?>
    <div class="container">
        <div div class="content">
            <img class="mySlides" src="../../assets/image/img2.jpg" style="width:100%">
            <img class="mySlides" src="../../assets/image/img3.jpg" style="width:100%">
            <img class="mySlides" src="../../assets/image/img1.jpg" style="width:100%">
        </div>

        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 5000); // Change image every 2 seconds
            }
        </script>
        <br>
        <br>
        <br>
        <div class="inside">
            <div id="bro"></div>
            <br>
            <div class="grid-anh">
                <div class="item1">BEN QUICK OFFICIAL</div>
                <div class="item2">Ben Quick work merges Fine Art and Documentary styles. His Vietnam travel photography depicts ethnic culture, landscapes, and portraits with emotions.</div>
                <br>
                <!-- <img class="logo" src="../../assets/image/logo.jpg"> -->
            </div>
        </div>
        <div class="image">
            <div class="text">

                <a href="../../user/page/home1.php">
                    <img class="imagesmall" src="../../assets/image/img7.jpg"></a>
            </div>
        </div>
        <div class="small">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

            <div class="khoang">
                <a href="../../user/page/home3.php">Ben Quick work merges Fine Art and Documentary styles</a><br><br>
                <a href="../../user/page/home3.php">Click here.</a>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

        <div class="text1">
            
            <a href="../../user/page/home2.php">
                <img class="imagesmall" src="../../assets/image/img10.jpg"></a>

        </div>
        <div class="small1">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="khoang">
                <a href="../../user/page/home4.php">Ben Quick work merges Fine Art and Documentary styles</a><br><br>
                <a href="../../user/page/home4.php">Click here.</a>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div class="small2">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="khoang">
                <a href="../../user/page/home6.php">Ben Quick work merges Fine Art and Documentary styles</a><br><br>
                <a href="../../user/page/home6.php">Click here.</a>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div class="grid-container1">
            <div class="grid-item1">
                <img src="../../assets/image/14.jpg" style width="100%" ,height=" 110%"></div>
            <div class=" grid-item1 ">
                <img src="../../assets/image/15.jpg " style width="100%" ,height=" 100%">
            </div>

        </div>
        <div class="text1">
            
            <a href="../../user/page/home5.php">
                <img class="imagesmall" src="../../assets/image/26.jpg"></a>
        </div>
        <div class="grid-container2">
            <div class="grid-item2">
                <img src="../../assets/image/8.jpg" style width="100%" ,height=" 110%"></div>
            <div class=" grid-item2 ">
                <img src="../../assets/image/9.jpg " style width="100%" ,height=" 100%">
            </div>
            <div class=" grid-item2 ">
                <img src="../../assets/image/img8.jpg " style width="100%" ,height=" 100%">
            </div>

        </div>
    </div>
    <?php include "footer.php"
?>
    </div>
    

</body>

</html>