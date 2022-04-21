<?php
    
    include dirname(__DIR__)."/../PHP/dataProcessor.php";
    include dirname(__DIR__)."/../PHP/creator.php";
    include dirname(__DIR__)."/../PHP/contact.php";

    $mainData = new dataProcessor;

    if (isset($_POST["sendContact"])){
        if(isset($_POST['fullName'])){
            $name = $_POST['fullName'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['subject'])){
            $subject = $_POST['subject'];
        }
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }
        
        $mainData->sendEmailContact($email,$name,$subject,$content);
        $mainData->insert("contact", creator::createContact($name, $email, $subject, $content)->castToArray());
        
        
    }
    
?>