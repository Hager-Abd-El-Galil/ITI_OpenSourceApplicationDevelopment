<?php
$counter = new Counter();
$counter -> increment_and_update();
$count = $counter -> get_count();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
</head>

<body>
    <div class="container">
        <h1>Website Visitors</h1>
        <div>
            <img src="https://icon-library.com/images/icon-blogger/icon-blogger-18.jpg" width="200px" height="200px">
            <p><?php echo $count ?></p>
        </div>
    </div>
</body>

</html>