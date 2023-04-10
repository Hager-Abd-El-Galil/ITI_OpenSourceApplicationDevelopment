<?php
session_start(); 
$fileContent = file_get_contents("employees.xml");
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->loadXML($fileContent);

$elementsLength = $doc->getElementsByTagName("employee")->length;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //Previous
    if ($_POST["buttonAction"] === "PREV")
        if($_SESSION["employeeSession"] > 0){
            $_SESSION["employeeSession"] -= 1;
        }elseif($_SESSION["employeeSession"] === 0){
            $_SESSION["employeeSession"] = $elementsLength-1;
        }

    //Next
    if ($_POST["buttonAction"] === "NEXT")
        if($_SESSION["employeeSession"] < $elementsLength-1){
            $_SESSION["employeeSession"] += 1;
        } else {
            $_SESSION["employeeSession"] = 0;
        }

    //Insert
    if(isset($_POST['Insert'])) {
        $employees = simplexml_load_file('employees.xml');
        $employee = $employees->addChild('employee');
        $employee->addChild('id', uniqid());
        $employee->addChild('name', $_POST['name']);
        $employee->addChild('email', $_POST['email']);
        $employee->addChild('phone', $_POST['phone']);
        $employee->addChild('address', $_POST['address']);
        $dom = new DomDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($employees->asXML());
        $dom->save('employees.xml');
        $_SESSION['message'] = 'Employee has been added Successfully!';
        header('location: index.php');
    }

    //Update
    if (@$_POST["update"] === "Update") {

        $xml = simplexml_load_file('employees.xml');

        $id = $_POST['id'];
        $employee = $xml->xpath("//employee[id='$id']")[0];
        $employee->name = $_POST['name'];
        $employee->phone = $_POST['phone'];
        $employee->address = $_POST['address'];
        $employee->email = $_POST['email'];

        $xml->asXML('employees.xml');

    }

    //Delete
    if (@$_POST["buttonAction"] === "Delete") {

        $xml = simplexml_load_file('employees.xml');
        $id = $_POST['id'];
        $employee = $xml->xpath("//employee[id='$id']")[0];
        unset($employee[0]);
        $xml->asXML('employees.xml');
    }
}

$index = $_SESSION["employeeSession"];
$employees = $doc->documentElement;
$employee = @$employees->childNodes[$index];
$id = @$employee->childNodes[0]->nodeValue;
$name = @$employee->childNodes[1]->nodeValue;
$email = @$employee->childNodes[2]->nodeValue;
$phone = @$employee->childNodes[3]->nodeValue;
$address = @$employee->childNodes[4]->nodeValue;

require_once("views/form.php");