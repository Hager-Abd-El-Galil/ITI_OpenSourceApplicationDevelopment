<style>
    <?php include './views/style.css' ?>
</style>

<?php
require_once('./config.php');
require_once('./functions.php');

$error = "";

if(!empty($_POST)){
    $error = validateForm();
    if(empty($error)){
        die('<body style="hight:100vh;background-color: #eee;">
                <div style="border:solid 1px #eee;
                            width:45%;
                            margin-left:24.5%;
                            margin-top:33vh;
                            padding:3%;
                            font-family:monospace;
                            font-size:14px;
                            background-color: white;
                            border-radius: 10px;"
                >'  
                .'<center><h1 style="color:#bce;">'._THANK_YOU_MESSAGE_.'</h1></br>'
                ."<h3> Your Submitted Data is </h3></br>"
                ."<b> Name : </b>".trim($_POST['name'])."</br>"
                ."<b> Email : </b>".trim(strtolower($_POST['email']))."</br>"
                ."<b> Message : </b>".trim($_POST['message'])."</br>"
                .'</center>'.
           '</div></body>'
        );
    }
}

require_once('./views/contactForm.php');
