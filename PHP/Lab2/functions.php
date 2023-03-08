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

function save_to_file() {
    $contacts_file = fopen(_Saving_File_, "a+");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $submit_date = date("F j Y g:i a");
    $submit_ip = $_SERVER["REMOTE_ADDR"];
    $written_string= "$submit_date , $submit_ip , $email , $name"; 
    fwrite($contacts_file, $written_string.PHP_EOL);
    fclose($contacts_file); 
} 

function convert_file_to_array() {
    return file(_Saving_File_);
}