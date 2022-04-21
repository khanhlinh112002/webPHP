<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact page</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/contactStyle.css">
    <link rel="stylesheet" href="../../assets/css/reset.css">
</head>

<body>
    <?php include "header.php"?>    
    <div class="h_section">
        <div class="container">
            <div class="content_section">
                <div class="title">
                    <h1>CONTACT ME</h1><br><br><br><div 
                    class="content">
                        <p>Please check our list of Frequently Asked Questions below to see if your question has already been answered. If you have any other inquiries, please fill out the contact request form and our team will be happy to assist you.&nbsp;</p>
                    <br>
                    </div>
                </div>
                
            </div>
            <div class="image_section">
                <div class="section_thumbnail">
                    <div class="thumbnail">
                        <a href=""><br><br><br><br>
                            <img src="../../assets/image/contactImage.jpg">
                        </a>
                    </div>
                </div>
            </div>
            <div class="contactForm ">
            <form action=" ../PHP/contact.php" method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox "><br>
                        <input type="text " name="fullName" required="required ">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox ">
                        <input type="text " name="email" required="required ">
                        <span>Email</span>
                    </div>
                    <div class="inputBox ">
                        <textarea required="required " name = "subject"></textarea>
                        <span>Subject</span>
                    </div>
                    <div class="inputBox ">
                        <textarea required="required " name = "content"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputBox ">
                        <button name = "sendContact" class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
                    </div>
                </form> 
            </div>    
        </div>
    </div>
    <?php include_once 'footer.php'?>

</body>

</html>



