<style>
<?php include "./views/style.css";
?>
</style>
<?php require_once("vendor/autoload.php");
require_once("./views/weather.php");

if(isset($_POST["submit"])) {
    display_weather();
}