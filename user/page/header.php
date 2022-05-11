

<link rel="stylesheet" href="../../assets/css/headerStyle.css">
<header>
    <div class="u__header-top">
        <div class="u__title u--font-weight-text u__font-family-text">Graphicprose</div>
        <div class="u__logo u__font-special-text">
            <img src="../../assets/image/theLogo.png" alt="">
        </div>
        <div id="u__out--btn">
            <a href="./donatePage.php">
                <button class="u__donate--btn">Donate</button>
            </a>
        </div>
    </div>
    <div class="u__header-bottom">
        <ul class="u__menu-navigation">
            <li class=" u__menu-navigation-text u__menu-text u__font-family-text"><a href="./stories.php">News </a></li>
            <li class="u__menu-navigation-text u__menu-text u__font-family-text"><a href="./aboutUS.php">About me</a></li>
            <li class="u__menu-navigation-text u__menu-text u__font-family-text"><a href="./wishlist.php">Wishlist</a></li>
            <li class="u__menu-navigation-text u__menu-text u__font-family-text"><a href="./contact.php">Contact</a></li>
            <?php
                if(isset($_SESSION["idUser"])){
                    ?>
                    <li class="u__menu-navigation-text u__menu-text u__font-family-text "><a href="../PHP/logout.php">Log Out</a></li>
                <?php
                }else{
                ?>
                    <li class="u__menu-navigation-text u__menu-text u__font-family-text "><a href="./login_logout.php">Sign in</a></li>
                <?php
                }
            ?>
            
           
        </ul>
    </div>
    <div class="u__header_mobile_wrap">
        <div class="u__header__mobile">
            <div id="u__out--btn">
                <a href ="./donatePage.php">
                    <button class="u__donate--btn">Donate</button>
                </a>
            </div>
            <div class="u__logo-text u__font-special-text">new stories</div>
            <label for="drop" class="u__menu_btn toggle">
                <div class="u__menu__icon"></div>
                <div class="u__menu__icon"></div>
                <div class="u__menu__icon"></div>
            </label>
        </div>
        <input type="checkbox" id="drop" >
        <ul class="u__menu__nav__mobile">
            <li class="u__menu__nav__mobile-text u__menu-text u__font-family-text"><a href="./stories.php">News </a></li>
            <li class="u__menu__nav__mobile-text u__menu-text u__font-family-text"><a href="./aboutUS.php">about me</a></li>
            <li class="u__menu__nav__mobile-text u__menu-text u__font-family-text"><a href="./wishlist.php">wishlist</a></li>
            <li class="u__menu__nav__mobile-text u__menu-text u__font-family-text"><a href="./contact.php">contact</a></li>
            <li class="u__menu__nav__mobile-text u__menu-text u__font-family-text"><a href="./login_logout.php">Sign in</a></li>
        </ul>
    </div>
</header>