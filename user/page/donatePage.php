<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/donateStyle.css">
</head>
<body>
    <main class="main">
        <!-- Header -->
<?php
include "header.php"
?>
        <!-- Landing -->
        <section class="landing">
          <div class="landing-text">
            <h1>DONATE NOW</h1>
            <p>
                Thanks to your regular generosity we are able to run our activities and maximize our impact.
            </p>
            <a href="https://www.sandbox.paypal.com/donate/?hosted_button_id=5E3HMTXJLKHC4" class="btn btn-lg">Donate</a>
          </div>
          <div class="landing-image">
            <!-- <img src="https://store.rehahnphotographer.com/wp-content/uploads/2022/02/Golden-Fields-banner.jpg" alt="Working Illustration" /> -->
            <div class="slider-content">
              <div class="slides-content">
                  <input type="radio" name="radio-btn" id="radio1">
                  <input type="radio" name="radio-btn" id="radio2">
                  <input type="radio" name="radio-btn" id="radio3">
                  <input type="radio" name="radio-btn" id="radio4">
                  <div class="slide-content first">
                      <img src="https://store.rehahnphotographer.com/wp-content/uploads/2021/10/echo.jpg" alt="">
                  </div>
                  <div class="slide-content">
                      <img src="https://store.rehahnphotographer.com/wp-content/uploads/2021/12/golden-hour.jpg" alt="">
                  </div>
                  <div class="slide-content">
                      <img src="https://store.rehahnphotographer.com/wp-content/uploads/2020/07/Balance.jpg" alt="">
                  </div>
                  <div class="slide-content">
                      <img src="https://store.rehahnphotographer.com/wp-content/uploads/2020/07/Into-the-Wave-II.jpg" alt="">
                  </div>
                  <div class="navigation-auto">
                      <div class="auto-btn1"></div>
                      <div class="auto-btn2"></div>
                      <div class="auto-btn3"></div>
                      <div class="auto-btn4"></div>
                  </div>
              </div>
          </div>
          </div>
        </section>
        
        <!-- Footer -->

        <?php
            include "footer.php"
        ?>

      </main>
      <script type="text/javascript">
        var counter = 1;
        setInterval(function () {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 4000);
    </script>
</body>
</html>