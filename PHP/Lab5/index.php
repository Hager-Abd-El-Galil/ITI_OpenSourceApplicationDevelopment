<style>
<?php include './views/style.css'?>
</style>

<?php require_once("./vendor/autoload.php");

$_DB=new MySQLHandler("items");

if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
    require_once("./views/single.php");
}

else {
    require_once("./views/all.php");
}