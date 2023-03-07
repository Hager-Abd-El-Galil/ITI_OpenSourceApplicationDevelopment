<?php 
function validateForm()
{
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    if(empty($name) || empty($email) || empty($message)){
        return "There is an Empty Field";
    }
    elseif(strlen($name) > _MAX_NAME_LENGTH_){
        return "Name Length must be Less</br>than 100 Character";
    }
    elseif(strlen($message) > _MAX_MESSAGE_LENGTH_){
        return "Message Length must be Less</br>than 255 Character";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return "Email is not Valid";
    }
    else{
        return "";
    }
}

function remember_var($var){
    if(isset($_POST[$var]) && !empty($_POST[$var])){
      return $_POST[$var];
    }else{
        return "";
    }
  }